<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/Feed/Trending" => "\Controller\Trending",
    "/Post" => "\Controller\Post"
));
