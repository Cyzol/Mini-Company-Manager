<?php


class EquipmentViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="" enctype="multipart/form-data">
                <div class="title">
                    <h1 class="title title-large">Equipment</h1>
                </div>
                <input id="id-equipment" type="text" name="idequipment" placeholder="Inventory number" required="required" pattern='[/\A-Z0-9]*'>

                <input id="equipment-name" type="text" name="equipmentname" placeholder="Equipment name" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="serial-number" type="text" name="serialnumber" placeholder="Serial number" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="equipment-date" type="date" name="equipmentdate" placeholder="Date" required="required">
                <input id="id-invoice-equipment" type="text" name="idinvoiceequipment" placeholder="Invoice number" required="required" pattern='[/\A-Z0-9]*'>
                <input id="warranty-date" type="date" name="warrantydate" placeholder="Warranty date" required="required">

                <input id="net-amount-equipment" type="number" step="0.01" name="netamountequipment" placeholder="Equipment net amount" required="required" pattern="[0-9]{1,10}">
                <input id="equipment-owner" type="text" name="equipmentowner" placeholder="Equipment owner" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="equipment-notes" type="text" name="equipmentnotes" placeholder="Equipment notes" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">


                <input type="submit" name="submit" value="Add invoice">
                <a href="index.php?action=home-page">Back</a>
            </form>
        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }

}