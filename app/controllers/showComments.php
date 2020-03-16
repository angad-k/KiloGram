<?php

namespace Controller;
session_start();
class ShowComments
{
    public function get()
    {
        $commentData = \Model\ShowComments::showComments($_GET['postID']);
        echo \View\Loader::make()->render("templates/showComments.twig",
            array(
                "comments" => $commentData                
            ));
    }
}