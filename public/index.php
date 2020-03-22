<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/Feed/Trending" => "\Controller\Trending",
    "/Feed/Latest" => "\Controller\Latest",
    "/Post" => "\Controller\Post",
    "/submitComment" => "\Controller\SubmitComment",
    "/showComments" => "\Controller\ShowComments",
    "/upvote" => "\Controller\Upvote",
    "/Account" => "\Controller\Account",
    "/Logout" => "\Controller\Logout",
    "/ChangeDP" => "\Controller\Account",
    "/ChangeUsername" => "\Controller\ChangeUsername"
));
