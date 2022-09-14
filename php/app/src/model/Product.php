<?php

namespace App\Model;

use App\Lib\Api;

class Product extends BaseModel
{
    const API_TYPE = 'products';

    private Api $api;

    public function __construct()
    {
        parent::__construct();
        $this->api = new Api();
    }

    public function getProducts() {
        return $this->api->getAll(self::API_TYPE);
    }

    public function getProductById($id) {
        return $this->api->getOneById(self::API_TYPE, $id);
    }
}
