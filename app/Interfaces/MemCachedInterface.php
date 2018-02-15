<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:49 PM
 */

namespace App\Interfaces;


interface MemcachedInterface
{
    /*
     * @param $key
     * @param $data
    */
    public function create($key, Array $data);

    public function get($key);

    public function find($key, Array $queryParams);

    public function delete($key);

    public function update($key, Array $data);

}