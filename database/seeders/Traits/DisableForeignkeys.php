<?php

namespace Database\Seeders\Traits;
use Illuminate\Support\Facades\DB;

trait DisableForeignkeys
{

    protected function disableForeignKey()
    {
        //

        DB::statement('set FOREIGN_kEY_CHECKS=0');
    }
    protected function enableForeignKey()
    {
        //
        DB::statement('set FOREIGN_kEY_CHECKS=1');
    }
}
