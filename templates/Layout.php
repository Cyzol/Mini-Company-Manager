<?php
class Layout
{
    public static function header()
    {
        ob_start();
        ?>
            <html>
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="./assets/styles/style.css">
                <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="styleheet">
                <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
                <title>M&M – Mini-Company Manager</title>
            </head>
            <body>
<!--            --><?//= self::navbar() ?>
<!--            --><?//= isset($_SESSION['uid']) && $_SESSION['uid'] ? 'Zalogowany' : 'Wylogowany' ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function bodyPage(){
        ob_start();
        ?>
            <section class="banner-area" id="bannerArea">
                <h1>collect all documents.</h1>
                <div class="arrow"><a href="#tilesSection">&#8595;</a></div>
            </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function footer()
    {
        ob_start();
        ?>

            </body>
        <div class="footer">
            <p>M&M – Mini-Company Manager</p>
        </div>
            </html>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function logout()
    {
        ob_start();
        ?>
            <h1>Wylogowano Cie</h1>

        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function tiles(){

        ob_start();
        ?>
        <section class="tiles-section" id="tilesSection">
            <h2>View all documents</h2>
            <div class="tiles">
                <div class="tile" id="salesInvoiceTile"><a href="index.php?action=invoice-view"><i class="fas fa-file-contract"></i><span>Sales Invoice</span></a></div>
                <div class="tile" id="purchaseInvoiceTile"><a href="index.php?action=purchase-invoice-view"><i class="fas fa-file-invoice-dollar"></i><span>Purchase Invoice</span></a></div>
                <div class="tile" id="documentsTile"><a href="index.php?action=documents-view"><i class="fas fa-file-word"></i><span>Documents</span></a></div>
                <div class="tile" id="equipmentTile"><a href="#"><i class="fas fa-laptop"></i><span>Equipment</span></a></div>
                <div class="tile" id="licenseTile""><a href="#"><i class="fas fa-book"></i><span>License</span></a></div>
            </div>

        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }


    public static function navbar()
    {
        ob_start();
        ?>
        <header>
            <h2 class="logo"><a href="index.php?action=home-page">M&M</a></h2>
            <nav>
                <ul class="nav_links">
                    <li><a href="index.php?action=invoice-add">sales invoice</a></li>
                    <li><a href="index.php?action=purchase-invoice-add">purchase invoice</a></li>
                    <li><a href="index.php?action=documents-add">documents</a></li>
                    <li><a href="index.php?action=equipment-add">equipment</a></li>
                    <li><a href="index.php?action=license-add">license</a></li>
                </ul>
            </nav>
        </header>
        <?php
        $html = ob_get_clean();
        return $html;
    }

}
