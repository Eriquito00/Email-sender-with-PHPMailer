<?php

class Mail
{
    public $sender;
    public $recipient;
    public $subject;
    public $body;

    public function __construct($sender = '', $recipient = '', $subject = '', $body = '')
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->body = $body;
    }
}

?>