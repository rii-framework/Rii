<?php

namespace Rii\Component\Rii;

use Rii\Core\Component\Base;

class ElementList extends Base
{
    private function paginationParams($params)
    {
        $paginationParams["page"] = $_GET['page'];
        $paginationParams["limit"] = $this->params["limit"];
        $paginationParams ["offset"] = $paginationParams["limit"] * ($paginationParams["page"] - 1);
        return $paginationParams;
    }

    private function getContentJSON($params)
    {
        $strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое upload/history.json в виде строки
        $jsonArray = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
        return $data = array_reverse($jsonArray);
    }

    public function executeComponent()
    {
        $this->result["data"] = $this->getContentJSON($this->params);
        $this->result['paginationParams'] = $this->paginationParams($this->params);
        $this->template->render();
    }
}