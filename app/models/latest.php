<?php

namespace Model;
use PDO;
session_start();
class Latest {
    public static function getLatest() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts ORDER BY ID DESC");
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getTrending() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts ORDER BY likes DESC");
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getAccount() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts WHERE userID = ? ORDER BY ID DESC");
        $stmt->execute([$_SESSION['uid']]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
}