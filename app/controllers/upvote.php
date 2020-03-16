<?php

namespace Controller;
session_start();
class Upvote
{
    public function get()
    {
        
        if(isset($_SESSION['username']))
        {
            \Model\Upvote::upvote($_GET['postID']);
        }
        else
        {
            echo \View\Loader::make()->render("templates/login.twig");
        }
    }
    

}