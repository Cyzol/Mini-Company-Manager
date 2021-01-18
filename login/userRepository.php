<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../database/config.php';
require_once __DIR__ . '/./userClass.php';

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
            $user = new UserClass();
            if ($userDB==null){
                $user->setId(null);
                $user->setUsername(null);
                $user->setPassword(null);
                $user->setRole(null);
            }
            else{
                $user->setId($userDB[0]["ID"]);
                $user->setUsername($userDB[0]["Username"]);
                $user->setPassword($userDB[0]["Password"]);
                $user->setRole($userDB[0]["Role"]);
            }
            return $user;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}