<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';

class InvoiceRepository
{
    private $connection = null;
    private $invoicesList = [];

    public function __construct(){
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try{
            $stmt = $this->connection->prepare('SELECT * FROM fakturysprzedazy');
            $result = $stmt->execute();
            print(result);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getInvoice($id)
    {
        return ['abc'];
    }
}
