<?php
class char0 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'William Adama';
    $this->text = array('Inspirational Leader - When y ou draw a crisis card, all 1 strength skill cards count positive for teh skill check.', 'Command Authority - Once per game, after resolving a skill check, instead of discarding the used skill cards, draw them into your hand.', 'Emotionally Attached - You may not activate the Admirals Quarters location.');
    $this->admiral = 1;
    $this->president = 5;
    $this->type = 'Military';
    $this->player = null;
    $this->startingLocation = 'bsgAdmiralsQuarters';

    $this->skills = array('l' => 3, 't' => 2);
  }
}
class char1 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Saul Tigh';
    $this->text = array('Cylon Hatred - When a player activates the Admirals Quarters location, you may choose to reduce the difficulty by 3.', 'Action: Declare Martial Law - Once per game, give the President title to the Admiral.', 'Alcoholic - At the start of any players turn, if you have exactly 1 skill card in your hand, you must discard it.');
    $this->admiral = 2;
    $this->president = 9;
    $this->type = 'Military';
    $this->player = null;
    $this->startingLocation = 'bsgCommand';

    $this->skills('l' => 2, 't' => 3);
  }
}
class char2 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Karl "Helo" Agathon';
    $this->text = array('ECO Officer - During your turn, you may reroll a die that was just rolled (once per turn). You must use the new result', 'Moral Compass - Once per game, after a player makes a choice on a crisis card, you may change it.', 'Stranded - Your character is not placed on the game board at the start of the game. While not on the game board, you may not move, be moved, or take actions. At the start of your 2nd turn, place your character on the Hangar Deck location');
    $this->admiral = 3;
    $this->president = 6;
    $this->type = 'Military';
    $this->player = null;
    $this->startingLocation = 'stranded'; // Special rules, not anywhere first turn, start here 2nd turn.

    $this->skills('l' => 2, 't' => 2, 'pi' => 1);
  }
}
class char3 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Lee "Apollo" Adama';
    $this->text = array('Alert Viper Pilot - When a viper is placed in a space area from the Reserves, you may choose to pilot it and take 1 action. You may only do this when you are on a Galactica location, exclusing the Brig.', 'Action: CAG - Once per game, you may activate up to 6 unmanned vipers.', 'Headstrong - When you are forced to discard skill cards, you must discard randomly.');
    $this->admiral = 4;
    $this->president = 4;
    $this->type = 'Pilot';
    $this->player = null;
    $this->startingLocation = 'Viper'; // Special rules, starts in a viper.

    $this->skills('t' => 1, 'pi' => 2, 'l/po' => 2);
  }
}
class char4 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Kara "Starbuck" Thrace';
    $this->text = array('Expert Pilot - When you start your turn piloting a viper, you may take 2 actions during your action step (instead of 1).', 'Secret Destiny - Once per game, immediately after a crisis card is revealed, discard it, and draw a new one.', 'Insubordinate - When a player chooses you witht he Admirals Quarters location, reduce the difficulty by 3.');
    $this->admiral = 5;
    $this->president = 10;
    $this->type = 'Pilot';
    $this->player = null;
    $this->startingLocation = 'bsgHangarDeck';

    $this->skills('t' => 2, 'pi' => 2, 'l/e' => 1);
  }
}
class char5 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Sharon "Boomer" Valerii';
    $this->text = array('Recon - At the end of your turn, you may look at the top card of the crisis deck and place it on the top or bottom.', 'Mysterious Intuition - Once per game, before resolving a skill check on a crisis card, choose the result (pass or fail), instead of resolving it normally.', 'Sleeper Agent - During the sleeper agent phase, you are dealt 2 loyalty cards (instead of 1) and then moved to the Brig location.');
    $this->admiral = 6;
    $this->president = 8;
    $this->type = 'Pilot';
    $this->player = null;
    $this->startingLocation = 'bsgArmory';

    $this->skills('t' => 2, 'pi' => 2, 'e' => 1);
  }
}
class char6 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = '"Chief" Gelen Tyrol';
    $this->text = array('Maintenance Engineer - During your turn, after you use a repair skill card, you may take another action (once per turn).', 'Blind Devotion - Once per game, after cards have been added to a skill check (but before revealing them), you may choose a skill type. All cards of the chosen type are considered strength 0.', 'Reckless - Your hand limit is 8 (instead of 10)');
    $this->admiral = 7;
    $this->president = 7;
    $this->type = 'Support';
    $this->player = null;
    $this->startingLocation = 'bsgHangarDeck';

    $this->skills('po' => 1, 'l' => 2, 'e' => 2);
  }
}
class char7 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Tom Zarek';
    $this->text = array('Friends in Low Places - When a player activates the Administration or the Brig location, you may choose to reduce or increase the difficulty by 2.', 'Action: Unconventional Tactics - Once per game, lose 1 population to gain 1 of any other resource type', 'Convicted Criminal - You may not activate locations occupied by other characters (except the Brig).');
    $this->admiral = 8;
    $this->president = 3;
    $this->type = 'Political';
    $this->player = null;
    $this->startingLocation = 'c1Administration';

    $this->skills('po' => 2, 'l' => 2, 't' => 1);
  }
}
class char8 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Gaius Baltar';
    $this->text = array('Delusional Intuition - After you draw a crisis card, draw 1 skill card of your choice (it may be from outside your skill set).', 'Action: Cylon Detector - Once per game, you may look at all loyalty cards belonging to another player.', 'Coward - You start the game with 2 loyalty cards (instead of 1).');
    $this->admiral = 9;
    $this->president = 2;
    $this->type = 'Political';
    $this->player = null;
    $this->startingLocation = 'bsgResearchLab';

    $this->skills('po' => 2, 'l' => 1, 'e' => 1);
  }
}
class char9 {
  var $r;
  var $name;
  var $text;
  var $admiral;
  var $president;
  var $type;
  var $player;
  var $startingLocation;

  var $skills;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Laura Roslin';
    $this->text = array('Religious Visions - When you draw crisis cards, draw 2 and choose 1 to resolve. Place the other on the bottom of the deck.', 'Action: Skilled Politician - Once per game, draw 4 quorum cards. Choose 1 to resolve and place the rest on the bottom of the deck. You do not need to be the president to use this ability.', 'Terminal Illness - In order to activate a location, you must first discard 2 skill cards.');
    $this->admiral = 10;
    $this->president = 1;
    $this->type = 'Political';
    $this->player = null;
    $this->startingLocation = 'c1PresidentsOffice';

    $this->skills('po' => 3, 'l' => 2);
  }
}
class president {
  var $r;
  var $player;
  var $quorumHand;
  function __construct($root, $player) {
    $this->r = $root;
    $this->player = $player;
    $this->quorumHand[] = $this->r->quorumDeck->draw();
  }
  function quorumDisplay() {
    $display = array();
    foreach($this->quorumHand as $id => $quorum) {
      $display[] = "$id. $quorum";
    }
    return implode(', ', $display);
  }
}
class admiral {
  var $r;
  var $player;
  var $nukes;

  function __construct($root, $player) {
    $this->r = $root;
    $this->player = $player;
    $this->nukes = 2;
  }
}
?>
