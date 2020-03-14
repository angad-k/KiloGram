<?php

namespace Controller;
session_start();
class Post 
{
    public function get()
    {
        if(isset($_SESSION['username']))
        {
            echo \View\Loader::make()->render("templates/post.twig",
            array(
                "username" => $_SESSION['username']
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/login.twig");
        }
        
    }
    public function post()
    {
        
    }
}