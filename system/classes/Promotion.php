<?php
class Promotion
{
    private $index,$percent,$date;
    public function __construct($index,$percent,$date){
        $this->index = $index;
        $this->percent = $percent;
        $this->date = $date;
    }

    public function getIndex()
    {
        return $this->index;
    }
    
    public function getPercent()
    {
        return $this->percent;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setIndex($index)
    {
        $this->index = $index;
    }

    public function setPercent($percent)
    {
        $this->percent = $percent;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
?>
