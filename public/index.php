<?php

function show($stuff)
{
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

function splitUrl()
{
    $url = $_GET['url'] ?? 'home';
    $url = explode('/', $url);

    return $url;
}

function loadController()
{
    $url = splitUrl();
    $fileName = "../app/controllers/" . ucfirst($url[0]) . ".php";

    if (file_exists($fileName)) {
        require $fileName;
    } else {
        $fileName = "../app/controllers/_404.php";
        require $fileName;
    }
}

loadController();
