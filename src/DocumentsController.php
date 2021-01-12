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
}