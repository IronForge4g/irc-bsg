<?php
class loyalty0 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are a Cylon';
    $this->cardText = 'Action: Reveal this card. If you are not in the "Brig," you may choose a character on Galactica. Move that character to the "Brig."';
  }
  function action($args) {
  }
}
class loyalty1 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are a Cylon';
    $this->cardText = 'Action: Reveal this card. If you are not in the "Brig," you may draw up to 5 Galactica damage tokens. Choose 2 of them to resolve and discard the others.';
  }
  function action($args) {
  }
}
class loyalty2 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are a Cylon';
    $this->cardText = 'Action: Reveal this card. If you are not in the "Brig," you may reduce moral by 1.';
  }
  function action($args) {
  }
}
class loyalty3 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are a Cylon';
    $this->cardText = 'Action: Reveal this card. If you are not in the "Brig," you may choose a character on Galactica. That character must discard 5 Skill Cards and is moved to "Sickbay."';
  }
  function action($args) {
  }
}
class loyalty4 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are a Sympathizer';
    $this->cardText = 'If at least 1 resource is half full or lower (red), you are moved to the "Brig." Otherwise you become a revealed Cylon player. You do not receive a Super Crisis Card and may not activate the "Cylon Fleet" location.';
  }
  function action($args) {
  }
}
class loyalty5 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'You Are Not a Cylon';
    $this->cardText = 'Our tests indicate that you are not a Cylon, although you can never know for sure...';
  }
  function action($args) {
  }
}
class loyaltyDeck extends deck {
  function __construct($root) {
    $this->r = root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    $playerCount = count($this->r->players);
    if($playerCount == 3) {
      $cylon = 'loyalty'.rand(0,3);
      $this->cards[0] = new $cylon($root); 
      for($i=1;$i<6;$i++) 
        $this->cards[$i] = new loyalty5($root);
    }
    else if ($playerCount == 4) {
      $cylon = 'loyalty'.rand(0,3);
      $this->cards[0] = new $cylon($root); 
      for($i=1;$i<7;$i++) 
        $this->cards[$i] = new loyalty5($root);
    }
    else if ($playerCount == 5) {
      $cylons = array(0, 1, 2, 3);
      shuffle($cylons);
      $cylon1 = 'loyalty'.$cylons[0];
      $cylon2 = 'loyalty'.$cylons[1];
      $this->cards[0] = new $cylon1($root); 
      $this->cards[1] = new $cylon2($root); 
      for($i=2;$i<10;$i++) 
        $this->cards[$i] = new loyalty5($root);
    }
    else if ($playerCount == 5) {
      $cylons = array(0, 1, 2, 3);
      shuffle($cylons);
      $cylon1 = 'loyalty'.$cylons[0];
      $cylon2 = 'loyalty'.$cylons[1];
      $this->cards[0] = new $cylon1($root); 
      $this->cards[1] = new $cylon2($root); 
      for($i=2;$i<11;$i++) 
        $this->cards[$i] = new loyalty5($root);
    }
    $this->deck = $this->cards;
  }
}
?>
