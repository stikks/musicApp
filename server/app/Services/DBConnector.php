<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 22/02/2018
 * Time: 5:12 PM
 */

namespace App\Services;

use DB;

class DBConnector
{

    static public function createRaw($table, $data=array('*')) {
        return DB::table($table)->insert($data);
    }

    static public function where($table, $query, $first_only=true, $columns=array('*')) {
        return $first_only ? DB::table($table)->where($query)->first($columns) : DB::table($table)->where($query)->get($columns);
    }
}