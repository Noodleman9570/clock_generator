<?php
require_once ("autoload.php");

class Analog extends Clock {
    function __construct(int $hours, int $minutes, int $seconds)
    {
        parent::__construct($hours, $minutes, $seconds);
    }

    private function arrowsPos(){

        $degrees = [
            "hDeg" => ($this->hours / 12 * 360) + ($this->minutes / 60 * 30),
            "mDeg" => $this->minutes / 60 * 360,
            "sDeg" => $this->seconds / 60 * 360
        ];
        return $degrees;
    }

    public function clockRender() {
        $style = "<style>"  .   $this->readFiles("styles/analog.css")    .   "</style>";

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

        echo $style   .   " "    .   $html;
    }
}