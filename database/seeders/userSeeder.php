<?php
namespace Database\Seeders;


use Database\Seeders\Traits\DisableForeignkeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    use TruncateTable;
    use DisableForeignkeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKey();
        $this->truncate('users');
        $users = \App\Models\User::factory(10)->create();
        $this->enableForeignKey();

    }
}
