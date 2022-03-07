<?php

class Logger
{
    const DEBUG = "DEBUG";
    const INFO = "INFO";
    const ERROR = "ERROR";
    private $handler;
    public function __construct($mode = "a")
    {
        $dir = dirname(__FILE__, 1);
        $fileName = "log.txt";
        $path = $dir . $fileName;
        $this->handler = fopen($path, $mode);
        $this->dateFormat = "d/M/Y H:i:s";
    }
    public function dateFormat($format)
    {
        $this->dateFormat = $format;
    }
    /** 
     * @param string $flag DEBUG,INFO or ERROR. 
     * @param string  $method Pass constant ___METHOD___ to get reporting className and Function.
     * @param string $entries Pass variables, etc..
     */
    public function log($flag, string $method, string $entries)
    {
        switch ($flag) {
            case self::DEBUG:
            case self::INFO:
            case self::ERROR:
                if (is_string($entries)) {
                    fwrite($this->handler, "{$flag}: [" . date($this->dateFormat) . "]: {$method}: " . $entries . "\n");
                } else {
                    foreach ($entries as $value) {
                        fwrite($this->handler, "{$flag}: [" . date($this->dateFormat) . "] " . $value . "\n");
                    }
                }

                break;

            default:
                fwrite($this->handler, "ERROR: [" . date($this->dateFormat) . "]: " . __METHOD__ . ": Supplied flag parameter is invalid. Expected DEBUG,INFO,ERROR found ($flag) " . "\n");

                break;
        }
    }
}
