<?php

namespace Controller;

class Trending 
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/trending.twig");
    }
}