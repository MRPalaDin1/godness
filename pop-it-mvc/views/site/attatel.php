<?php
if (app()->auth->user()->id_role == '0'):?>
    <div class="head">
        <div class="func"><h2 class="funch2">Прикрепление к телефону</h2>
            <form class="authform" method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label class="select" for="surname">Пользователь <select id="surname" name="fruits">
                        <option value="surname"></option>
                        <?php

                        foreach ($abonents as $abonent) {
                            echo "<option label='$abonent->name'>$abonent->id_abonents</option>";
                        }
                        ?>
                    </select>
                </label>
                <label><input type="text" name="text" placeholder="Номер телефона"></label>
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

