<?php

require_once __DIR__ . './../database/PurchaseInvoice.php';

$target_dir = "./../uploads/PurchaseInvoice/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $PurchaseInvoice = new PurchaseInvoice();
        $PurchaseInvoice->insert(array('purchaseid'=>$_POST['purchaseid'],'idinvoice'=>$_POST['idinvoice'],'contractordata'=>$_POST['contractordata'],
            'netamount'=>$_POST['netamount'], 'grossamount'=>$_POST['grossamont'], 'vattax'=>$_POST['vattax'], 'date'=>$_POST['dateinvoice'],
            'amountincurrency'=>$_POST['amountincurrency'], 'currency'=>$_POST['currency'] ,'fileToUpload'=>$target_file));
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>