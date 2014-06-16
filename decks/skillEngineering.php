<?php
class skilleng0 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Repair (1)';
    $this->cardText = 'Action: Repair your current location, or if you are in the "Hanger Deck" location, you may repair up to 2 damaged vipers.';
    $this->skill = 1;
    $this->type = 'Engineering';
  }
  function action($from, $args) {
  }
}
class skilleng1 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Repair (2)';
    $this->cardText = 'Action: Repair your current location, or if you are in the "Hanger Deck" location, you may repair up to 2 damaged vipers.';
    $this->skill = 2;
    $this->type = 'Engineering';
  }
  function action($from, $args) {
  }
}
class skilleng2 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Scientific Research (3)';
    $this->cardText = 'Play before cards are added to a skill check. All engineering cards in the skill check count as positive strength.';
    $this->skill = 3;
    $this->type = 'Engineering';
  }
  function action($from, $args) {
  }
}
class skilleng3 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Scientific Research (4)';
    $this->cardText = 'Play before cards are added to a skill check. All engineering cards in the skill check count as positive strength.';
    $this->skill = 4;
    $this->type = 'Engineering';
  }
  function action($from, $args) {
  }
}
class skilleng4 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Scientific Research (5)';
    $this->cardText = 'Play before cards are added to a skill check. All engineering cards in the skill check count as positive strength.';
    $this->skill = 5;
    $this->type = 'Engineering';
  }
  function action($from, $args) {
  }
}
class skillEngineeringDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $cardId = 0;
    for($i=0;$i<8;$i++) {
      $this->cards[$cardId] = new skilleng0($root);
      $cardId++;
    }
    for($i=0;$i<6;$i++) {
      $this->cards[$cardId] = new skilleng1($root);
      $cardId++;
    }
    for($i=0;$i<4;$i++) {
      $this->cards[$cardId] = new skilleng2($root);
      $cardId++;
    }
    for($i=0;$i<2;$i++) {
      $this->cards[$cardId] = new skilleng3($root);
      $cardId++;
    }
    $this->cards[$cardId] = new skilleng4($root);
    $this->deck = $this->cards;
  }
}
?>
