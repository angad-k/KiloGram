<?php

namespace Controller;
session_start();
class Trending 
{
    public function get()
    {
        $_SESSION['current'] = "trending";
        echo \View\Loader::make()->render("templates/trending.twig");
    }
}