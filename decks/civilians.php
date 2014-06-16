<?php
class civilian0 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
    $this->r->fuel--;
  }
}
class civilian1 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
  }
}
class civilian2 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
    $this->r->population--;
  }
}
class civilian3 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civilian4 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civilian5 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civilian6 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
    $this->r->morale--;
  }
}
class civilian7 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
  }
}
class civilian8 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
    $this->r->population--;
  }
}
class civilian9 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civilian10 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civilian11 {
  var $r;
  var $name;
  var $cardText;
  var $location;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Civilian Ship';
    $this->cardText = 'Civilian Ship';
    $this->location = null;
  }
  function destroyed() {
    $this->r->population--;
  }
}
class civiliansDeck extends deck {
  function __construct($root) {
    $this->r = root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    for($i=0;$i<12;$i++) {
      $civilian = 'civilian'.$i;
      $this->cards[$i] = new $civilian($root);
    }
    $this->deck = $this->cards;
  }
}
?>
