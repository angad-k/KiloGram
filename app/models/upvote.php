<?php

namespace Model;
use PDO;
session_start();
class Upvote {
    public static function upvote($postID) 
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT likedBy, likes FROM posts WHERE ID = ?");
        $stmt->execute([$postID]);
        $result = $stmt->fetch();
        if($result['likedBy'] == NULL)
        {
            $likedBy = array($_SESSION['uid']);
            $stmt = $db->prepare("UPDATE posts SET likedBy = ?, likes = 1 WHERE ID = ?");
            $likedByArr =  \serialize($likedBy);
            $stmt->execute([$likedByArr, $postID]);
            echo "Liked.";
        }
        else
        {
            
            $likedByArr =  \unserialize($result['likedBy']);
            //var_dump($likedByArr);
            foreach($likedByArr as $i)
            {
                if($i === $_SESSION['uid'])
                {
                    echo "Already liked.";
                    return;
                }
            }
            array_push($likedByArr, $_SESSION['uid']);
            $likes = $result['likes'] + 1;
            $stmt = $db->prepare("UPDATE posts SET likedBy = ?, likes = ? WHERE ID = ?");
            $likedBy =  \serialize($likedByArr);
            $stmt->execute([$likedBy, $likes, $postID]);
            echo "Liked.";
        }
    }   
}