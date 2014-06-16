<?php
class location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function move(&$item) {
    $this->objects[] = $item;
    if($item->location != null) {
      $key = array_search($item, $item->location->objects, true);
      if($key != null) unset($item->location->objects[$key]);
    }
    $item->location = $this;
  }
}
class bsgFTLControl extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'FTL Control';
    $this->text = 'Action: Jump the fleet if the jump Jump Preparation track is not in the red zone.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgWeaponsControl extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Weapons Control';
    $this->text = 'Action: Attack 1 Cylon ship with Galactica.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgCommand extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Command';
    $this->text = 'Action: Activate up to 2 unmanned vipers.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgCommunications extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Communications';
    $this->text = 'Action: Look at the back of 2 civilian ships. You may move them to adjacent area(s).';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgResearchLab extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Research Lab';
    $this->text = 'Action: Draw 1 engineering or 1 tactics skill card.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgAdmiralsQuarters extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Admirals Quarters';
    $this->text = 'Action: Choose a character then pass this skill to send him to the "Brig."';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgHangarDeck extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Hangar Deck';
    $this->text = 'Action: Launch yourself in a viper. You may then take 1 more action.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgArmory extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Armory';
    $this->text = 'Action: Attack a centurion on the boarding party track (destroyed on a roll of 7-8).';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgSickbay extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Sickbay';
    $this->text = 'You may only draw 1 skill card during your receive skills step.';
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class bsgBrig extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Brig';
    $this->text = array('You may not move, draw crisis cards, or add more than 1 card to skill checks.', 'Action: Pass this skill check to move to any location.');
    $this->location = 'Galactica';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class c1PressRoom extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Press Room';
    $this->text = 'Action: Draw 2 politics skill cards.';
    $this->location = 'Colonial One';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class c1PresidentsOffice extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Presidents Office';
    $this->text = 'Action: If you are President, draw 1 quorum card. You may then draw 1 additional quorum card or play 1 from your hand.';
    $this->location = 'Colonial One';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class c1Administration extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Administration';
    $this->text = 'Action: Choose a character, then pass this skill check to give him the president title.';
    $this->location = 'Colonial One';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class cylonCaprica extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Caprica';
    $this->text = 'Action: Play your super crisis card or draw 2 crisis cards, choose 1 to resolve, and discard the other. * No activate cylon ships or prepare for jump steps.';
    $this->location = 'Cylonland';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class cylonCylonFleet extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Cylon Fleet';
    $this->text = 'Action: Activate all Cylon ships of one type, or launch 2 raiders and 1 heavy raider from each basestar.';
    $this->location = 'Cylonland';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class cylonHumanFleet extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Human Fleet';
    $this->text = 'Action: Look at any players hand, and steal 1 skill card (place it in your hand). Then roll a die, and if 5 or higher, damage Galactica.';
    $this->location = 'Cylonland';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class cylonResurrectionShip extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Resurrection Ship';
    $this->text = 'Action: You may discard your super crisis card to draw a new one. Then, if distance is 7 or less, give your unrevealed loyalty card(s) to any player.';
    $this->location = 'Cylonland';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class stranded extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Stranded';
    $this->text = 'You are stranded.';
    $this->location = 'Stranded';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
class space extends location {
  var $r;
  var $id;
  var $name;
  var $location;
  var $objects;
  var $neighbours;

  function __construct($root, $id, $name) {
    $this->r = $root;
    $this->id = $id;
    $this->name = $name;
    $this->location = 'Space';
    $this->neighbours = array();
    $this->objects = array();
  }
}
class resources extends location {
  var $r;
  var $name;
  var $text;
  var $location;
  var $objects;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Resources';
    $this->text = 'Resources for use in game.';
    $this->location = 'Resources';
    $this->objects = array();
  }
  function action($from, $args) {
  }
}
?>
