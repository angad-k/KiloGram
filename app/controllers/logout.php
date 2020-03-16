<?php

namespace Controller;
session_start();
class Logout 
{
    public function get()
    {
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        unset($_SESSION['current']);
        echo \View\Loader::make()->render("templates/login.twig");
    }
}