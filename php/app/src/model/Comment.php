<?php

namespace App\Model;

use PDO;

class Comment extends BaseModel
{

    public function getProductComments(int $idProduct) {
        $sql = "SELECT * FROM product_comment WHERE product_id = ? ORDER BY id DESC;";
        $stmt = $this->getConnexion()->prepare($sql);
        $stmt->bindValue(1, $idProduct, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCommentById(int $idComment) {
        $sql = "SELECT * FROM product_comment WHERE id = ?;";
        $stmt = $this->getConnexion()->prepare($sql);
        $stmt->bindParam(1, $idComment, PDO::PARAM_INT);
        $stmt->execute();
        return json_encode($stmt->fetch());
    }

    public function addComment(int $productId, string $username, string $comment) {
        $username = htmlspecialchars($username);
        $content = htmlspecialchars($comment);
        $sql = "INSERT INTO product_comment (username, content, product_id) VALUES (?, ?, ?)";
        $stmt = $this->getConnexion()->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $productId, PDO::PARAM_INT);

        return $stmt->execute() ? json_encode(['username' => $username, 'content' => $content]) : false;
    }

    public function updateComment(int $commmentId, string $comment) {
        $content = htmlspecialchars($comment);
        $sql = "UPDATE product_comment SET content = ? WHERE id = ?";
        $stmt = $this->getConnexion()->prepare($sql);
        $stmt->bindParam(1, $content);
        $stmt->bindParam(2, $commmentId, PDO::PARAM_INT);
        return $stmt->execute() ? json_encode(['content' => $content]) : false;
    }

    public function removeComment(int $commmentId) {
        $sql = "DELETE FROM product_comment WHERE id = ?";
        $stmt = $this->getConnexion()->prepare($sql);
        $stmt->bindParam(1, $commmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
