<?php

namespace Rii\Component\Rii;

use Rii\Core\Component\Base;

class ElementList extends Base
{
    private function paginationParams($params)
    {
        if (!$params["limit"]) { // Если лимит не установлен вручную, то ему присваивается значение поумолчанию
            $params["limit"] = 50;
        }
        if (isset($_GET['page'])) {
            $paginationParams["page"] = $_GET['page'];
        } else {
            $paginationParams["page"] = 1;
        }
        $paginationParams["limit"] = $params["limit"];
        $paginationParams ["offset"] = $paginationParams["limit"] * ($paginationParams["page"] - 1);
        return $paginationParams;
    }

    private function pagination($result)
    {
        for ($i = 1; $i <= ceil(count($result["data"]) / $result["paginationParams"]["limit"]); $i++) {
            $links[$i] = self::editURL('page', $i);
        }
        return $links;
    }

    private function editURL($parameter, $value)
    {
        $output = "?";
        $firstRun = true;
        foreach ($_GET as $key => $val) {
            if ($key != $parameter) {
                if (!$firstRun) {
                    $output .= "&";
                } else {
                    $firstRun = false;
                }
                $output .= $key . "=" . urlencode($val);
            }
        }
        if (!$firstRun) {
            $output .= "&";
        }
        $output .= $parameter . "=" . urlencode($value);
        return htmlentities($output);
    }

    private function getContentJSON($params)
    {
        if (!$params["data_file"]) die("Ошибка! Не указан путь к файлу!");  // Если путь к файлу не установлен, то отрисуется ошибка.
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $params["data_file"])) die ("Файл не найден!"); // Если сам файл не найден, то отрисуется ошибка.
        $strJsonFileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $params["data_file"]);   //Получаем содержимое указанного файла в виде строки
        $jsonArray = json_decode($strJsonFileContent, true);   //Преобразуем строку в массив
        return $jsonArray;
    }

    private function sorting($params, $jsonArray)
    {
        if (isset($params['sort'])) {  // Если указаны параметры сортировки, то начнется процесс сортировки. Если нет, то выдаст оригинальный массив данных.

            if (is_array($params['sort'])) {
                $whatToSort = key($params['sort']);
                $howToSort = current($params['sort']);
            } else {
                $whatToSort = $params['sort'];
            }
            $sortingArray = [];

            foreach ($jsonArray as $key => $array) {
                if ($whatToSort == 'date') {
                    $sortingArray[$key] = strtotime($array[$whatToSort]);
                } else {
                    $sortingArray[$key] = $array[$whatToSort];
                }
            }

            if ($howToSort == 'asc') { // Если указана сортировка по возрастанию, то отсортирует так.
                array_multisort($sortingArray, SORT_ASC, SORT_REGULAR, $jsonArray);
            } else {
                array_multisort($sortingArray, SORT_DESC, SORT_REGULAR, $jsonArray);
            } // Если тип сортировки не указан или указан неверно, то отсортироака по убыванию задается по умолчанию.
            return $jsonArray;
        } else {
            return $jsonArray;
        }
    }

    public function executeComponent()
    {
        $this->result["data"] = $this->sorting($this->params, $this->getContentJSON($this->params));
        $this->result['paginationParams'] = $this->paginationParams($this->params);
        $this->result['links'] = $this->pagination($this->result);
        $this->template->render();
    }
}