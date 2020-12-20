<?php


class FakturySprzedazy
{
    private $connection = null;

    public function __construct($dbhost ='localhost',$dbname ='bazadanych',$username='root',$password=''){
        try{
            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public function Select($statement="SELECT * FROM fakturysprzedazy"){
        try{
            $stmt = $this->connection->query($statement);
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public function Insert($statement=""){
        try{
            $this->connection->query($statement);
            return 1;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}