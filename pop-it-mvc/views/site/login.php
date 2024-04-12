<div class="auth"><h2 class="authh2">Вход</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form class="authform" method="post">
        <label><input type="text" name="login" placeholder="Логин"></label>
        <label><input type="password" name="password" placeholder="Пароль"></label>
        <button>Войти</button>
    </form>
</div>
<?php endif;
