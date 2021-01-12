<?php if (!defined('RII_CORE_INCLUDED')) die;

$strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
$array = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
$reversedArray = array_reverse($array);

$page = $_GET['page'];
$limit = $params["limit"];
$offset = $limit * ($page - 1);

$content = "";
for ($i = $offset; $i < $offset + $limit; $i++) {
    if ($reversedArray[$i]) {
        $content .= "<div class='post'>Дата: " . $reversedArray[$i]["date"] . "<br>Разработчик: " . $reversedArray[$i]["programmer"] . "<br>Изменения:<br>";
        $content .= "<div class ='changes'>" . $reversedArray[$i]["changes"] . "</div>";
        $content .= "</div>";
    }
}

$content .= "<div class='pagination'>";
for ($i = 1; $i <= ceil(count($reversedArray) / $limit); $i++) {
    $content .= "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
}
echo $content .="</div>";