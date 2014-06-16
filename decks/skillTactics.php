<?php
class skilltac0 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Launch Scout (1)';
    $this->cardText = 'Action: Risk 1 raptor to roll a die. If 3 or higher, look at the top card of the Crisis or Destination deck and place it, on the top or the bottom. Otherwise destroy 1 raptor.';
    $this->skill = 1;
    $this->type = 'Tactics';
  }
  function action($from, $args) {
  }
}
class skilltac1 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Launch Scout (2)';
    $this->cardText = 'Action: Risk 1 raptor to roll a die. If 3 or higher, look at the top card of the Crisis or Destination deck and place it, on the top or the bottom. Otherwise destroy 1 raptor.';
    $this->skill = 2;
    $this->type = 'Tactics';
  }
  function action($from, $args) {
  }
}
class skilltac2 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Strategic Planning (3)';
    $this->cardText = 'Play before any die roll to add 2 to the result. Limit of 1 "Strategic Planning" card used per die roll.';
    $this->skill = 3;
    $this->type = 'Tactics';
  }
  function action($from, $args) {
  }
}
class skilltac3 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Strategic Planning (4)';
    $this->cardText = 'Play before any die roll to add 2 to the result. Limit of 1 "Strategic Planning" card used per die roll.';
    $this->skill = 4;
    $this->type = 'Tactics';
  }
  function action($from, $args) {
  }
}
class skilltac4 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Strategic Planning (5)';
    $this->cardText = 'Play before any die roll to add 2 to the result. Limit of 1 "Strategic Planning" card used per die roll.';
    $this->skill = 5;
    $this->type = 'Tactics';
  }
  function action($from, $args) {
  }
}
class skillTacticsDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $cardId = 0;
    for($i=0;$i<8;$i++) {
      $this->cards[$cardId] = new skilltac0($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<6;$i++) {
      $this->cards[$cardId] = new skilltac1($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<4;$i++) {
      $this->cards[$cardId] = new skilltac2($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<2;$i++) {
      $this->cards[$cardId] = new skilltac3($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    $this->cards[$cardId] = new skilltac4($root);
    $this->deck[$cardId] = $this->cards[$cardId];
  }
}
?>
