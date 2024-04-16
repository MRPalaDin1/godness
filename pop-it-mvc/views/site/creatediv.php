<?php
if (app()->auth->user()->id_role == '0'):?>
    <div class="head">

        <div class="func"><h2 class="funch2">Создание помещения</h2>

            <form class="authform" method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label class="select" for="room">Вид помещения
                    <select id="room" name="fruits">
                        <option value="class">Кабинет</option>
                        <option value="auditory">Аудитория</option>
                        <option value="office">Офис</option>
                    </select>
                </label>
                <label><input type="text" name="text" placeholder="Название"></label>
                <label class="select" for="room">Подразделение
                    <select id="room" name="fruits">
                        <option value="class">Номер</option>
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

