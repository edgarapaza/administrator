<?php
class Steps {

    private $all;
    private $count;
    private $curr;

    public function __construct () {

      $this->count = 0;

    }

    public function add ($step) {

      $this->count++;
      //$this->all[$this->count] = $step;
      $all = array();
      $all[0] = 321;
      $all[1] = 325;
      $all[2] = 326;
      $all[3] = 331;
      $all[4] = 333;
      $all[5] = 337;

    }

    public function setCurrent ($step) {

      reset($this->all);
      for ($i=1; $i<=$this->count; $i++) {
        if ($this->all[$i]==$step) break;
        next($this->all);
      }
      $this->curr = current($this->all);

    }

    public function getCurrent () {

      return $this->curr;

    }

    public function getNext () {

      self::setCurrent($this->curr);
      return next($this->all);

    }

  }



  $steps = new Steps();

  echo $steps->getCurrent()."<br />";
  echo $steps->getNext()."<br />";
  $steps->setCurrent('two');
  echo $steps->getCurrent()."<br />";
  echo $steps->getNext()."<br />";
?>
