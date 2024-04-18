<label>Фото пользователя: <img src="<?= app()->settings->getRootPath() ?>/public/image/<?= $abonent->img ?>" alt="Фото преподавателя"></label>

<?php


foreach ($abonent->telephones as $telephone) {
    echo "<p>Номера пользователя: $telephone->num</p>";
}


?>
