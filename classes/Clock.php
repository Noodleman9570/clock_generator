<?php

class Clock{
    private $hours = 0;
    private $minutes = 0;
    private $seconds = 0;

    function __construct(int $hours, int $minutes, int $seconds){
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    private function arrowsPos(){

        $degrees = [
            "hDeg" => $this->hours / 12 * 360,
            "mDeg" => $this->minutes / 60 * 360,
            "sDeg" => $this->seconds / 60 * 360
        ];
        return $degrees;
    }

    private function readFile($url){
        $file = fopen($url, "r");
        
        $content = "";

        //bucle para ir recibiendo todo el contenido del fichero en bloques de 1024 bytes
        while ($slice = fgets($file, 1024)){
            $content .= $slice;
        }
        return $content;
    }

    public function clockRender() {
        $style = "<style>".$this->readFile("styles/clock.css")."</style>";

        $html = " <div class='clock-container'>";
            
             for ($i = 1; $i <=12; $i++){
                $html .= " <h2>". $i ."</h2>";
             }
                

            $html .= " <div style='rotate: ".$this->arrowsPos()['hDeg']."deg' class='arrow-container cont-hour'>
                <div class='arrow-hour'>
                    <div class='arrow-head head-hour'></div>
                    <div class='arrow-body body-hour'></div>
                </div>
            </div>
            <div style='rotate: ".$this->arrowsPos()['mDeg']."deg' class='arrow-container cont-min'>
                <div class='arrow-min'>
                    <div class='arrow-head head-min'></div>
                    <div class='arrow-body body-min'></div>
                </div>
            </div>
            <div style='rotate: ".$this->arrowsPos()['sDeg']."deg' class='arrow-container cont-sec'>
                <div class='arrow-sec'>
                    <div class='arrow-body body-sec'></div>
                </div>
            </div>
            <div class='center-point'></div>
        </div>

        ";
        return $style." ".$html;
    }


}
