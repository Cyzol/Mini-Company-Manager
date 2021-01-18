<?php
require_once __DIR__ . '/../autoload.php';

class userClass
{
    public $id;
    public $username;
    public $password;
    public $role;
    //0 - admin
    //1 - auditor
    //2 - employee

    public function hasRole($role){
        if(isset($_SESSION['LoggedIn']) AND isset($_SESSION['Username']) AND isset($_SESSION['Role'])) {
            if ($_SESSION["Role"] == $role) {
                return True;
            }
        }
        return False;
//        if ($this->role == $role) {
//            return true;
//        }
//        else{
//            return false;
//        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}
