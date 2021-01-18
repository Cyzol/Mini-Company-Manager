<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/./userRepository.php';
require_once __DIR__ . '/./userClass.php';

class currentUser
{
    public $user;

    public function __construct(){
        $user = new userClass();
        $user->setId(null);
        $user->setUsername(null);
        $user->setPassword(null);
        $user->setRole(null);
        $this->setUser($user);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public static function getUserFromRepository($username,$password)
    {
        $userRepository = new userRepository();
        $user = $userRepository->findUser($username,$password);
        return $user;
    }

    public static function canLogin()
    {
        if (!isset($_SESSION['Username']) AND !isset($_SESSION['Role'])) {
            return True;
        }
        else{
            return False;
        }
    }

    public function canUploadInvoice()
    {
        if ($this->getUser()->hasRole(0) OR $this->getUser()->hasRole(1)){
            return True;
        }
        else{
            return False;
        }
    }

    public function canViewInvoice()
    {
        if ($this->getUser()->hasRole(0) OR $this->getUser()->hasRole(1) OR $this->getUser()->hasRole(2)){
            return True;
        }
        else{
            return False;
        }
    }
}