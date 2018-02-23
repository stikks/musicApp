<?php

/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 23/02/2018
 * Time: 2:43 PM
 */
class AdminSeeder extends \Illuminate\Database\Seeder
{

    public function run() {
        //create admin account
        $user = new App\UserInfo();
        $user->reference = 'admin@tm30.net';
        $user->password = Hash::make('fileopen');
        $user->permissions = ['admin' => 1, 'superAdmin' => 1];
        $user->save();

    }
}