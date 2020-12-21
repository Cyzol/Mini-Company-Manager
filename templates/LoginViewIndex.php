<?php
class LoginViewIndex
{
    public static function render($params = [])
    {
        ob_start();
        ?>
            <?= Layout::header() ?>
            <section class ="box-section">

                <form class="box-form" method="post" action="index.php?action=login-set">
                    <div class="title">
                        <h1 class="title title-large">Sign In</h1>
                    </div>
                    <input id="user-name" type="text" name="username" placeholder="Username">
                    <input id="user-password" type="text" name="password" placeholder="Password">
                    <input type="submit" value="Login">
                    <p class="title title-subs">New user? <span><a href="#" class="linktext">Create an account</a></span></p>
                </form>
            </section>
            <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
