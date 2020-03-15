<?php

namespace Controller;
session_start();
class Latest 
{
    public function get()
    {
        $_SESSION['current'] = "latest";
        $posts = \Model\Latest::getLatest();
        echo \View\Loader::make()->render("templates/latest.twig",
        array(
            "posts" => $posts
        ));
    }
}