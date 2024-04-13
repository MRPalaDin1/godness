<?php
echo $message;
if (app()->auth->user()->id_role == '1'):?>
    <div class="auth"><h2 class="authh2">Регистрировать</h2>
    <form class="authform" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="login" placeholder="Логин"></label>
        <label><input type="password" name="password" placeholder="Пароль"></label>
        <button>Зарегистрировать</button>
    </form>
    </div>
<?php
else:
    ?>

    <h2>Вы не батька(</h2>
<?php
endif;

