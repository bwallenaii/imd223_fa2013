<?php
require_once("table.php");

class User extends Table
{
    protected $tableName = "users";
    
    private $salt = "vn2an7Afa5an#QG3";
    
    public function getPassword()
    {
        return "********";
    }
    
    public static function getUserByName($name)
    {
        $pd = new PDatabase();
        $pd->addStatement("getUser", "SELECT * FROM `users` WHERE `username` LIKE :name");
        $dt = $pd->runStatement("getUser", array(":name" => $name));
        if($dt)
        {
            return new User($dt);
        }
        return false;
    }
    
    public static function login($username, $password)
    {
        $user = self::getUserByName($username);
        if($user)
        {
            if($user->verifyPassword($password))
            {
                return $user;
            }
        }
        return false;
    }
    
    public static function isNameUsed($name)
    {
        return !self::getUserByName($name);
    }
    
    public function setPassword($pass)
    {
        $this->data->password = $this->hashPass($pass);
    }
    
    private function hashPass($pass)
    {
        return hash("sha512", $this->salt.$pass);
    }
    
    public function verifyPassword($pass)
    {
        if(empty($this->data->id) || empty($this->data->password))
        {
            return false;
        }
        if($this->hashPass($pass) == $this->data->password)
        {
            return true;
        }
        return false;
    }
}