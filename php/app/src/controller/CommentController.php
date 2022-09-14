<?php

namespace App\Controller;

use App\Model\Comment;
use App\Model\Product;

class CommentController
{
    private Product $productModel;
    private Comment $commentModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->commentModel = new Comment();
    }

    public function edit(int $productId, ?int $commentId = null) {
        $product = $this->productModel->getProductById($productId);
        $comment = $commentId ? json_decode($this->commentModel->getCommentById($commentId)) : null;
        if(!$product) {
            header('Location: /error404');
            exit();
        }
        if(isset($_POST['content'])) {
            try {
                if($commentId) {
                    $comment = $this->commentModel->updateComment($commentId, $_POST['content']);
                } else if(isset($_POST['username'])){
                    $comment = $this->commentModel->addComment($productId, $_POST['username'], $_POST['content']);
                }

                header('Location: /'.$productId);
                exit();
            } catch (\Exception $e) {
                printf("%s\n", $e->getMessage());
            }
        }
        require_once("../src/view/comment/comment-add.php");
    }

    public function delete(int $productId, int $commentId) {
        $product = $this->productModel->getProductById($productId);
        $comment = $commentId ? json_decode($this->commentModel->getCommentById($commentId)) : null;
        if(!$comment || !$product) {
            header('Location: /error404');
            exit();
        }
        $this->commentModel->removeComment($commentId);
        header('Location: /'.$productId);
        exit();
    }
}
