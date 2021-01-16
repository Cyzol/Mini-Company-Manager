<?php


class EquipmentView
{
    public static function render($repositoryObject, $equipmentRepository)
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
        <?= Layout::backToHomePage() ?>
        <div class="header-table">
            <h1>Equipment</h1>
        </div>
        <?= Layout::searchbarEquipment() ?>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Inventory number</th>
                    <th scope="col">Equipment name</th>
                    <th scope="col">Serial number</th>
                    <th scope="col">Purchase date</th>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Varranty date</th>
                    <th scope="col">Net amount</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Notes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < $repositoryObject->countEquipments() ; $i++) {

                ?>
                    <tr>
                        <th scope="row"><?php print_r($equipmentRepository[$i]->getId())?></th>
                        <td><?php print_r($equipmentRepository[$i]->getIdequipment())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getEquipmentname())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getSerialnumber())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getEquipmentdate())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getIdinvoiceequipment())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getWarrantydate())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getNetamountequipment())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getEquipmentowner())?></td>
                        <td><?php print_r($equipmentRepository[$i]->getEquipmentnotes())?></td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}