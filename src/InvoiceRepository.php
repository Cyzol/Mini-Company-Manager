<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './InvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class InvoiceRepository extends AbstractRepository
{
    public $invoicesList = array();

    public function getInvoices($netAmount=null, $invoiceNumber=null, $contractorData=null,$grossAmount=null, $dateFrom = null, $dateTo =null){

        $statement = '';
        $where = ' WHERE ';
        $and = ' AND ';
        $flag = 0;
        $apo = "'";

        if($netAmount != null){
            $statement = $where.'KwotaNetto = '.$netAmount;
            $flag = 1;
        }

        if($invoiceNumber != null){
            if($flag == 0){
                $statement = $where.'NumerFaktury = '.$invoiceNumber;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'NumerFaktury = '.$invoiceNumber;
            }
        }

        if($contractorData != null){
            if($flag == 0){
                $statement = $where.'DaneKontrahenta = '.$apo.$contractorData.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'DaneKontrahenta = '.$apo.$contractorData.$apo;
            }
        }

        if($grossAmount != null){
            if($flag == 0){
                $statement = $where.'KwotaBrutto = '.$grossAmount;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'KwotaBrutto = '.$grossAmount;
            }
        }

        if($dateFrom != null AND $dateTo != null){
            if($flag == 0){
                $statement = $where.'DataSprzedazy BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'DataSprzedazy BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
            }
        }else{

            if($dateFrom != null){
                if($flag == 0){
                    $statement = $where.'DataSprzedazy >= '.$apo.$dateFrom.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataSprzedazy >= '.$apo.$dateFrom.$apo;
                }
            }

            if($dateTo != null){
                if($flag == 0){
                    $statement = $where.'DataSprzedazy <= '.$apo.$dateTo.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataSprzedazy >= '.$apo.$dateTo.$apo;
                }
            }
        }





        try{
            $this->invoicesList = array();
            $stmt = $this->connection->prepare('SELECT * FROM fakturysprzedazy'.$statement);
            $result = $stmt->execute();
            $allInvoices = $stmt->fetchAll();
            $size = $this->countInvoices($statement);
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

    public function countInvoices($statement=null){
        $stmt = $this->connection->prepare('SELECT COUNT(*) FROM fakturysprzedazy'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}
