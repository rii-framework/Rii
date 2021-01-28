<?php
namespace Rii\Core\Mail;

class Mail
{
    private $template;
    private $params = [];
    private $settings = [];
    private $headers;
    private $message;
    private $files;


    public function __construct($params)
    {
        $this->params = $params;
        $this->template = new Template($params["template"], $params["field"]);
        $this->settings = $this->template->getSettings();
        $this->files = $this->template->getAttachFile();
        $this->message = $this->template->getTemplate();
        $this->headers = $this->setHeaders();
    }

    public function send()
    {
        return mail($this->settings["to"], $this->settings["subject"], $this->message, $this->headers);
    }

    private function setHeadersFrom()
    {
        $form = "";
        if (empty($this->params["headers"]["from"]))
        {
            $form = "From: " . $this->params["headers"]["from"]  . "\r\n";
        } elseif (!empty($this->result['from']))
        {
            $form = "From: " . $this->settings['from']  . "\r\n";
        }
        return $form;
    }

    private function setHeadersReplyTo()
    {
        $replyTo = "";
        if (empty($this->params["headers"]["reply-to"]))
        {
            $replyTo .= "Reply-To: " . $this->params["headers"]["reply-to"]  . "\r\n";
        } elseif (!empty($this->settings['from']))
        {
            $replyTo .= "Reply-To: " . $this->settings['from'] . "\r\n";
        }
        return $replyTo;
    }

    private function setHeadersCc()
    {
        $cc = "";
        if (empty($this->params["headers"]["cc"]))
        {
            $cc .= "Cc: " . $this->params["headers"]["cc"]  . "\n";
        } elseif (!empty($this->settings['fromCopy']))
        {
            $cc .= "Cc: " . $this->settings['fromCopy'] . "\n";
        }
        return $cc;
    }

    private function setHeadersBcc()
    {
        $bcc = "";
        if (empty($this->params["headers"]["Bcc"]))
        {
            $bcc .= "Bcc: " . $this->params["headers"]["Bcc"]  . "\n";
        } elseif (!empty($this->settings['fromCopyH']))
        {
            $bcc .= "Bcc: " . $this->settings['fromCopyH'] . "\n";
        }
        return $bcc;
    }

    private function setHeadersContentType()
    {
        $contentType = "";
        if (empty($this->params["headers"]["content-type"]))
        {
            $contentType .= "Content-type: " . $this->params["headers"]["content-type"]  . "\n";
        } else $contentType .= "Content-type: text/html; charset=utf-8\n";
        $contentType .= "X-Mailer: PHP/" . phpversion();

        return $contentType;

    }

    public function setHeaders()
    {
        $this->headers = $this->setHeadersFrom();
        if (empty($this->headers))
        {
            throw new \Exception("не введён заголовок From");
        }
        $this->headers .= $this->setHeadersFrom();
        $this->headers .= $this->setHeadersReplyTo();
        $this->headers .= $this->setHeadersCc();
        $this->headers .= $this->setHeadersBcc();
        $this->headers .= $this->setHeadersContentType();
        if (!empty($this->params["files"]) || !empty($this->files))
        {
            $this->headers .= $this->checkFiles($this->files);
        }
        return $this->headers;
    }

    private function checkFiles($files)
    {
        if (!empty($files) && !empty($this->params["files"]))
        {
            $fileArrPath = array_merge($files, $this->params["files"]);
        } elseif (!empty($files))
        {
            $fileArrPath =  $files;
        }   else $fileArrPath = $this->params["files"];

        foreach ($fileArrPath as $filePath)
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

