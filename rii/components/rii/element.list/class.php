<?php

namespace Rii\Component\Rii;

use Rii\Core\Component\Base;

class ElementList extends Base
{
    private function getContentJSON($params)
    {
        $strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
        $jsonArray = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
        $data = array_reverse($jsonArray);

        $page = $_GET['page'];
        $limit = $params["limit"];
        $offset = $limit * ($page - 1);

        $content = "";

        for ($i = $offset; $i < $offset + $limit; $i++) {
            if ($data[$i]) {
                $content .= "<div class='post'>Дата: " . $data[$i]["date"] . "<br>Разработчик: " . $data[$i]["programmer"] . "<br>Изменения:<br>";
                $content .= "<div class ='changes'>" . $data[$i]["changes"] . "</div>";
                $content .= "</div>";
            }
        }

        $content .= "<div class='pagination'>";
        for ($i = 1; $i <= ceil(count($data) / $limit); $i++) {
            $content .= "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
        }
        $content .= "</div>";
        return $content;
    }

//    private function paginationParams($params)
//    {
//        $page = $_GET['page'];
//        $limit = $this->params["limit"];
//        $offset = $limit * ($page - 1);
//        return $paginationParams = [$page, $limit, $offset];
//    }

//    private function getContentJSON($params)
//    {
//        $strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
//        $jsonArray = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
//        return $data = array_reverse($jsonArray);
//    }

    public function executeComponent()
    {
//        $this->getContentJSON($this->params);
//        $this->paginationParams($this->params);
        $this->result['changeLog'] = $this->getContentJSON($this->params);
        $this->template->render();
    }
}