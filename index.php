<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Занятие 6</title>
</head>
<body>
    <div class="container">
        <h2>Самостоятельные задачи</h2>
        <div class="task">
            <h3>Гость.</h3>
            <?php
                if (empty($_GET['name'])) {
                    echo "Здраствуйте, наш дорогой гость!";
                } else {
                    $name = $_GET['name'];
                    echo "Здраствуйте, $name!!!";
                }
            ?>
        </div>
        <div class="task">
            <h3>Снова глоссарий.</h3>
            <?php
                $terms = ['Глоссарий'=>' — словарь узкоспециализированных терминов в какой-либо отрасли знаний с толкованием, иногда переводом на другой язык, комментариями и примерами.',
                        'Орфография'=>' — это единообразие передачи слов и грамматических форм речи на письме, а также изучающий это раздел лингвистики.',
                        'Синонимы'=>' — слова одной части речи с полным или частичным совпадением значения.',
                        'Антонимы'=>' — это слова одной части речи, различные по звучанию и написанию, имеющие прямо противоположные лексические значения.'];
                if (!empty($_GET['term'])) {
                    echo $_GET['term'], $terms[$_GET['term']];
                }
            ?>
        </div>
        <div class="task">
            <h3>О нас.</h3>
            <?php
                $routes = ['home'=>[
                                'title'=>'Главная',
                                'content'=>'Это текст главной страницы...'
                            ],
                            'about'=>[
                                'title'=>'О нас',
                                'content'=>'Это текст страницы с информацией о деятельности владельца сайта...'
                            ],
                            'auth'=>[
                                'title'=>'Авторизация',
                                'content'=>'Это текст страницы с функцией авторизации пользователя...'
                            ],
                            'reg'=>[
                                'title'=>'Регистрация',
                                'content'=>'Это текст страницы с функцией регистрации пользователя...'
                            ],
                        ];
                foreach ($routes as $page=>$value) {
                    $title_page = $value['title'];
                    echo "<a href='index.php?page=$page'>$title_page</a></br>";
                }
                if (!empty($_GET['page'])) {
                    foreach ($routes as $page=>$value) {
                        if ($page == $_GET['page']) {
                            $title_page = $value['title'];
                            $content_page = $value['content'];
                            echo "<h4>Страница - $title_page</h4><p>$content_page</p>";
                        }
                    }
                } else {
                    $rout = $routes['home'];
                    $title_page = $rout['title'];
                    $content_page = $rout['content'];
                    echo "<h4>Страница - $title_page</h4><p>$content_page</p>";
                }
            ?>
        </div>
        <div class="task">
            <h3>Опять глоссарий.</h3>
            <?php
                $text = 'Данный Глоссарий имеет много слов. Также указана Орфография и Синонимы.';
                $terms = ['Глоссарий'=>' — словарь узкоспециализированных терминов в какой-либо отрасли знаний с толкованием, иногда переводом на другой язык, комментариями и примерами.',
                        'Орфография'=>' — это единообразие передачи слов и грамматических форм речи на письме, а также изучающий это раздел лингвистики.',
                        'Синонимы'=>' — слова одной части речи с полным или частичным совпадением значения.',
                        'Антонимы'=>' — это слова одной части речи, различные по звучанию и написанию, имеющие прямо противоположные лексические значения.'];
                foreach ($terms as $term=>$opred) {
                    if (mb_strpos($text, $term) > 0) {
                        $link = "<a href='index.php?term=$term'>$term</a>";
                        $text = str_replace($term, $link, $text);
                    }
                }
                echo $text;
                if (!empty($_GET['term'])) {
                    $term = $_GET['term'];
                    $opred = $terms[$_GET['term']];
                    echo "<p><strong>$term</strong>$opred</p>";
                }
            ?>
        </div>
        <div class="task">
            <h3>Калькулятор.</h3>
            <form action="" method="get">
                <p>Площадь помещения: </p><p><input type="number" name="square"> м2</p>
                <p>Мощность одной секции: </p><p><input type="number" name="power"> Вт</p></br>
                <input type="submit" value="Отправить">
            </form>
            <?php
                if (isset($_GET['square']) && isset($_GET['power'])) {
                    $result = ceil($_GET['square'] * 100 / $_GET['power']);
                    echo "<p>Количество секций: $result</p>";
                }
            ?>
        </div>
        <div class="task">
            <h3>Подсветка.</h3>
            <form>
                <textarea name="enter_text"></textarea></br>
                <input type="submit" value="Отправить">
            </form>
            <?php
                $text = 'Данный Глоссарий имеет много слов. Также указана Орфография и Синонимы .';
                if (isset($_GET['enter_text'])) {
                    $enter_text = explode(' ', $_GET['enter_text']);
                    foreach ($enter_text as $key=>$value) {
                        if (mb_strpos($text, $value) > 0) {
                            $red_word = "<strong style='color: red'>$value</strong>";
                            $text = str_replace($value, $red_word, $text);
                        }
                    }
                }
                echo $text;
            ?>
        </div>
    </div>
</body>
</html>