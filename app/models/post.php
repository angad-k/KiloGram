<?php

namespace Model;

class Post
{
    public static function upload($url, $caption)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO posts (url, caption, userID) VALUES (?, ?, ?)");
        $stmt->execute([$url, $caption, $_SESSION['uid']]);
    }
    public static function changeDP($url)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE users SET dpURL = ? WHERE ID = ?");
        $stmt->execute([$url, $_SESSION['uid']]);
    }
}