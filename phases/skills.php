<?php
class phaseSkills {
  var $r;
  var $desc;

  var $needs;
  var $allowed;

  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Skill Selection';
    $this->needs = array();
    foreach($this->r->players as $nick => $player) {
      if($this->r->currentPlayer == $player) continue;
      $this->needs[$nick] = 3;
      $this->allowed[$nick] = $player->skills;
    }
    $this->r->mChan("Everyone (except {$this->r->currentPlayer->nick}), please draw 3 skill cards matching your skills.");
  }
  function cmddraw($from, $args) {
    if(!(isset($this->needs[$from]))) {
      $this->r->mChan("$from: You have already selected your cards.");
      return;
    }
    if(!($this->r->checkArgs($from, $args, 1, $this->needs[$from]))) return;
    foreach($args as $arg) {
      $skillType = strtolower(substr($arg, 0, 2));
      if($skillType{0} != 'p') $skillType = $skillType{0};
      if($this->removeIfAllowed($from, $skillType)) {
        $card = $this->r->skillDeck[$skillType]->draw();
        $this->r->players[$from]->hand[] = $card;
        $this->r->mChan("$from has drawn from the {$card->type} deck.");
        $this->r->nUser($from, "You have drawn {$card->name}.");
      }
      else {
        $this->r->mChan("$from: $arg is not a valid draw for you.");
      }
    }
    $remove = array();
    foreach($this->needs as $nick => $count) {
      if($count == 0) {
        $remove[] = $nick;
        $this->r->mChan("$from has chosen all their skill cards.");
      }
    }
    foreach($remove as $rem) unset($this->needs[$rem]);
    if(count($this->needs) == 0) {
      $this->r->mChan("Everyone has selected their skills. Setting up destiny deck.");
      $this->r->destinyDeck->generate();
      $this->r->setPhase('draw');
    }
  }
  function removeIfAllowed($nick, $skill) {
    if($this->needs[$nick] == 0) return false;
    $found = '';
    foreach($this->allowed[$nick] as $type => $count) {
      if(strpos($type, $skill) === false) continue;
      if($count == 0) continue;
      $found = $type;
      break;
    }
    if($found != '') {
      $this->allowed[$nick][$found]--;
      $this->needs[$nick]--;
      return true;
    }
    return false;
  }
}
?>

