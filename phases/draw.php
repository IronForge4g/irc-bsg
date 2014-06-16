<?php
class phaseDraw {
  var $r;
  var $desc;

  var $needs;
  var $allowed;
  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Draw skill cards';
    $this->allowed = $this->r->currentPlayer->skills;
    $this->needs = array_sum($this->allowed);
    $this->r->mChan("{$this->r->currentPlayer->nick}: Please draw your skill cards.");
  }
  function cmddraw($from, $args) {
    if(!($this->r->checkCurrentPlayer($from, 'draw skill cards'))) return;
    if(!($this->r->checkArgs($from, $args, 1, $this->needs))) return;
    foreach($args as $arg) {
      $skillType = strtolower(substr($arg, 0, 2));
      if($skillType{0} != 'p') $skillType = $skillType{0};
      if($this->removeIfAllowed($skillType)) {
        $card = $this->r->skillDeck[$skillType]->draw();
        $this->r->currentPlayer->hand[] = $card;
        $this->r->mChan("$from has drawn from the {$card->type} deck.");
        $this->r->nUser($from, "You have drawn {$card->name}.");
      }
      else {
        $this->r->mChan("$from: $arg is not a valid draw for you.");
      }
    }
    if($this->needs == 0) {
      $this->r->setPhase('move');
    }
  }
  function removeIfAllowed($skill) {
    if($this->needs == 0) return false;
    $found = '';
    foreach($this->allowed as $type => $count) {
      if(strpos($type, $skill) === false) continue;
      if($count == 0) continue;
      $found = $type;
      break;
    }
    if($found != '') {
      $this->allowed[$found]--;
      $this->needs--;
      return true;
    }
    return false;
  }
}
?>

