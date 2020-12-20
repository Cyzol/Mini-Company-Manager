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
    public function Select($statement="",$parameters=[]){
        try{
            $stmt = $this->executeStatement( $statement , $parameters );
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public function Insert($statement="",$parameters=[]){
        try{
            $this->executeStatement( $statement , $parameters );
            return $this->connection->lastInsertId();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}