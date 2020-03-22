<?php

namespace Model;
use PDO;
session_start();
class ChangeUsername {
    public static function changeUsername($name) 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$name]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        if(count($result) == 0)
        {
            $db = \DB::get_instance();
            $stmt = $db->prepare("UPDATE users SET username = ? WHERE ID = ?");
            $stmt->execute([$name, $_SESSION['uid']]);
            echo "Username changed sucessfully";
            $_SESSION['username'] = $name;
        }
        else
        {
            echo "Arere. Username already exists. Pick another. Or the current one is also perfectly fine if you ask me...";
        }
    }
}