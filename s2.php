<?php
    date_default_timezone_set('Europe/Moscow');
    $wishes = require 'wishes.php';
    $today = new DateTime('today');
    $today->setTime(0, 0, 0);
    $birthday = DateTime::createFromFormat('d.m', '23.10');
    $birthday->setTime(0, 0, 0);
    $wasYesterday = $today->diff($birthday)->days === 1 && $birthday < $today;
    if ($birthday < $today) {
        $birthday->modify('+1 year');
    }
    $days = $today->diff($birthday)->days;
    if ($wasYesterday) {
        $title1 = "Вчера был твой день рождения!";
        $title2 = "Надеюсь, ты классно провёл время!";
    } else {
        switch ($days) {
            case 0:
                $title1 = "Сегодня твой день рождения!";
                $title2 = "Время праздновать!";
                break;
            case 1:
                $title1 = "Завтра твой день рождения!";
                $title2 = "Хорошенько подготовься!";
                break;
            default:
                $title1 = "До дня рождения ещё есть время...";
                $title2 = "У тебя неплохой запас ;)";
                break;
        }
    }
    if ($days !== 0 && !$wasYesterday) {
        $last_digit = $days % 10;
        $last_two = $days % 100;
        if ($last_two >= 11 && $last_two <= 14) {
            $word = "дней";
        } elseif ($last_digit == 1) {
            $word = "день";
            } elseif ($last_digit >= 2 && $last_digit <= 4) {
                $word = "дня";
                } else {
                    $word = "дней";
                }
    }
    if (isset($_POST['get_wish'])) {
    $random_index = array_rand($wishes);
    echo $wishes[$random_index];
    exit;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles2.css">
  <script src="script.js"></script>
  <title>С днём рождения, Дима!</title>
</head>
<body>
    <div class="stars-blink"></div>
    <div class="main-content">
        <div class="polaroid-wrapper left-side">
            <div class="polaroid" style="transform: rotate(-8deg); margin-top: 20px;">
                <img src="img/photo1.jpg" alt="Фото 1">
                <div class="caption">За работой</div>
            </div>
            <div class="polaroid" style="transform: rotate(9deg);">
                <img src="img/photo3.jpg" alt="Фото 3">
                <div class="caption">Попался менеджер маркетолог</div>
            </div>
            <div class="polaroid" style="transform: rotate(-12deg);">
                <img src="img/photo5.jpg" alt="Фото 5">
                <div class="caption">12 час работы</div>
            </div>
            <div class="polaroid" style="transform: rotate(5deg);">
                <img src="img/photo7.jpg" alt="Фото 7">
                <div class="caption">Рандомный вторник на удалёнке</div>
            </div>
            <div class="polaroid" style="transform: rotate(-5deg);">
                <img src="img/photo9.jpg" alt="Фото 9">
                <div class="caption">Апдейты задач в нерабочее время</div>
            </div>
        </div>
        <div class="main-text">
            <h1><?= $title1; ?></h1>
            <?php if ($days !== 0 && !$wasYesterday): ?>
                <p class="counter">
                    <?php echo "До праздника: " . $days . " " . $word; ?>
                </p>
            <?php endif; ?>
            <h1><?= $title2; ?></h1>
            <p>Эти страницы я написала сама, чтобы увековечить
                мою признательность и благодарность тебе в таком вот цифровом виде.
                Код останется для тебя по ссылке на GitHub, надеюсь, что навсегда.
                Спасибо тебе за твою поддержу, заботу, внимание, ну и, конечно же,
                лояльность. Ты стал для меня примером давно, но я и предположить
                не могла, что мы будем говорить об одних и тех же вещах, и тем более,
                что ты меня будешь учить. Этим я хочу сказать, что я действительно
                понимаю значимость твоих слов об обучении и очень стараюсь хотя бы
                немного оправдать твои надежды!<br>Спасибо тебе за всё!
            </p>
            <p>А сейчас ты можешь потыкать на кнопочки,<br>
                пусть программа отрабатывает вложенные в неё усилия!
            </p>
            <button type="button" id="wish-btn" class="btn">Получить пожелание!</button>
            <p id="wish-container" class="wish-text" hidden></p>
            <div class="checkbox-form">
                <p class="form-title">Официальное подтверждение:</p>
                <label class="custom-checkbox">
                    <input type="checkbox" class="daddy-check" value="1">
                    <span class="checkmark"></span>
                    Я лучший дядя на свете
                </label>
                <label class="custom-checkbox">
                    <input type="checkbox" class="daddy-check" value="2">
                    <span class="checkmark"></span>
                    Я всегда помогаю племяннице
                </label>
                <label class="custom-checkbox">
                    <input type="checkbox" class="daddy-check" value="3">
                    <span class="checkmark"></span>
                    Я готов получить торт
                </label>
                <button type="button" id="check-btn" class="btn" style="margin-top: 20px;">Подтвердить!</button>
                <p id="check-result" class="wish-text" hidden></p>
            </div>
        </div>
        <div class="polaroid-wrapper right-side">
            <div class="polaroid" style="transform: rotate(10deg); margin-top: 40px;">
                <img src="img/photo2.jpg" alt="Фото 2">
                <div class="caption">Работа с новым проектом</div>
            </div>
            <div class="polaroid" style="transform: rotate(-6deg);">
                <img src="img/photo4.jpg" alt="Фото 4">
                <div class="caption">После дня за компом</div>
            </div>
            <div class="polaroid" style="transform: rotate(7deg);">
                <img src="img/photo6.jpg" alt="Фото 6">
                <div class="caption">Менеджер несёт хрень</div>
            </div>
            <div class="polaroid" style="transform: rotate(-11deg);">
                <img src="img/photo8.jpg" alt="Фото 8">
                <div class="caption">Дали час на задачу</div>
            </div>
            <div class="polaroid" style="transform: rotate(13deg);">
                <img src="img/photo10.jpg" alt="Фото 10">
                <div class="caption">Пришла ЗП</div>
            </div>
        </div>
    </div>
</body>
</html>
