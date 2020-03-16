<?php

namespace Model;
session_start();
class SubmitComment
{
    public static function submitComment($comment, $postID)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO comments (comment, postID, userID, username) VALUES (?, ?, ?, ?)");
        $stmt->execute([$comment, $postID, $_SESSION['uid'], $_SESSION['username']]);
    }
}