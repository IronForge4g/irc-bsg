<?php
class specialViperLocation {
  var $r;
  var $desc;
  var $returnPlayer;
  var $returnPhase;

  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Character Viper Location';
  }
  function init($retPhase, $args) {
    $this->returnPhase = $retPhase;
    $this->returnPlayer = $this->r->currentPlayer;
    $this->r->currentPlayer = $args[0];
    $this->r->mChan("{$this->r->currentPlayer}: Please choose your launch location with '!launch left' or '!launch right'.");
  }
  function cmdlaunch($from, $args) {
    if(!($this->r->checkCurrentPlayer($from, 'viper launch'))) return;
    if(!($this->r->checkArgs($from, $args, 1))) return;
    $loc = strtolower(substr($args[0], 0, 1));
    if($args[0] == 'l') {
      $this->r->locations['spaceBL']->move($this->r->currentPlayer);
      $this->r->mChan("$from is starting in {$this->r->currentPlayer->location->name}.");
    }
    else if ($args[0] == 'r') {
      $this->r->locations['spaceBR']->move($this->r->currentPlayer);
      $this->r->mChan("$from is starting in {$this->r->currentPlayer->location->name}.");
      $this->r->currentPlayer = $this->returnPlayer;
      $this->r->setPhase($this->returnPhase);
    }
    else {
      $this->r->mChan("$from: Please launch from either left or right.");
    }
  }
}
?>
