<?php
class phaseNoGame {
  var $r;
  var $desc;

  var $minPlayers;
  var $maxPlayers;

  var $loyaltyDeck;

  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Waiting for Players';
    $this->minPlayers = 3;
    $this->maxPlayers = 6;
  }
  function init() {
    $this->r->mChan("A new game can now begin.");
  }
  function cmdjoin($from, $args) {
    if(isset($this->r->players[$from])) {
      $this->r->mChan("$from: You have already joined the current game.");
      return;
    }
    $playerCount = count($this->r->players);
    if($playerCount >= $this->maxPlayers) {
      $this->r->mChan("$from: Sorry, maximum number of players ({$this->maxPlayers}) has been reached.");
      return;
    }
    $this->r->players[$from] = new player($this->r, $from);
    $this->r->mChan("$from: Thank you for joining. Current players are now: ".$this->r->playerList().".");
  }
  function cmdpart($from, $args) {
    if(!(isset($this->r->players[$from]))) {
      $this->r->mChan("$from: You are not in the current game.");
      return;
    }
    unset($this->r->players[$from]);
    $playerCount = count($this->r->players);
    if($playerCount > 0) {
      $this->r->mChan("$from: Sorry you have changed your mind. Current players are now: ".$this->r->playerList().".");
    } else {
      $this->r->mChan("$from: Sorry you have changed your mind.");
    }
  }
  function cmdstart($from, $args) {
    if(!(isset($this->r->players[$from]))) {
      $this->r->mChan("$from: You must be in the current game to start it.");
      return;
    }
    $playerCount = count($this->r->players);
    if($playerCount < $this->minPlayers) {
      $this->r->mChan("$from: Sorry, only $playerCount player(s) have joined. BSG requires {$this->minPlayers}-{$this->maxPlayers} players to start a game. Current players are: ".$this->r->playerList().".");
      return;
    }
    $this->r->setPhase('characters');
  }
}
?>
