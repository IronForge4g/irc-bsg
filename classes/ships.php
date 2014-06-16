<?php
class basestar {
  var $r;
  var $name;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Basestar';
    $this->location = null;
  }
}
class viper {
  var $r;
  var $name;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Viper';
    $this->location = null; 
  }
}
class raider {
  var $r;
  var $name;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Cylon Raider';
    $this->location = null;
  }
}
class heavyRaider {
  var $r;
  var $name;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Cylon Heavy Raider';
    $this->location = null;
  }
}
?>
