<?php

namespace Model;
use PDO;
session_start();
class ShowComments
{
    public static function showComments($postID)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM comments WHERE postID = ?");
        $stmt->execute([$postID]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
}