<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './InvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class InvoiceRepository extends AbstractRepository
{
    public $invoicesList = array();

    public function getInvoices($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        try{
            $this->invoicesList = array();
            $statement =  'FROM fakturysprzedazy';
            $stmt = $this->connection->prepare('SELECT *'.$statement);
            $result = $stmt->execute();
            $allInvoices = $stmt->fetchAll();
            $size = $this->countInvoices();
            for ($i =0;$i<$size;$i++){
                $singleInvoice = new InvoiceClass();
                $singleInvoice->setId($allInvoices[$i]["ID"]);
                $singleInvoice->setInvoiceNumber($allInvoices[$i]["NumerFaktury"]);
                $singleInvoice->setContactorData($allInvoices[$i]["DaneKontrahenta"]);
                $singleInvoice->setNetAmount($allInvoices[$i]["KwotaNetto"]);
                $singleInvoice->setVatTax($allInvoices[$i]["KwotaPodatkuVAT"]);
                $singleInvoice->setGrossAmount($allInvoices[$i]["KwotaBrutto"]);
                $singleInvoice->setSaleDate($allInvoices[$i]["DataSprzedazy"]);
                $singleInvoice->setAmountInCurrency($allInvoices[$i]["KwotaNettoWWalucie"]);
                $singleInvoice->setCurrency($allInvoices[$i]["Waluta"]);
                $singleInvoice->setUrl($allInvoices[$i]["URL"]);
                $this->invoicesList[]=$singleInvoice;
            }
            return $this->invoicesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countInvoices($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        $statement = 'FROM fakturysprzedazy';
        $stmt = $this->connection->prepare('SELECT COUNT(*)'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}
