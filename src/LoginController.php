<?php
require_once __DIR__ . '/../autoload.php';

class LoginController
{
    public static function index()
    {
        echo LoginViewIndex::render();
        return;
    }

    public static function set($currentUser)
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user = $currentUser->getUserFromRepository($username,$password);
        if ($user->getUsername()!=null AND $user->getPassword()!=null AND $user->getRole()!=null){
            $currentUser->setUser($user);
            $_SESSION["LoggedIn"] = true;
            $_SESSION["Username"] = $currentUser->getUser()->getUsername();
            $_SESSION["Role"] = $currentUser->getUser()->getRole();
        }
        print_r($currentUser);
//        header('Location: index.php?action=home-page');
    }

    public static function logout()
    {
        echo Layout::logout();
        session_unset();
        session_destroy();
    }
}
