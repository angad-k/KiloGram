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
    public static function createaccount($username, $password, $email)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $passwd = md5($password);
        $stmt->execute([$username, $passwd, $email]);
    }
}