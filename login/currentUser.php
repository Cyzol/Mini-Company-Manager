<?php
require_once '../autoload.php';
require_once './userRepository.php';

class currentUser
{
    public static function getUser()
    {
        $userRepository = new userRepository();
        $user = $userRepository->findUser();
        return $user;
    }
}