<?php


class Logger
{
    private $fp;
    private $logfile;

    public function __construct()
    {
        $this->fp = fopen(__DIR__ . '/../log/log.txt', 'a');
        $this->logfile = __DIR__ . '/../log/log.txt';
    }

    public function Log($msg)
    {
        $d = new DateTime( 'NOW', new DateTimeZone('Europe/Brussels') );
        fwrite($this->fp, $d->format('Y-m-d H:i:s') . " " . $msg ."\r\n");
    }

    public function ShowLog()
    {
        print '<code>' . str_replace("\r\n", '<br>', file_get_contents($this->logfile)) . '</code>';
    }
}