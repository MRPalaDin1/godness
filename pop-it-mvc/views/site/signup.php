<div class="auth"><h2 class="authh2">Регистрация</h2>
<h3><?= $message ?? ''; ?></h3>
<form class="authform" method="post">
    <label><input type="text" name="login" placeholder="Логин"></label>
    <label><input type="password" name="password" placeholder="Пароль"></label>
    <button>Зарегистрироваться</button>
</form>
</div>