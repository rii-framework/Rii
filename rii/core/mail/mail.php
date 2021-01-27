<?php
namespace Rii\Core\Mail;

class Mail
{


    public  function sendMail($params)
    {
      $arr =  Template::getTemplate($params["template"], $params["field"]);

        $headers = "From: #Email_From#\r\n";
        $headers .= "Reply-To: #Email_Reply# \r\n";
        if ($params["attach"] || $arr["attach"])
        {
            $headers .= $this->sendFiles($this->checkFiles($arr, $params));
        }
        var_dump($headers);
       return mail($arr["field"]["email"], $arr["subject"], $arr["message"], $headers);
    }

    public function checkFiles($arr, $params)
    {
        if ($arr["attach"] && $params["attach"])
        {
           return $fileArrPath = array_merge($arr["attach"], $params["attach"]);
        } elseif ($arr["attach"])
        {
            return  $arr["attach"];
        }   else return $params["attach"];
    }

    private function sendFiles($arr)
    {
        $result = "";
        foreach ($arr as $filePath)
        {
            $fileName   = basename($filePath);
            $fileSize   = filesize($filePath);
            $handle     = fopen($filePath, "r");
            $content    = fread($handle, $fileSize);
            fclose($handle);
            $content = chunk_split(base64_encode($content));
            $result .= "Content-Type: application/octet-stream; name=\"".$fileName."\"\r\n";
            $result .= "Content-Transfer-Encoding: base64\r\n";
            $result .= "Content-Disposition: attachment; filename=\"".$fileName."\"\r\n";
            $result .= $content."\r\n";
        }
        return $result;
    }


}

