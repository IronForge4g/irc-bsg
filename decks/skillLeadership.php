<?php
class skillled0 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Executive Order (1)';
    $this->cardText = 'Action: Choose any other player. He may move his character and then take 1 action OR not move and take 2 actions. Limit of 1 "Executive Order" card used per turn.';
    $this->skill = 1;
    $this->type = 'Leadership';
  }
  function action($from, $args) {
  }
}
class skillled1 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Executive Order (2)';
    $this->cardText = 'Action: Choose any other player. He may move his character and then take 1 action OR not move and take 2 actions. Limit of 1 "Executive Order" card used per turn.';
    $this->skill = 2;
    $this->type = 'Leadership';
  }
  function action($from, $args) {
  }
}
class skillled2 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Declare Emergency (3)';
    $this->cardText = 'Play after strength is totaled in a skill check to reduce its difficulty by 2. Limit of 1 "Declare Emergency" card used per skill check.';
    $this->skill = 3;
    $this->type = 'Leadership';
  }
  function action($from, $args) {
  }
}
class skillled3 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Declare Emergency (4)';
    $this->cardText = 'Play after strength is totaled in a skill check to reduce its difficulty by 2. Limit of 1 "Declare Emergency" card used per skill check.';
    $this->skill = 4;
    $this->type = 'Leadership';
  }
  function action($from, $args) {
  }
}
class skillled4 {
  var $r;
  var $name;
  var $cardText;
  var $skill;
  var $type;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Declare Emergency (5)';
    $this->cardText = 'Play after strength is totaled in a skill check to reduce its difficulty by 2. Limit of 1 "Declare Emergency" card used per skill check.';
    $this->skill = 5;
    $this->type = 'Leadership';
  }
  function action($from, $args) {
  }
}
class skillLeadershipDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $cardId = 0;
    for($i=0;$i<8;$i++) {
      $this->cards[$cardId] = new skillled0($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<6;$i++) {
      $this->cards[$cardId] = new skillled1($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<4;$i++) {
      $this->cards[$cardId] = new skillled2($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    for($i=0;$i<2;$i++) {
      $this->cards[$cardId] = new skillled3($root);
      $this->deck[$cardId] = $this->cards[$cardId];
      $cardId++;
    }
    $this->cards[$cardId] = new skillled4($root);
    $this->deck[$cardId] = $this->cards[$cardId];
  }
}
?>
