<?php
if (app()->auth->user()->id_role == '0'):?>
<div class="head"><div class="func"><h2 class="funch2">Создание абонента</h2>
    <form class="authform" method="post">
        <label><input type="text" name="login" placeholder="Имя"></label>
        <label><input type="text" name="password" placeholder="Фамилия"></label>
        <label><input type="text" name="login" placeholder="Отчество"></label>
        <label><input type="date" name="password" placeholder="Дата рождения"></label>
        <label><input type="text" name="login" placeholder="Подразделение"></label>
        <button>Добавить</button>
    </form>
</div>

<div class="func"><h2 class="funch2">Прикрепление к телефону</h2>
    <form class="authform" method="post">
        <label class="select" for="surname">Пользователь <select id="surname" name="fruits">
                <option value="surname">Васька</option>
            </select>
        </label>
        <label><input type="text" name="text" placeholder="Номер телефона"></label>
        <button>Добавить</button>
    </form>
    </div>


<div class="func"><h2 class="funch2">Создание помещения</h2>

    <form class="authform" method="post">
        <label class="select" for="room">Вид помещения
        <select id="room" name="fruits">
            <option value="class">Кабинет</option>
            <option value="auditory">Аудитория</option>
            <option value="office">Офис</option>
        </select>
        </label>
        <label><input type="text" name="text" placeholder="Название"></label>
        <label><input type="text" name="text" placeholder="Подразделение"></label>
        <button>Добавить</button>
    </form>
</div>


<div class="func"><h2 class="funch2">Создание подразделения</h2>

    <form class="authform" method="post">
        <label><input type="text" name="login" placeholder="Название"></label>
        <label class="select" for="rooms">Вид <select id="rooms" name="fruits">
            <option value="lives">Жилое</option>
            <option value="product">Производственное</option>
            <option value="marketing">Маркетинговое</option>
        </select>
        </label>
        <button>Добавить</button>
    </form>
</div>


<div class="func"><h2 class="funch2">Создание телефона</h2>

    <form class="authform" method="post">
        <label><input type="text" name="login" placeholder="Номер"></label>
        <label class="select" for="roomes">Помещение <select id="roomes" name="fruits">
            <option value="lives">Жилое</option>
        </select>
        </label>
        <button>Добавить</button>
    </form>
</div>
</div>

<?php
else:
    ?>
    <h2>Вы батька(</h2>
<?php
endif;
