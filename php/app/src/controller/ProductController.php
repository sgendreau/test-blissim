<?php

namespace App\Controller;

use App\Model\Comment;
use App\Model\Product;

class ProductController
{
    private Product $productModel;
    private Comment $commentModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->commentModel = new Comment();
    }

    public function index() {
        $products = $this->productModel->getProducts();
        require_once("../src/view/product/product-list.php");
    }

    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if(!$product) {
            header('Location: /error404');
            exit();
        }
        $comments = $this->commentModel->getProductComments($id);
        require_once("../src/view/product/product-show.php");
    }
}
