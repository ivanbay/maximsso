<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SSOusers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable(config('sso.sso_users_table'))) {
            Schema::create(config('sso.sso_users_table'), function(Blueprint $table) {
                $table->string('EMPID');
                $table->string('USERNAME');
                $table->tinyInteger('ISACTIVE');
                $table->tinyInteger('ROLE');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop(config('sso.sso_users_table'));
    }

}
