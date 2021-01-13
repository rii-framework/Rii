<?php if (!defined('RII_CORE_INCLUDED')) die;

for ($i = $result["paginationParams"]["offset"]; $i < $result["paginationParams"]["offset"] + $result["paginationParams"]["limit"]; $i++) {
    if ($result["data"][$i]) {
        echo "<div class='post'>Дата: " . $result["data"][$i]["date"] . "<br>Разработчик: " . $result["data"][$i]["programmer"] . "<br>Изменения:<br><div class ='changes'>" . $result["data"][$i]["changes"] . "</div></div>";
    }
}

echo "<div class='pagination'>";
for ($i = 1; $i <= ceil(count($result["data"]) / $result["paginationParams"]["limit"]); $i++) {
    echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
}
echo "</div>";