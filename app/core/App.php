<?php

class App
{
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
        } else {
            $fileName = "../app/controllers/_404.php";
            require $fileName;
        }
    }
}
