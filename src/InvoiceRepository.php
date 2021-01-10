<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './InvoiceClass.php';

class InvoiceRepository
{
    private $connection = null;
    private $invoicesList = array();

    public function __construct(){
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $allInvoices = $this->getAllInvoicesFromDB();
        for ($i =0;$i<sizeof($allInvoices);$i++){
            $singleInvoice = new InvoiceClass($allInvoices[$i]["ID"],$allInvoices[$i]["NumerFaktury"],$allInvoices[$i]["DaneKontrahenta"],$allInvoices[$i]["KwotaNetto"],$allInvoices[$i]["KwotaPodatkuVAT"],$allInvoices[$i]["KwotaBrutto"], $allInvoices[$i]["DataSprzedazy"],$allInvoices[$i]["KwotaNettoWWalucie"],$allInvoices[$i]["Waluta"],$allInvoices[$i]["URL"]);
            $this->invoicesList[]=$singleInvoice;
        }
    }

    public function getAllInvoicesFromDB(){
        try{
            $stmt = $this->connection->prepare('SELECT * FROM fakturysprzedazy');
            $result = $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getInvoices(){
        return $this->invoicesList;
    }

//    public function getInvoice($id)
//    {
//        return ['abc'];
//    }
}
