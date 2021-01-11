<?php if (!defined('RII_CORE_INCLUDED')) die;

//Здесь можно будет сделать json_encode при добавлении новых записей через форму отправки

$strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
$array = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
$reversedArray = array_reverse($array["listOfChanges"]);

$page = $_GET['page'];
$limit = $params["limit"];
$offset = $limit * ($page - 1);

for ($i = $offset; $i < $offset + $limit; $i++) {
    if ($reversedArray[$i]) {
        echo "<div class='post'>Дата: " . $reversedArray[$i]["date"] . "<br>Разработчик: " . $reversedArray[$i]["programmer"] . "<br>Изменения:<br>";
        foreach ($reversedArray[$i]["changes"] as $item) {
            echo "<div class ='changes'>" . $item . "</div>";
        }
        echo "</div>";
    }
}

$pagLink = "<div class='pagination'>";
for ($i = 1; $i <= ceil(count($reversedArray) / $limit); $i++) {
    $pagLink .= "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
}
echo $pagLink . "</div>";