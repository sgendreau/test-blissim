<?php

namespace App\Lib;

use Exception;

class Api
{
    const API_URL = 'https://fakestoreapi.com/';

    public function getAll($type)
    {
        if (!$type) {
            return new Exception('This api must have a type', 400);
        }
        $result = file_get_contents(self::API_URL . $type);
        if (!$result) {
            return new Exception('Type not found', 404);
        }
        return json_decode($result);
    }

    public function getOneById($type, $id)
    {
        if (!$type) {
            return new Exception('This api must have a type', 400);
        }
        $result = file_get_contents(self::API_URL . $type . '/' . $id);
        if (!$result) {
            return new Exception('Object not found', 404);
        }
        return json_decode($result);
    }
}
