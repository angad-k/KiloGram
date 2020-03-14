<?php

namespace Model;

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
}