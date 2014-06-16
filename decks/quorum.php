<?php
class quorum0 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Accept Prophecy';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum1 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Arrest Order';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum2 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Assign Arbitrator';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum3 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Assign Mission Specialist';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum4 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Assign Vice President';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum5 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Authorization of Brutal Force';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum6 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Encourage Mutiny';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum7 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Food Rationing';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum8 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Inspirational Speech';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum9 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Presidential Pardon';
    $this->cardText = '';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorum10 {
  var $r;
  var $name;
  var $cardText;

  function __construct($root) {
    $this->r = $root;
    $this->name = 'Release Cylon Mugshots';
  }
  function action($from, $args) {
  }
  function inPlay() {
  }
}
class quorumDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
    for($i=0;$i<11;$i++) {
      $quorum = 'quorum'.$i;
      $this->cards[$i] = new $quorum($root);
    }
    $this->deck = $this->cards;
  }
}
?>
