<?php


class LicenseView
{
    public static function render()
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
        <?= Layout::backToHomePage() ?>
        <div class="header-table">
            <h1>License</h1>
        </div>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th scope="col">Inventory number</th>
                    <th scope="col">License name</th>
                    <th scope="col">Serial number</th>
                    <th scope="col">Purchase date</th>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Support date</th>
                    <th scope="col">Expiration date</th>
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