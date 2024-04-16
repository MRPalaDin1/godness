<?php
if (app()->auth->user()->id_role == '0'):?>
<div class="head"><div class="func"><h2 class="funch2">Создание абонента</h2>
    <form class="authform" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="name" placeholder="Имя"></label>
        <label><input type="text" name="surname" placeholder="Фамилия"></label>
        <label><input type="text" name="patron" placeholder="Отчество"></label>
        <label><input type="date" name="date" placeholder="Дата рождения (ггггммдд)"></label>

        <button type="submit">Добавить</button>
    </form>
    </div>

    <div class="func"><h2 class="funch2">Прикрепление к телефону</h2>
            <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/attatel">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label class="select" for="surname">Пользователь
                    <select id="surname" name="id_abonents">
                        <?php
                        foreach ($abonents as $abonent) {
                            echo "<option label='$abonent->name'>$abonent->id_abonents</option>";
                        }
                        ?>
                    </select>
                </label>
                <label class="select" for="telephone">Телефон
                    <select id="telephone" name="id_num">
                        <?php

                        foreach ($telephones as $telephone) {
                            echo "<option label='$telephone->num'>$telephone->id_num</option>";
                        }
                        ?>
                    </select>
                </label>
                <button type="submit">Добавить</button>
            </form>
        </div>

        <div class="func"><h2 class="funch2">Создание помещения</h2>

            <form class="authform" method="post" action="/createroom">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label><input type="text" name="login" placeholder="Вид помещения"></label>
                <label><input type="text" name="text" placeholder="Название"></label>
                <label class="select" for="room">Подразделение
                    <select id="room" name="fruits">
                        <?php foreach ($divisions as $division): ?>
                            <option><?php echo $division->title; ?></option>
                        <?php endforeach; ?>
                        }
                        ?>
                    </select>
                </label>
                <button type="submit">Добавить</button>
            </form>
        </div>

        <div class="func"><h2 class="funch2">Создание подразделения</h2>

            <form class="authform" method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
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

            <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/createtel">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label><input type="text" name="login" placeholder="Номер"></label>
                <label class="select" for="roomes">Помещение <select id="roomes" name="fruits">
                        <?php foreach ($rooms as $room): ?>
                            <option><?php echo $room->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit">Добавить</button>
            </form>
        </div>

</div>


<?php
else:
    ?>
    <h2>Вы батька(</h2>
<?php
endif;
