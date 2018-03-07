<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 02/03/2018
 * Time: 1:33 PM
 */

namespace App\Services;

use Mookofe\Tail\Facades\Tail;
use Illuminate\Support\Facades\Log;

class Utilities
{
    static public function generateRandomString($len) {
        return substr(str_shuffle(str_repeat($character='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($len/strlen($character)) )),1,$len);
    }

    static public function broadcastAction($queue, $payload=array('*')) {
        try {
            Tail::add($queue, json_encode($payload), array('content_type' => 'application/json'));
        }  catch (\Exception $e) {
            Log::error($e);
        }
    }

}