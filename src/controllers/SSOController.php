<?php

namespace mxm\sso\controllers;

require_once __DIR__ . "/../classes/nusoap/lib/nusoap.php";

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use mxm\sso\classes\nusoap\lib\nusoap_client as nusoap;
use mxm\sso\models\Users;

class SSOController extends Controller {

    public function getIndex(Request $request) {
        if (self::isLoggedIn($request)) {
            return redirect()->to(config("sso.redirect_url"));
        } else {
            
            $values = [
                "title" => config("sso.app_title"),
                "url" => config("sso.callback_url")
            ];

            return view("SSO::login")->with($values);
        }
    }

    public function getSuccess(Request $request) {
        $authid = $request->get("id");
        
        $server = new nusoap(config("sso.sso_ws_url"));
        $data = $server->call('getUserDetailByID', str_replace('"', "", $authid));

        if ($server->getError()) {
            return "Error: Unable to communicate with SSO. Please report to system administrator. -> " . $server->getError();
        }

        if ($this->hasAccess($data['employeeno'])) {
            $request->session()->put("SSOID", $authid);
            foreach(config("sso.session_attributes") as $k => $v) {
                $request->session()->put($k, $data[$v]);
            }
            $request->session()->put("userrole", $this->getUserRole($data['employeeno']));
            return redirect(config("sso.redirect_url"));
        } else {

//            $request->session()->put("employeeno", $data['employeeno']);
//            $request->session()->put("username", $data['username']);
            
            foreach(config("sso.unauthorize_session_attributes") as $k => $v) {
                $request->session()->put($k, $data[$v]);
            }

            return redirect()->to("login/unauthorize");
        }
    }

    public static function isLoggedIn(Request $request) {
        return $request->session()->get("SSOID");
    }

    private function hasAccess($id) {
        $emp = new Users();
        $access = $emp->checkUserAccess($id);
        if (!empty($access) && $access[0]->ISACTIVE == 1) {
            return true;
        } else {
            return false;
        }
    }

    private function getUserRole($id) {
        $emp = new Users();
        return $emp->checkUserAccess($id)[0]->ROLE;
    }

    public function getDestroy(Request $request) {
        $request->session()->flush();
        return redirect()->to('/');
    }

    public function getUnauthorize() {
        return view("SSO::unauthorize");
    }

    public function postRequest(Request $request) {
        $values = [
            "EMP_ID" => $request->session()->get("employeeno"),
            "USERNAME" => $request->session()->get("username"),
            "ROLE" => $request->input("usertypebtn")
        ];

        $users = new Users();
        if (!$users->isExist($request->session()->get("employeeno"))) {
            if ($users->add($values)) {
                $request->session()->flush();
                $message = "Your request is now submitted and subject for approval. You will be notified once approved.";
            } else {
                $message = "There was a problem requesting an access. Check with the administrator";
            }
        } else {
            $message = "You have requested an account already. Please follow up the activation to system admin.";
        }

        return redirect()->to("login/unauthorize")->with("message", $message);
    }

}
