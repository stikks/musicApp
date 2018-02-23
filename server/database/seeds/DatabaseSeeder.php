<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(GroupsTableSeeder::class);
//        $this->call(SettingsTableSeeder::class);
//        $this->call(MailTemplatesSeeder::class);
//        $this->call(LocalizationsTableSeeder::class);

        $user = new App\UserInfo();
        $user->reference = 'admin';
        $user->permissions = ['admin' => 1, 'superAdmin' => 1];
        $user->save();
    }
}
