<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './DocumentsClass.php';
require_once __DIR__ . './AbstractRepository.php';

class DocumentsRepository extends AbstractRepository
{
    public $documentslist = array();

    public function getInvoices($documentNumber = null, $sender = null, $recipient = null, $dateFrom = null, $dateTo =null){

        $statement = '';
        $where = ' WHERE ';
        $and = ' AND ';
        $flag = 0;
        $apo = "'";

        if($documentNumber != null){
            $statement = $where.'IdentyfikatorDokumentu = '.$documentNumber;
            $flag = 1;
        }
        if($sender != null){
            if($flag == 0){
                $statement = $where.'Nadawca = '.$apo.$sender.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'Nadawca = '.$apo.$sender.$apo;
            }
        }
        if($recipient != null){
            if($flag == 0){
                $statement = $where.'Adresat = '.$apo.$recipient.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'Adresat = '.$apo.$recipient.$apo;
            }
        }

        if($dateFrom != null AND $dateTo != null){
            if($flag == 0){
                $statement = $where.'DataDokumentu BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'DataDokumentu BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
            }
        }else{

            if($dateFrom != null){
                if($flag == 0){
                    $statement = $where.'DataDokumentu >= '.$apo.$dateFrom.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataDokumentu >= '.$apo.$dateFrom.$apo;
                }
            }

            if($dateTo != null){
                if($flag == 0){
                    $statement = $where.'DataDokumentu <= '.$apo.$dateTo.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataDokumentu >= '.$apo.$dateTo.$apo;
                }
            }
        }

        try{
            $this->documentsList = array();
            $stmt = $this->connection->prepare('SELECT * FROM dokumenty'.$statement);
            $result = $stmt->execute();
            $allDocuments = $stmt->fetchAll();
            $size = $this->countDocuments($statement);
            for ($i =0;$i<$size;$i++){
                $singleDocument = new DocumentsClass();
                $singleDocument->setId($allDocuments[$i]["ID"]);
                $singleDocument->setIddocument($allDocuments[$i]["IdentyfikatorDokumentu"]);
                $singleDocument->setDateinvoice($allDocuments[$i]["DataDokumentu"]);
                $singleDocument->setSender($allDocuments[$i]["Nadawca"]);
                $singleDocument->setRecipient($allDocuments[$i]["Adresat"]);
                $singleDocument->setNotes($allDocuments[$i]["Notatki"]);
                $singleDocument->setUrl($allDocuments[$i]["URL"]);
                $this->documentsList[]=$singleDocument;
            }
            return $this->documentsList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countDocuments($statement){
        $stmt = $this->connection->prepare('SELECT COUNT(*) FROM dokumenty'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}