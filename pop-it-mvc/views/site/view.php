<?php
if (app()->auth->user()->id_role == '0'):?>
<div class="head">
    <div class="func"><h2 class="funch2">Выбор подразделения</h2>

        <form class="authform" method="post">
            <label class="select" for="room">Подразделение
                <select id="room" name="fruits">
                    <option value="class">Номер</option>
                </select>
            </label>
            <button>Просмотр</button>
        </form>
    </div>


    <div class="func"><h2 class="funch2">Выбор номеров пользователя</h2>

        <form class="authform" method="post">
            <label class="select" for="room">Пользователь
                <select id="room" name="fruits">
                    <option value="class">Васька</option>
                </select>
            </label>
            <button>Просмотр</button>
        </form>
    </div>


    <div class="func"><h2 class="funch2">Выбор пользователей по подразделениям и помещениям</h2>

        <form class="authform" method="post">
            <label class="select" for="room">Подразделение
                <select id="room" name="fruits">
                    <option value="class">Первое</option>
                </select>
            </label>
            <label class="select" for="room">Помещение
                <select id="room" name="fruits">
                    <option value="class">Класс</option>
                </select>
            </label>
            <button>Просмотр</button>
        </form>
    </div>
</div>
<?php
else:
    ?>
    <h2>Вы батька(</h2>
<?php
endif;