<?php

abstract class Clock{
    public $hours = 0;
    public $minutes = 0;
    public $seconds = 0;

    function __construct($hours, $minutes, $seconds){
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    protected function readFiles(string $url){
        $file = fopen($url, "r");
        
        $content = "";

        //bucle para ir recibiendo todo el contenido del fichero en bloques de 1024 bytes
        while ($slice = fgets($file, 1024)){
            $content .= $slice;
        }
        return $content;
    }

    abstract public function clockRender();


}
