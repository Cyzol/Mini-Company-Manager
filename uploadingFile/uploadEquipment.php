<?php

require_once __DIR__ . './../database/Equipment.php';

    $Equipment = new Equipment();
    $Equipment->insert(array('idequipment'=>$_POST['idequipment'],'equipmentname'=>$_POST['equipmentname'],'serialnumber'=>$_POST['serialnumber'],
        'equipmentdate'=>$_POST['equipmentdate'],'idinvoiceequipment'=>$_POST['idinvoiceequipment'],'warrantydate'=>$_POST['warrantydate'],
        'netamountequipment'=>$_POST['netamountequipment'],'equipmentowner'=>$_POST['equipmentowner'],'equipmentnotes'=>$_POST['equipmentnotes']));
    echo "Equipment has been uploaded.";


?>