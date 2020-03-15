<?php

namespace Model;
use PDO;
session_start();
class Home {
    public static function checkusername($username) 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    public static function checkemail($email) 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    public static function createaccount($username, $password, $email)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $passwd = md5($password);
        $stmt->execute([$username, $passwd, $email]);
    }
    public static function validate($username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $passwd = md5($password);
        $stmt->execute([$username, $passwd]);
        $count = $stmt->fetchColumn();
        if($count)
        {
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$username, $passwd]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['uid'] = $row['ID'];
        }
        return $count;
    }
}