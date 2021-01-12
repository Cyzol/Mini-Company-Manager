<?php


class LicenseView
{
    public static function render($repositoryObject,$licensesRepository)
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
                <?php
                for ($i = 0; $i <$repositoryObject->countLicenses(); $i++) {

                    ?>

                    <tr>
                        <th scope="row"><?php print_r($licensesRepository[$i]->getId())?></th>
                        <td><?php print_r($licensesRepository[$i]->getIdlicense())?></td>
                        <td><?php print_r($licensesRepository[$i]->getLicensename())?></td>
                        <td><?php print_r($licensesRepository[$i]->getSerialnumberlicense())?></td>
                        <td><?php print_r($licensesRepository[$i]->getLicensepurchasedate())?></td>
                        <td><?php print_r($licensesRepository[$i]->getIdinvoicelicense())?></td>
                        <td><?php print_r($licensesRepository[$i]->getSupportdate())?></td>
                        <td><?php print_r($licensesRepository[$i]->getAmountInCurrency())?></td>
                        <td><?php print_r($licensesRepository[$i]->getValidtodate())?></td>
                        <td><?php print_r($licensesRepository[$i]->getLicenseowner())?></td>
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