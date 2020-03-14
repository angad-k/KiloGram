<?php

namespace Controller;
session_start();
class Home 
{
    public function get()
    {
        if(isset($_SESSION['username']))
        {
            echo \View\Loader::make()->render("templates/home.twig",
            array(
                "username" => $_SESSION['username']
            ));
        }
        else
        {
            echo \View\Loader::make()->render("templates/login.twig");
        }
        
    }
    public function post()
    {
        if($_POST['logsin'] == "signup")
        {
            if(($_POST['username'] != "")&&($_POST['password'] != "")&&($_POST['email'] != ""))
            {
                //yeh if mei email check karne ka baadme add kr de
                if(1 == 1)
                {
                    
                    $count = \Model\Home::checkusername($_POST['username']);
                    echo $count;
                    if($count == 0)
                    {
                        $count = \Model\Home::checkemail($_POST['email']);
                        if($count == 0)
                        {
                            \Model\Home::createAccount($_POST['username'], $_POST['password'], $_POST['email']);
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: /");
                            exit();

                        }
                        else
                        {
                            echo \View\Loader::make()->render("templates/login.twig",
                            array(
                                "errorMsgSignup" => "Arere... Someone with the same email already registered... What a co-incidence bro!!!"
                            ));    
                        }
                    }
                    else
                    {
                        echo \View\Loader::make()->render("templates/login.twig",
                        array(
                            "errorMsgSignup" => "Username already exists, pick another one. Or just put a random number in front of it for God's sake!"
                        ));   
                    }
                }
                else
                {
                    echo \View\Loader::make()->render("templates/login.twig",
                    array(
                        "errorMsgSignup" => "Please enter a valid email address!"
                    ));
                }
            }
            else
            {
                echo \View\Loader::make()->render("templates/login.twig",
                array(
                    "errorMsgSignup" => "Please fill all entries!"
                ));
            }
        }
        if($_POST[logsin] == "login")
        {
            
        }
    }
}