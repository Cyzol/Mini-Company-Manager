<?php
require_once '../autoload.php';
require_once '../database/config.php';
require_once './userClass.php';

class userRepository
{
    private $connection = null;

    public function __construct(){
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function findUser($username,$password){
        try{
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE Username='".$username."' AND Password='".$password."';");
            $result = $stmt->execute();
            $userDB = $stmt->fetchAll();
            if ($userDB==null){
                return null;
            }
            else{
                $user = new UserClass();
                $user->setId($userDB["ID"]);
                $user->setUsername($userDB["Username"]);
                $user->setPassword($userDB["Password"]);
                $user->setRole($userDB["Role"]);
                return $user;
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}