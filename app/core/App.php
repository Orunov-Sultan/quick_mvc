<?php

class App
{
    private $controller = 'Home';
    private $methode    = 'index';

    private function splitUrl()
    {
        $url = $_GET['url'] ?? 'home';
        $url = explode('/', $url);

        return $url;
    }

    public function loadController()
    {
        $url = $this->splitUrl();
        $fileName = "../app/controllers/" . ucfirst($url[0]) . ".php";

        if (file_exists($fileName)) {
            require $fileName;
            $this->controller = ucfirst($url[0]);
        } else {
            $fileName = "../app/controllers/_404.php";
            require $fileName;
            $this->controller = '_404';
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->methode], []);
    }
}
