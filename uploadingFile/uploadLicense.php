<?php

require_once __DIR__ . './../database/License.php';

$License = new License();
$License->insert(array('idlicense'=>$_POST['idlicense'],'licensename'=>$_POST['licensename'],'serialnumberlicense'=>$_POST['serialnumberlicense'],
    'licensepurchasedate'=>$_POST['licensepurchasedate'],'idinvoicelicense'=>$_POST['idinvoicelicense'],'supportdate'=>$_POST['supportdate'],
    'validtodate'=>$_POST['validtodate'],'licenseowner'=>$_POST['licenseowner'],'licensenotes'=>$_POST['licensenotes']));
echo "License has been uploaded.";

?>