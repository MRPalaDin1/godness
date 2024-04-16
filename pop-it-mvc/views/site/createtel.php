<?php
if (app()->auth->user()->id_role == '0'):?>
    <div class="head">
        <div class="func"><h2 class="funch2">Создание телефона</h2>

            <form class="authform" method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
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

