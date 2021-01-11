<?php if (!defined('RII_CORE_INCLUDED')) die;

//Здесь можно будет сделать json_encode при добавлении новых записей через форму отправки

$strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
$array = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив

$lastId = end($array['listOfChanges']);   //Получаем последний элемент массива (последний пост)
$numOfPosts = $lastId["postId"] - $params["limit"];  //Записываем в переменную количество постов, которое хотим отобразить

for ($i = $lastId["postId"]; $i > $numOfPosts; $i--) {  //Вывод последних n постов
    if ($array["listOfChanges"][$i]) {
        echo "<pre>Дата: " . $array["listOfChanges"][$i]["date"] . "<br>Разработчик: " . $array["listOfChanges"][$i]["programmer"] . "<br>Изменения:<br>";
        foreach ($array["listOfChanges"][$i]["changes"] as $item) {
            echo "&nbsp" . $item . "<br>";
        }
        echo "</pre>";
    } else break;
}
//Попробовал сделать сортировку по дате через strtotime()+usort() и array_multisort()+foreach, но даты распологаются в неверном порядке.