<?php


class EquipmentView
{
    public static function render()
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
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
                </tbody>
            </table>
        </div>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}