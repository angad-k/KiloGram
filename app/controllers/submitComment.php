<?php

namespace Controller;
session_start();
class SubmitComment 
{
    public function post()
    {
        \Model\SubmitComment::submitComment($_POST['comment'], $_POST['postID']);
    }
}