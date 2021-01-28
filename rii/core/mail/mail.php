<?php
namespace Rii\Core\Mail;

class Mail
{
    private $template;
    private $headers;
    private $params = [];
    private $result = [];

    public function __construct($params, $headers = "")
    {
        $this->params = $params;
        $this->template = new Template($params["template"], $params["field"]);
        $this->result = $this->template->getSettings();
        $this->headers = $headers;
        $this->setHeaders();
    }

    public function send()
    {
        $to = $this->result["to"];
        $file = $this->template->getAttachFile();
        $message = $this->template->getTemplate();

        if (!empty($this->params["file"]) || !empty($file))
        {
            $this->headers .= $this->sendFiles($this->checkFiles($file));
        }
       return mail($to, $this->result["subject"], $message, $this->getHeaders());
    }

    private function setHeaders()
    {
        $this->headers .= "From: " . $this->result['from']  . "\r\n";
        $this->headers .= "Reply-To: " . $this->result['from'] . "\r\n";
        $this->headers .= "Cc: " . $this->result['fromCopy'] . "\nBcc: " . $this->result['sett']['fromCopyH'] . "\n";
        $this->headers .= "Content-type: text/html; charset=utf-8\n";
        $this->headers .= "X-Mailer: PHP/" . phpversion();
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    private function checkFiles($file)
    {
        if (!empty($file) && !empty($this->params["file"]))
        {
           return $fileArrPath = array_merge($file, $this->params["file"]);
        } elseif (!empty($file))
        {
            return  $file;
        }   else return $this->params["file"];
    }

    private function sendFiles($result)
    {
        var_dump($result);
        foreach ($result as $filePath)
        {
            $fileName   = basename($filePath);
            $fileSize   = filesize($filePath);
            $handle     = fopen($filePath, "r");
            $content    = fread($handle, $fileSize);
            fclose($handle);
            $content = chunk_split(base64_encode($content));
            $headers = "Content-Type: application/octet-stream; name=\"".$fileName."\"\r\n";
            $headers .= "Content-Transfer-Encoding: base64\r\n";
            $headers .= "Content-Disposition: attachment; filename=\"".$fileName."\"\r\n";
            $headers .= $content."\r\n";
        }
        return $headers;
    }
}

