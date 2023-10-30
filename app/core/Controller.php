<?php

class Controller
{
    public function view($name)
    {
        $fileName = "../app/views/" . $name . ".view.php";

        if (file_exists($fileName)) {
            require $fileName;
        } else {
            $fileName = "../app/controllers/404.view.php";
            require $fileName;
        }
    }
}
