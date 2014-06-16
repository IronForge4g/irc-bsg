<?php
class skillpil0 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Evasive Maneuvers (1)';
    $this->cardText = 'Play after any viper is attacked and reroll the die. If the viper is piloted, subtract 2 from the new roll.';
    $this->skill = 1;
    $this->type = 'Piloting';
  }
  function action($from, $args) {
  }
}
class skillpil1 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Evasive Maneuvers (2)';
    $this->cardText = 'Play after any viper is attacked and reroll the die. If the viper is piloted, subtract 2 from the new roll.';
    $this->skill = 2;
    $this->type = 'Piloting';
  }
  function action($from, $args) {
  }
}
class skillpil2 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Maximum Firepower (3)';
    $this->cardText = 'Action: Play while piloting a viper to attack up to 4 times.';
    $this->skill = 3;
    $this->type = 'Piloting';
  }
  function action($from, $args) {
  }
}
class skillpil3 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Maximum Firepower (4)';
    $this->cardText = 'Action: Play while piloting a viper to attack up to 4 times.';
    $this->skill = 4;
    $this->type = 'Piloting';
  }
  function action($from, $args) {
  }
}
class skillpil4 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Maximum Firepower (5)';
    $this->cardText = 'Action: Play while piloting a viper to attack up to 4 times.';
    $this->skill = 5;
    $this->type = 'Piloting';
  }
  function action($from, $args) {
  }
}
class skillPilotingDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $cardId = 0;
    for($i=0;$i<8;$i++) {
      $this->cards[$cardId] = new skillpil0($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<6;$i++) {
      $this->cards[$cardId] = new skillpil1($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<4;$i++) {
      $this->cards[$cardId] = new skillpil2($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<2;$i++) {
      $this->cards[$cardId] = new skillpil3($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    $this->cards[$cardId] = new skillpil4($root);
    $this->deck[$cardId] = $this->cards[$cardId];
  }
}
?>
