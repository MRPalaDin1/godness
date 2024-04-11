<?php
if (app()->auth->user()->role ?? 'admin'):
    ?><div class="auth"><h2 class="authh2">Регистрировать</h2>
    <form class="authform" method="post">
        <label><input type="text" name="login" placeholder="Логин"></label>
        <label><input type="password" name="password" placeholder="Пароль"></label>
        <button>Зарегистрировать</button>
    </form>
    </div>
<?php
else:
    ?>

    <a>Вы не батька(</a>
<?php
endif;