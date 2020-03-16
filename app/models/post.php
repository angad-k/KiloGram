<?php

namespace Model;

class Post
{
    public static function upload($url, $caption)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO posts (url, caption, userID, username) VALUES (?, ?, ?, ?)");
        $stmt->execute([$url, $caption, $_SESSION['uid'], $_SESSION['username']]);
    }
}