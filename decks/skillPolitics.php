<?php
class skillpol0 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Consolidate Power (1)';
    $this->cardText = 'Action: Draw 2 skill cards of any type(s). They may come from outside your skill set.';
    $this->skill = 1;
    $this->type = 'Politics';
  }
  function action($from, $args) {
  }
}
class skillpol1 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Consolidate Power (2)';
    $this->cardText = 'Action: Draw 2 skill cards of any type(s). They may come from outside your skill set.';
    $this->skill = 2;
    $this->type = 'Politics';
  }
  function action($from, $args) {
  }
}
class skillpol2 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Investigative Committee (3)';
    $this->cardText = 'Play before cards are added to a skill check. All skill cards are played face up (including from the Destiny deck).';
    $this->skill = 3;
    $this->type = 'Politics';
  }
  function action($from, $args) {
  }
}
class skillpol3 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Investigative Committee (4)';
    $this->cardText = 'Play before cards are added to a skill check. All skill cards are played face up (including from the Destiny deck).';
    $this->skill = 4;
    $this->type = 'Politics';
  }
  function action($from, $args) {
  }
}
class skillpol4 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Investigative Committee (5)';
    $this->cardText = 'Play before cards are added to a skill check. All skill cards are played face up (including from the Destiny deck).';
    $this->skill = 5;
    $this->type = 'Politics';
  }
  function action($from, $args) {
  }
}
class skillPoliticsDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $cardId = 0;
    for($i=0;$i<8;$i++) {
      $this->cards[$cardId] = new skillpol0($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<6;$i++) {
      $this->cards[$cardId] = new skillpol1($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<4;$i++) {
      $this->cards[$cardId] = new skillpol2($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<2;$i++) {
      $this->cards[$cardId] = new skillpol3($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    $this->cards[$cardId] = new skillpol4($root);
    $this->deck[$cardId] = $this->cards[$cardId];
  }
}
?>
