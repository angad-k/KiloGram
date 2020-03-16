<?php

namespace Controller;
session_start();
class Account 
{
    public function get()
    {
        $_SESSION['current'] = "account";
        $posts = \Model\Latest::getAccount();
        echo \View\Loader::make()->render("templates/latest.twig",
        array(
            "posts" => $posts,
            "current" => $_SESSION['current']
        ));
    }
}