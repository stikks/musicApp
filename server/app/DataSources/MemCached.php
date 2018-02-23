<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:56 PM
 */

namespace App\DataSources;
use App\Interfaces\MemcachedInterface;

class MemCached implements MemcachedInterface
{
    private $connection;

    public function __construct($host, $port)
    {
        $this->connection = new \Memcached();
        $this->connection->addServer($host, $port);
    }

    public function create($key, Array $data)
    {
        return $this->connection->set($key, $data);
    }

    public function get($key)
    {
        return $this->connection->get($key);
    }

    public function find($key, Array $queryParams)
    {
        // TODO: Implement find() method.
    }

    public function delete($key)
    {
        return $this->connection->delete($key);
    }

    public function update($key, Array $data)
    {
        return self::create($key, $data);
    }
}