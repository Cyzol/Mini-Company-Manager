<?php
class Layout
{
    public static function header()
    {
        ob_start();
        ?>
            <html>
            <head>
                <title>M&M – Mini-Company Manager</title>
                <link rel="stylesheet" href="./styles/style.css">
            </head>
            <body>
            <?= self::navbar() ?>
            <?= isset($_SESSION['uid']) && $_SESSION['uid'] ? 'Zalogowany' : 'Wylogowany' ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function footer()
    {
        ob_start();
        ?>
            <link>
            </body>
        <div class="footer">
            <p>To jest footer</p>
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
            <h2 class="logo"><a href="index.html">M&M</a></h2>
            <nav>
                <ul class="nav_links">
                    <li><a href="index.php?action=login-set">faktura sprzedaży</a></li>
                    <li><a href="">faktura zakupu</a></li>
                    <li><a href="">dokumenty</a></li>
                    <li><a href="">sprzęt</a></li>
                    <li><a href="">licencje</a></li>
                    <li><a href="">Zaloguj sie</a></li>
                </ul>
            </nav>
        </header>
        <?php
        $html = ob_get_clean();
        return $html;
    }

}
