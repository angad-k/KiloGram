<?php

namespace Model;
use PDO;
session_start();
class Latest {
    public static function getLatest() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts AS posts INNER JOIN users AS users ON posts.userID = users.ID ORDER BY time DESC");
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getTrending() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts INNER JOIN users AS users ON posts.userID = users.ID  ORDER BY likes DESC, time DESC");
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getAccount() 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts INNER JOIN users AS users ON posts.userID = users.ID  WHERE userID = ? ORDER BY time DESC");
        $stmt->execute([$_SESSION['uid']]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        $stmt = $db->prepare("SELECT * FROM users WHERE ID = ?");
        $stmt->execute([$_SESSION['uid']]);
        $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['DPurl'] = $result2['DPurl'];
        return $result;
    }
}