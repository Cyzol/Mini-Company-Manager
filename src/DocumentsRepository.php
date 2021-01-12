<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './DocumentsClass.php';
require_once __DIR__ . './AbstractRepository.php';

class DocumentsRepository extends AbstractRepository
{
    public $documentslist = array();

    public function getInvoices($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        try{
            $this->documentsList = array();
            $statement =  'FROM dokumenty';
            $stmt = $this->connection->prepare('SELECT *'.$statement);
            $result = $stmt->execute();
            $allDocuments = $stmt->fetchAll();
            $size = $this->countDocuments();
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

    public function countDocuments($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        $statement = 'FROM dokumenty';
        $stmt = $this->connection->prepare('SELECT COUNT(*)'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}