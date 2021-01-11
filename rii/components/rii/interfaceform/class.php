<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class InterfaceForm extends Base
{
    public function executeComponent()
    {
        $this->renderForm();

        $this->template->render();
    }

    //Формирование формы
    private function renderForm()
    {
        $this->result = "<form ";

        $this->result .= $this->getClass($this->params);

        $this->result .= $this->getAttr($this->params);

        $this->result .= $this->getMethod($this->params);

        $this->result .= $this->getAction($this->params);

        $this->result .= ">";

        foreach ($this->params["elements"] as $elem) {
            if (isset($elem["wrap"])) {
                $this->result .= "<div " . $this->getClass($elem["wrap"]) . ">";
                $this->renderElements($elem);
                $this->result .= "</div>";

            } else {
                $this->renderElements($elem);
            }
            
        }
        
        $this->result .= "</form>";
    }

    //Формирование элементов формы
    private function renderElements($elem)
    {
        switch ($elem["type"]) {
            case "label":
                $this->getTagLabel($elem);
                break;
            case "checkbox":
            case "button":
            case "submit":
            case "text":
            case "password":
                $this->getTagInput($elem);
                break;
            case "select":
                $this->getTagSelect($elem);
                break;
            case "textarea":
                $this->getTagTextarea($elem);
                break;
            default:
                break;
        }
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
    private function getMethod($array)
    {
        $output = "";

        if (isset($array["method"]) && $array["method"]) {
            $output = "method=\"" . $array["method"] . "\"";
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
    private function getAction($array)
    {
        $output = "";

        if (isset($array["action"])) {
            $output = "action=\"" . $array["action"] . "\"";
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

    //Формирование тег label
    private function getTagLabel($array)
    {
        $label = "<label ";

        /*$label .= $this->getClass($array);

        $label .= $this->getId($array);

        $label .= $this->getFor($array);

        $label .= $this->getAccesskey($array);*/

        $label .= ">";

        $label .= $array["title"];

        $this->result .= $label .= "</label>";
    }

    //Формирование тег option
    private function getTagOption($array)
    {
        $option = "<option ";

        $option .= $this->getValue($array);

        $option .= $this->getClass($array);

        $option .= $this->getAttr($array);

        $option .= $this->getDisabled($array);

        $option .= $this->getSelected($array);

        $option .= ">";

        $option .= $array["title"];

        return $option .= "</option>";
    }

    //Формирование тег input
    private function getTagInput($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $this->getTagLabel($elem);
        }

        $input .= "<input type=\"" . $elem["type"] . "\"";

        $input .= $this->getName($elem);

        $input .= $this->getClass($elem);

        $input .= $this->getAttr($elem);

        $input .= $this->getPlaceholder($elem);

        $input .= $this->getValue($elem);

        $input .= $this->getChecked($elem);

        $this->result .= $input .= ">";
    }

    //Формирование тег select
    private function getTagSelect($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $this->getTagLabel($elem);
        }

        $select .= "<select type=\"" . $elem["type"] . "\"";

        $select .= $this->getName($elem);

        $select .= $this->getClass($elem);

        $select .= $this->getAttr($elem);

        $select .= ">";

        foreach ($elem["list"] as $elem) {
            $select .= $this->getTagOption($elem);
        }

        $this->result .= $select .= "</select>";

    }

    //Формирование тег textarea
    private function getTagTextarea($elem)
    {
        if (isset($elem["title"]) && $elem["title"]) {
            $this->getTagLabel($elem);
        }

        $textarea .= "<textarea ";

        $textarea .= $this->getName($elem);

        $textarea .= $this->getClass($elem);

        $textarea .= $this->getAttr($elem);

        $textarea .= $this->getPlaceholder($elem);

        $textarea .= $this->getValue($elem);

        $textarea .= ">";

        $this->result .= $textarea .= "</textarea>";

    }
}