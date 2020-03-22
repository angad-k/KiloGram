<?php

namespace Controller;
session_start();
class ChangeUsername 
{
    public function get()
    {
        $newUsername = $_GET['newUsername'];
        \Model\ChangeUsername::changeUsername($newUsername);
    }
}