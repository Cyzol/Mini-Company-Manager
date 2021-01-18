<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './DocumentsRepository.php';

class DocumentsController
{

    public static function add()
    {
        echo DocumentsViewAdd::render();
        return;
    }

    public static function view()
    {
        $documentsRepository = new DocumentsRepository();
        $repository = $documentsRepository->getInvoices();
        echo DocumentsView::render($documentsRepository,$repository);
        return;
    }

    public static function search(){
        $documentNumber = $_POST['searchBarDocumentNumber'];
        $sender = $_POST['searchBarSender'];
        $recipient = $_POST['searchBarRecipient'];

        $DocumentsRepository = new DocumentsRepository();
        $repository = $DocumentsRepository->getInvoices($documentNumber, $sender, $recipient);
        echo DocumentsView::render($DocumentsRepository, $repository);

        return;
    }

}