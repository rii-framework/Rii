<?php if (!defined('RII_CORE_INCLUDED')) die;

for ($i = $result["paginationParams"]["offset"]; $i < $result["paginationParams"]["offset"] + $result["paginationParams"]["limit"]; $i++) {
    if ($result["data"][$i]) {
        echo "<div class='post'>Дата: " . $result["data"][$i]["date"] . "<br>Разработчик: " . $result["data"][$i]["programmer"] . "<br>Изменения:<br><div class ='changes'>" . $result["data"][$i]["changes"] . "</div></div>";
    }
}

echo "<div class='pagination'>";
foreach ($result['links'] as $link) {
    echo "<a href=" . $link . ">" .++$k. "</a>";
}
echo "</div>";
