<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './InvoiceRepository.php';

class InvoiceController
{
    public static function index()
    {
        // tutaj jakaś logika
        die("Tu jest invoice list");
    }

    public static function add()
    {
        echo InvoiceViewAdd::render();
        return;
    }

    public static function view()
    {
        $invoiceRepository = new InvoiceRepository();
        $repository = $invoiceRepository->getInvoices();
        echo InvoiceView::render($invoiceRepository,$repository);
        return;
    }

    public static function search(){
        $netAmount = $_POST['searchBarNetAmount'];
        $invoiceNumber = $_POST['searchBarInvoiceNumber'];
        $contractor = $_POST['searchBarContractor'];
        $grossAmount = $_POST['searchBarGrossAmount'];
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];


        $invoiceRepository = new InvoiceRepository();
        $repository = $invoiceRepository->getInvoices($netAmount, $invoiceNumber, $contractor, $grossAmount, $dateFrom, $dateTo);
        echo InvoiceView::render($invoiceRepository, $repository);

        return;
    }

    public static function show()
    {



//        $invoiceId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
//        if (! $invoiceId) {
//            throw new \Exception("Lipa nie ma idika");
//        }
//
//        // pobieranie faktury
//        $invoiceRepository = new InvoiceRepository();
//        $invoice = $invoiceRepository->getInvoice($invoiceId);
//
//        // tutaj jakaś logika
//        echo InvoiceViewShow::render([
//            'invoice' => $invoice,
//        ]);
//        return;

//        die("Tu jest invoice show dla $invoiceId " . print_r($invoice, true));
    }
}
