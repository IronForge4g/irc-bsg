<?php
class player {
  var $r;
  var $nick;
  var $messages;
  var $next;

  var $character;
  var $admiral;
  var $president;
  var $loyalty;
  var $location;
  
  var $skills;

  function __construct($root, $nick) {
    $this->r = $root;
    $this->nick = $nick;
    $this->messages = 'notice';
    $this->character = null;
    $this->admiral = null;
    $this->president = null;
    $this->loyalty = array();
    $this->location = null;
    $this->skills = array();
  }
  function skillsDisplay() {
    $display = array();
    foreach($this->skills as $id => $skill) {
      $display[] = "$id. $skill";
    }
    return implode(', ', $display);
  }
}
?>
