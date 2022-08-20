<?php
require_once ("autoload.php");

class Digital extends Clock {
    public $meridiem = 0;

    function __construct( $hours, $minutes, $seconds, $meridiem)
    {
        parent::__construct($hours, $minutes, $seconds);
        $this->meridiem = $meridiem;
    }

    public function clockRender() {
        $style = "<style>"  .   $this->readFiles("styles/digital.css")    .   "</style>";

        $html = " 
            <div  class='clock_container'>
                <div class='display_container'>
                    <p class='hour'>".$this->hours."</p>
                    <p>:</p>
                    <p class='min'>".$this->minutes."</p>
                    <p>:</p>
                    <p class='sec'>".$this->seconds."</p>
                    <div class='day_turn'>
                        <p>".$this->meridiem."</p>
                    </div>
                </div>
            </div>

        ";

        return $style   .   " "    .   $html;
    }
}