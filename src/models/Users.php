<?php

namespace mxm\sso\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use Carbon\Carbon;

class Users extends Model {

    public function checkUserAccess($empid) {
        $result = DB::table(config('sso.sso_users_table'))
                ->where("EMPID", $empid)
                ->get();
        return $result;
    }

}
