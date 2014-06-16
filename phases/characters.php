<?php
class phaseCharacters {
  var $r;
  var $desc;

  var $characters;
  var $taken;
  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Character Selection';
    for($i=0;$i<10;$i++) {
      $char = 'char'.$i;
      $this->characters[$i] = new $char($root);
    }
    $taken = array('Military' => 0, 'Pilot' => 0, 'Political' => 0, 'Support' => 0);
  }
  function init() {
    $this->r->mChan("The game has now begun. The turn order is: ".$this->r->playerList().".");
    /*
     * Set order of players, so that $player->next points to the next $player object.
     */
    $first = null;
    $last = null;
    foreach($this->r->players as $nick => $player) {
      if($last == null) {
        $first = $player;
        $last = $player;
        continue;
      }
      $last->next = $player;
      $last = $player;
    }
    $last->next = $first;
    $this->r->currentPlayer = $first;
    $this->r->mChan("{$first->nick}: Please select your character with !char.");
    $this->r->mChan("Available characters are: ".$this->availableCharactersDisplay().".");
  }
  function availableCharactersDisplay() {
    $minTaken = min($this->taken);
    $avail = array();
    foreach($this->characters as $id => $character) {
      if($character->player != null) continue;
      if($character->type == 'Support') $avail[$id] = $id.'. '.$character->name.' ('.$character->type.')';
      else if($this->taken[$character->type] == $minTaken) $avail[$id] = $id.'. '.$character->name;
    }
    return implode(', ', $avail);
  }
  function availableCharacters() {
    $minTaken = min($this->taken);
    $avail = array();
    foreach($this->characters as $id => $character) {
      if($character->player != null) continue;
      if($character->type == 'Support') $avail[$id] = $character;
      else if($this->taken[$character->type] == $minTaken) $avail[$id] = $character;
    }
    return $avail;
  }
  function cmdchar($from, $args) {
    if(!($this->r->checkCurrentPlayer($from, 'select a character'))) return;
    if(!($this->r->checkArgs($from, $args, 1))) return;
    $char = $args[0];
    $avail = $this->availableCharacters();
    if(!(isset($avail[$char]))) {
      $this->r->mChan("$from: Please select a valid character.");
      return;
    }
    $avail[$char]->player = $this->r->currentPlayer;
    $this->r->currentPlayer->character = $avail[$char];
    $this->r->mChan("$from has selected ".$avail[$char]->name.".");
    $this->r->currentPlayer = $this->r->currentPlayer->next;
    if($this->r->currentPlayer->character == null) {
      $this->r->mChan("{$this->r->currentPlayer->nick}: Please select your character with !char.");
      $this->r->mChan("Available characters are: ".$this->availableCharactersDisplay().".");
    } else {
      $this->r->mChan("Characters have been selected.");
      $bestPresident = null;
      $bestAdmiral = null;
      foreach($this->r->players as $nick => $player) {
        if($bestPresident == null) $bestPresident = $player;
        if($bestAdmiral == null) $bestAdmiral = $player;
        if($player->character->president < $bestPresident->character->president) $bestPresident = $player;
        if($player->character->admiral < $bestAdmiral->character->admiral) $bestAdmiral = $player;
      }
      $this->r->mChan("{$bestPresident->nick} has been made President.");
      $this->r->mChan("{$bestAdmiral->nick} has been made Admiral.");
      $bestPresident->president = new president();
      $bestAdmiral->admiral = new admiral();
      $viper = null;
      foreach($this->r->players as $nick => $player) {
        $lCard = $this->r->loyaltyDeck->draw();
        $player->loyalty[] = $lCard;
        $this->nUser($nick, "You're loyalty card is: ".$lCard->name.".");
        $this->nUser($nick, $lCard->cardText);
        if($player->character->startingLocation == 'Viper') {
          $viper = $player;
        } else {
          $this->r->locations[$player->character->startingLocation]->move($player);
          $this->r->mChan("$nick is starting in {$player->location->name}.");
        }
      }
      if($viper != null) $this->r->specialPhase('viperLocation', 'skills', array($viper));
      else $this->r->setPhase('skills');
    }
  }
}
?>
