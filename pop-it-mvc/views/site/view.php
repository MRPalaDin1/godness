<?php
if (app()->auth->user()->id_role == '0'):?>
<div class="head">
    <div class="func"><h2 class="funch2">Выбор подразделения</h2>

        <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/viewdiv">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="select" for="room">Подразделение
                <select id="telephone" name="id_division">
                    <?php
                    foreach ($divisions as $division) {
                        echo "<option label='$division->title'>$division->id_division</option>";
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
            <button>Просмотр</button>
        </form>

        <div>
            <h2>Номера подразделения: </h2>
            <?php
            foreach ($telephones as $telephone) {
                var_dump($telephone->num);
            }
            ?>
        </div>
    </div>


    <div class="func"><h2 class="funch2">Выбор номеров пользователя</h2>

        <form class="authform" method="post" action="<?= app()->settings->getRootPath() ?>/viewdivroom">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="select" for="room">Пользователь
                <select name="abonent">
                    <option value="class"></option>
                    <?php

                    foreach ($abonents as $abonent) {
                        echo "<option label='$abonent->name'>$abonent->id_abonents</option>";
                    }
                    ?>
                </select>
            </label>
            <button type="submit">Просмотр</button
        </form>

        <div>
            <h2>Номера пользователя: </h2>
            <?php
            foreach ($telephones as $telephone) {
                var_dump($telephone->num);
            }
            ?>
        </div>

    </div>


    <div class="func"><h2 class="funch2">Выбор пользователей по подразделениям и помещениям</h2>

        <form class="authform" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="select" for="room">Подразделение
                <select id="telephone" name="id_division">
                    <?php
                    foreach ($divisions as $division) {
                        echo "<option label='$division->title'>$division->id_division</option>";
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
            <label class="select" for="roomes">Помещение <select id="roomes" name="room_num">
                    <?php
                    foreach ($rooms as $room) {
                        echo "<option label='$room->title'>$room->room_num</option>";
                    }
                    ?>
                </select>
            </label>
            <button>Просмотр</button>
        </form>

        <div>
            <h2>Пользователи: </h2>
            <?php
            foreach ($telephones as $telephone) {
                var_dump($telephone->num);
            }
            ?>
        </div>

    </div>
</div>

<?php
else:
    ?>
    <h2>Вы батька(</h2>
<?php
endif;