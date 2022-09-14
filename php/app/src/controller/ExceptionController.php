<?php

namespace App\Controller;

class ExceptionController
{
    public function notFound() {
        require_once("../src/view/exception/404.php");
    }
}
