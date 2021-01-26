<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class InterfaceForm extends Base
{
    private $elements = "";
    private $attributes = "";

    public function executeComponent()
    {
        $this->result['attributes'] = $this->renderFormAttributes();

        $this->result['method'] = $this->getMethod();

        $this->result['action'] = $this->getAction();

        $this->result['elements'] = $this->renderFormElements();

        $this->result['component_hash'] = debug_backtrace(false);

        $this->template->render();
    }

    //Формирование атрибутов формы
    private function renderFormAttributes()
    {
        $this->attributes .= $this->getClass($this->params) . " ";

        $this->attributes .= $this->getAttr($this->params);

        return $this->attributes;
    }

    //Формирование элементов формы
    private function renderFormElements()
    {
        foreach ($this->params["elements"] as $elem) {
            if (isset($elem["wrap"])) {
                $elem["wrap"]["tag"] = empty($elem["wrap"]["tag"]) ? "div" : $elem["wrap"]["tag"];

                $this->elements .= "<" . $elem["wrap"]["tag"] . " " . $this->getClass($elem["wrap"]) . " " . $this->getAttr($elem["wrap"]) . ">";
                $this->elements .= $this->renderElem($elem);
                $this->elements .= "</" . $elem["wrap"]["tag"] . ">";
            } else {
                $this->elements .= $this->renderElem($elem);
            }
        }

        return $this->elements;
    }

    //Формирование элементов формы
    private function renderElem($elem)
    {
        $currentElem;

        switch ($elem["type"]) {
            case "label":
                $currentElem = $this->getTagLabel($elem);
                break;
            case "checkbox":
            case "button":
            case "submit":
            case "email":
            case "text":
            case "password":
                $currentElem = $this->getTagInput($elem);
                break;
            case "hidden":
                $currentElem = $this->getTagIHidden($elem);
                break;
            case "select":
                $currentElem = $this->getTagSelect($elem);
                break;
            case "textarea":
                $currentElem = $this->getTagTextarea($elem);
                break;
            default:
                break;
        }

        return $currentElem;
    }

    //Формирование атрибута class
    private function getClass($array)
    {
        $output = "";

        if (isset($array["additional_class"]) && $array["additional_class"]) {
            if (is_array($array["additional_class"])) {
                $output = "class=\"" . implode(" ", $array["additional_class"]) . "\"";
            } else {
                $output = "class=\"" . $array["additional_class"] . "\"";
            }
        }

        return $output;
    }

    //Формирование атрибута data-
    private function getAttr($array)
    {
        $output = "";

        if (isset($array["attr"]) && $array["attr"]) {
            foreach ($array["attr"] as $key => $value) {
                $output .= $key . "=\"" . $value . "\"";
            }
        }

        return $output;
    }

    //Формирование атрибута method
    private function getMethod()
    {
        $output = "";

        if (isset($this->params["method"]) && $this->params["method"]) {
            $output = "method=\"" . $this->params["method"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута id
    private function getId($array)
    {
        $output = "";

        if (isset($array["id"]) && $array["id"]) {
            $output = "id=\"" . $array["id"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута for
    private function getFor($array)
    {
        $output = "";

        if (isset($array["for"]) && $array["for"]) {
            $output = "for=\"" . $array["for"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута accesskey
    private function getAccesskey($array)
    {
        $output = "";

        if (isset($array["accesskey"]) && $array["accesskey"]) {
            $output = "accesskey=\"" . $array["accesskey"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута action
    private function getAction()
    {
        $output = "";

        if (isset($this->params["action"])) {
            $output = "action=\"" . $this->params["action"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута name
    private function getName($array)
    {
        $output = "";

        if (isset($array["name"]) && $array["name"]) {
            $output = "name=\"" . $array["name"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута placeholder
    private function getPlaceholder($array)
    {
        $output = "";

        if (isset($array["default"])) {
            $output = "placeholder=\"" . $array["default"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута value
    private function getValue($array)
    {
        $output = "";

        if (isset($array["value"]) && $array["value"]) {
            $output = "value=\"" . $array["value"] . "\"";
        }

        return $output;
    }

    //Формирование атрибута disabled
    private function getDisabled($array)
    {
        $output = "";

        if (isset($array["disabled"]) && $array["disabled"] == true) {
            $output = "disabled";
        }

        return $output;
    }

    //Формирование атрибута selected
    private function getSelected($array)
    {
        $output = "";

        if (isset($array["selected"]) && $array["selected"] == true) {
            $output = "selected";
        }

        return $output;
    }

    //Формирование атрибута checked
    private function getChecked($array)
    {
        $output = "";

        if (isset($array["checked"]) && $array["checked"] == true) {
            $output = "checked";
        }

        return $output;
    }

    //Формирование тега label
    private function getTagLabel($elem)
    {
        $label = "<label ";

        if (is_array($elem)) {
            $label .= $this->getClass($elem);

            $label .= $this->getId($elem);

            $label .= $this->getFor($elem);

            $label .= $this->getAccesskey($elem);

            $label .= ">";

            $label .= htmlspecialchars($elem["text"]);
        } else {
            $label .= ">";

            $label .= htmlspecialchars($elem);
        }

        return $label .= "</label>";
    }

    private function getTagError($array){
        $tagErr = "";

        if (is_array($array["error"])) {
            $tagErr .= "<div " . $this->getId($array["error"]) . " " . $this->getClass($array["error"]) . "></div>";
        }

        return $tagErr;
    }

    //Формирование тега option
    private function getTagOption($array)
    {
        $option = "<option ";

        $option .= $this->getValue($array);

        $option .= $this->getClass($array);

        $option .= $this->getAttr($array);

        $option .= $this->getDisabled($array);

        $option .= $this->getSelected($array);

        $option .= ">";

        $option .= htmlspecialchars($array["title"]);

        return $option .= "</option>";
    }

    //Формирование тега input
    private function getTagInput($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $input .= $this->getTagLabel($elem["title"]);
        }

        $input .= "<input type=\"" . $elem["type"] . "\"";

        $input .= $this->getName($elem);

        $input .= $this->getClass($elem);

        $input .= $this->getAttr($elem);

        $input .= $this->getPlaceholder($elem);

        $input .= $this->getValue($elem);

        $input .= $this->getChecked($elem);

        $input .= ">";

        if (isset($elem["error"]) && $elem["error"]) {
            $input .= $this->getTagError($elem);
        }

        return $input;
    }

    private function getTagIHidden($elem)
    {
        $input .= "<input type=\"" . $elem["type"] . "\"";

        $input .= $this->getName($elem);

        $input .= $this->getValue($elem);

        return $input .= ">";
    }

    //Формирование тега select
    private function getTagSelect($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $select .= $this->getTagLabel($elem["title"]);
        }

        $select .= "<select type=\"" . $elem["type"] . "\"";

        $select .= $this->getName($elem);

        $select .= $this->getClass($elem);

        $select .= $this->getAttr($elem);

        $select .= ">";

        foreach ($elem["list"] as $elem) {
            $select .= $this->getTagOption($elem);
        }

        $select .= "</select>";

        if (isset($elem["error"]) && $elem["error"]) {
            $select .= $this->getTagError($elem);
        }

        return $select;
    }

    //Формирование тега textarea
    private function getTagTextarea($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $textarea .= $this->getTagLabel($elem);
        }

        $textarea .= "<textarea ";

        $textarea .= $this->getName($elem);

        $textarea .= $this->getClass($elem);

        $textarea .= $this->getAttr($elem);

        $textarea .= $this->getPlaceholder($elem);

        $textarea .= ">";

        $textarea .= htmlspecialchars($elem["text"]);

        $textarea .= "</textarea>";

        if (isset($elem["error"]) && $elem["error"]) {
            $select .= $this->getTagError($elem);
        }

        return $textarea;
    }
}