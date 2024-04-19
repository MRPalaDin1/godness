<?php
if (app()->auth->user()->id_role == '0'):?>
<div class="head"><div class="func"><h2 class="funch2">Создание абонента</h2>
    <form class="authform" method="post" enctype="multipart/form-data">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="name" placeholder="Имя" required></label>
        <label><input type="text" name="surname" placeholder="Фамилия" required></label>
        <label><input type="text" name="patron" placeholder="Отчество" required</label>
        <label><input type="date" name="date" placeholder="Дата рождения (ггггммдд)" required></label>
        <label><input type="file" name="img" placeholder="Фото" required></label>
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

            <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/createroom">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label class="select" for="rooms">Вид помещения<select id="room" name="room">
                        <option value="Комната">Комната</option>
                        <option value="Офис">Офис</option>
                        <option value="Аудитория">Аудитория</option>
                    </select>
                </label>
                <label><input type="text" name="title" placeholder="Название" required></label>
                <label class="select" for="room">Подразделение
                    <select id="telephone" name="id_division">
                        <?php
                        foreach ($divisions as $division) {
                            echo "<option label='$division->view'>$division->id_division</option>";
                        }
                        ?>
                    </select>
                    <select id="type" name="view">
                        <?php
                        foreach ($types as $type) {
                            echo "<option label='$type->room_type'>$type->id_room_type</option>";
                        }
                        ?>
                    </select>
                </label>
                <button type="submit">Добавить</button>
            </form>
        </div>

        <div class="func"><h2 class="funch2">Создание подразделения</h2>

            <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/creatediv">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label><input type="text" name="view" placeholder="Название" required></label>
                <label><input type="text" name="title" placeholder="Номер" required></label>
                <label class="select" for="rooms">Вид <select id="rooms" name="fruits">
                        <option value="Жилое">Жилое</option>
                        <option value="Производственное">Производственное</option>
                        <option value="Маркетинговое">Маркетинговое</option>
                    </select>
                </label>
                <button>Добавить</button>
            </form>
        </div>

        <div class="func"><h2 class="funch2">Создание телефона</h2>

            <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/createtel">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label><input type="text" name="num" placeholder="Номер" required></label>
                <label class="select" for="roomes">Помещение <select id="roomes" name="room_num">
                        <?php
                        foreach ($rooms as $room) {
                            echo "<option label='$room->title'>$room->room_num</option>";
                        }
                        ?>
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
