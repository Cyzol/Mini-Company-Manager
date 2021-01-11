<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './PurchaseInvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class PurchaseInvoiceRepository extends AbstractRepository
{
    public $purchaseInvoicesList = array();

    public function getPurchaseInvoices($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        try{
            $this->purchaseInvoicesList = array();
            $statement =  'FROM fakturyzakupu';
            $stmt = $this->connection->prepare('SELECT *'.$statement);
            $result = $stmt->execute();
            $allPurchaseInvoices = $stmt->fetchAll();
            $size = $this->countPurchaseInvoices();
            for ($i =0;$i<$size;$i++){
                $singleInvoice = new PurchaseInvoiceClass();
                $singleInvoice->setId($allPurchaseInvoices[$i]["ID"]);
                $singleInvoice->setPurchaseId($allPurchaseInvoices[$i]["IdentyfikatorFaktury"]);
                $singleInvoice->setIdInvoice($allPurchaseInvoices[$i]["NumerFaktury"]);
                $singleInvoice->setContractorData($allPurchaseInvoices[$i]["DaneKontrahenta"]);
                $singleInvoice->setNetAmount($allPurchaseInvoices[$i]["KwotaNetto"]);
                $singleInvoice->setGrossAmount($allPurchaseInvoices[$i]["KwotaPodatkuVAT"]);
                $singleInvoice->setVatTax($allPurchaseInvoices[$i]["KwotaBrutto"]);
                $singleInvoice->setDateInvoice($allPurchaseInvoices[$i]["DataZakupu"]);
                $singleInvoice->setAmountInCurrency($allPurchaseInvoices[$i]["KwotaNettoWWalucie"]);
                $singleInvoice->setCurrency($allPurchaseInvoices[$i]["Waluta"]);
                $singleInvoice->setFileToUpload($allPurchaseInvoices[$i]["URL"]);
                $this->purchaseInvoicesList[]=$singleInvoice;
            }
            return $this->purchaseInvoicesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countPurchaseInvoices($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        $statement = 'FROM fakturyzakupu';
        $stmt = $this->connection->prepare('SELECT COUNT(*)'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}