<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('colors', 255)->default('000000;FFFFFF;0d0d0d;000000;555353;242323;000000;000000;ffffff;ffffff;a1853a')->change();
        });
        DB::raw('UPDATE company set colors = "000000;FFFFFF;0d0d0d;000000;555353;242323;000000;000000;ffffff;ffffff;a1853a"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('colors', 255)->default('000000;FFFFFF;0d0d0d;000000;555353;242323;000000;000000;ffffff;ffffff;a1853a')->change();
        });
        DB::raw('UPDATE company set colors = "000000;FFFFFF;0d0d0d;000000;555353;242323;000000;000000;ffffff;ffffff;a1853a"');
    }
}
