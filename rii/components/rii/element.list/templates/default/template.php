<?php if (!defined('RII_CORE_INCLUDED')) die;

//Здесь можно будет сделать json_encode при добавлении новых записей через форму отправки

$strJsonFileContent = file_get_contents("upload/history.json");
$array = json_decode($strJsonFileContent, true);

$endId = end($array['listOfChanges']);
$numOfPosts = $endId["postId"]-$params["limit"];

for ($i = $endId["postId"]; $i > $numOfPosts; $i--) {
    if ($array["listOfChanges"][$i]) {
        echo "<pre>";
        echo "-------- " . $array["listOfChanges"][$i]["updateTime"] . " - " . $array["listOfChanges"][$i]["programmerName"] . " --------<br>";
        foreach ($array["listOfChanges"][$i]["changes"] as $item) {
            echo "    " . $item . "<br>";
        }
        echo "</pre>";
    } else break;
}
