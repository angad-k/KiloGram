<?php

namespace Controller;
session_start();
class Trending 
{
    public function get()
    {
        $_SESSION['current'] = "trending";
        $posts = \Model\Latest::getTrending();
        echo \View\Loader::make()->render("templates/latest.twig",
        array(
            "posts" => $posts
        ));
    }
}