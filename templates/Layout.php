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
                    <li><a href="">equipment</a></li>
                    <li><a href="">license</a></li>
                </ul>
            </nav>
        </header>
        <?php
        $html = ob_get_clean();
        return $html;
    }

}
