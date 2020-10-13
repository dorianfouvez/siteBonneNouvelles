<?php

class LoginController{

    private $_db;

    public function __construct($db){    
        $this->_db = $db;
    }

    public function run(){

        # Check if the user is not already login
        if(!empty($_SESSION["id_user"])){
            header('Location:index.php?action=myProfile');
            # Second stop for be sure to dont stay in this page
            die();
        }

        #Locals variables
        $message = null;

        # Check if the formulary is used or not
        if(!empty($_POST)) {
            if (!empty($_POST["username"])) {
                if (!empty($_POST["password"])) {
                    $user = $this->_db->validate_user($_POST["username"],$_POST["password"]);
                    if(!empty($user)){
                        #Prove the login for other page
                        $_SESSION["id_user"] = $user->getId();
                        header('Location:index.php?action=myProfile');
                    }else {
                        $message = "Le pseudo ou le mot de passe n'est pas correct !";
                    }
                } else {
                    $message = "Veuillez rentrer un mot de passe !";
                }
            } else {
                $message = "Veuillez rentrer un pseudo !";
            }
        }

        require_once(CHEMIN_VIEWS . 'login.php');
    }

}