<?php

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../src/InvoiceRepository.php';

$id = $_POST['searchBarId'];
$invoiceNumber = $_POST['searchBarInvoiceNumber'];
$contractor = $_POST['searchBarContractor'];
$vat = $_POST['searchBarVat'];

$invoiceRepository = new InvoiceRepository();
$repository = $invoiceRepository->getInvoices($id, $invoiceNumber, $contractor, $vat);
echo InvoiceView::render($invoiceRepository, $repository);
