<?php
date_default_timezone_set("UTC");
session_start();

spl_autoload_register(function($class){
    include __DIR__.'/Models/'.$class.'.php';
});

if( isset($_COOKIE['Token']) && isset($_COOKIE['Timeout']) && isset($_SESSION['Username'])){
    $userTable = new UsersTable();
    $user=new User($userTable->fetchToken($_COOKIE['Token']));
    if($_COOKIE['Token'] == $user->getToken()  &&  ((int)$_COOKIE['Timeout']>time() && (int)$_COOKIE['Timeout']<strtotime("+24 hours")) ){        // Checks that the value of the cookie is the same as the token in the database. If it isnt the cookie is removed and the token in the database is removed. The user is no longer logged in.
        $_SESSION['LoggedIn'] = true;
        $_SESSION['LoginTime']=$user->getLastLogin();
        $_SESSION['Username']=$user->getUsername();
        $_SESSION['UserID']=$user->getID();
        if($user->getIsAdmin() == 1){
            $_SESSION['isAdmin'] = true;
        }else{
            $_SESSION['isAdmin'] = false;
        }
    }else{
        header("location: logout.php");
        
    }
    
}else{
    $_SESSION['LoggedIn']=false;
}