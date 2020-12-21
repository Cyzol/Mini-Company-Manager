<?php


class RegisterViewIndex
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="index.php?action=login-set">
                <div class="title">
                    <h1 class="title title-large">Sign Up</h1>
                </div>
                <input id="user-name" type="text" name="username" placeholder="Username">
                <input id="first-name" type="text" name="firstname" placeholder="Firstname">
                <input id="last-name" type="text" name="lastname" placeholder="Lastname">
                <input id="e-mail" type="text" name="email" placeholder="E-mail">
                <input id="user-password" type="text" name="password" placeholder="Password">
                <input id="user-confirm-password" type="text" name="confirm-password" placeholder="Confirm password">
                <input type="submit" value="Register">
            </form>
        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}