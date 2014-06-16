<?php
class phaseMove {
  var $r;
  var $desc;

  var $validMoves;
  function __construct($root) {
    $this->r = $root;
    $this->desc = 'Move character';
    $this->validMoves = array('0');
    $this->r->mChan("{$this->r->currentPlayer->nick}: Please move your character.");
    $currentLocation = $this->r->currentPlayer->location;
    $this->r->mChan("0. Stay where you are.");
    if($currentLocation->location == 'Galactica' || $currentLocation->location == 'Colonial One' || $currentLocation->location == 'Space') {
      $this->validMoves = array_merge($this->validMoves, array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'));
      $this->r->mChan("A. Galactica - FTL Control");
      $this->r->mChan("B. Galactica - Weapons Control");
      $this->r->mChan("C. Galactica - Command");
      $this->r->mChan("D. Galactica - Communications");
      $this->r->mChan("E. Galactica - Research Lab");
      $this->r->mChan("F. Galactica - Admirals Quarters");
      $this->r->mChan("G. Galactica - Hangar Deck");
      $this->r->mChan("H. Galactica - Armory");
      if($currentLocation->location != 'Space') {
      $this->validMoves = array_merge($this->validMoves, array('i', 'j', 'k'));
        $this->r->mChan("I. Colonial One - Press Room");
        $this->r->mChan("J. Colonial One - Presidents Office");
        $this->r->mChan("K. Colonial One - Administration");
      } else {
        foreach($currentLocation->neighbours as $id => $spaceLocation) {
          $letter = str_replace("space", "", $id);
          $this->validMoves[] = strtolower($letter);
          $this->r->mChan("$letter. {$spaceLocation->name}");
        }
      }
    } else if ($currentLocation->location = 'Cylonland') {
      $this->validMoves = array_merge($this->validMoves, array('w', 'x', 'y', 'z'));
      $this->r->mChan("W. Caprica");
      $this->r->mChan("X. Cylon Fleet");
      $this->r->mChan("Y. Human Fleet");
      $this->r->mChan("Z. Resurrection Ship");
    }
  }
  function cmdmove($from, $args) {
    if(!($this->r->checkCurrentPlayer($from, 'move character'))) return;
    if(!($this->r->checkArgs($from, $args, 1, 2))) return;
    if(!(in_array($args[0], $this->validMoves))) {
      $this->r->mChan("$from: Please specify a valid location.");
      return;
    }
    if($args[0] == '0') {
      $this->r->mChan("$from is staying at their current location.");
      $this->r->setPhase('action');
      return;
    }
    else if($args[0] == 'a') $target = $this->r->locations['bsgFTLContrl'];
    else if($args[0] == 'b') $target = $this->r->locations['bsgWeaponsControl'];
    else if($args[0] == 'c') $target = $this->r->locations['bsgCommand'];
    else if($args[0] == 'd') $target = $this->r->locations['bsgCommunications'];
    else if($args[0] == 'e') $target = $this->r->locations['bsgResearchLab'];
    else if($args[0] == 'f') $target = $this->r->locations['bsgAdmiralsQuarters'];
    else if($args[0] == 'g') $target = $this->r->locations['bsgHangarDeck'];
    else if($args[0] == 'h') $target = $this->r->locations['bsgArmory'];
    else if($args[0] == 'i') $target = $this->r->locations['c1PressRoom'];
    else if($args[0] == 'j') $target = $this->r->locations['c1PresidentsOffice'];
    else if($args[0] == 'k') $target = $this->r->locations['c1Administration'];
    else if($args[0] == 'l') $target = $this->r->locations['spaceL'];
    else if($args[0] == 'tl') $target = $this->r->locations['spaceTL'];
    else if($args[0] == 'tr') $target = $this->r->locations['spaceTR'];
    else if($args[0] == 'r') $target = $this->r->locations['spaceR'];
    else if($args[0] == 'bl') $target = $this->r->locations['spaceBL'];
    else if($args[0] == 'br') $target = $this->r->locations['spaceBR'];
    else if($args[0] == 'w') $target = $this->r->locations['cylonCaprica'];
    else if($args[0] == 'x') $target = $this->r->locations['cylonCylonFleet'];
    else if($args[0] == 'y') $target = $this->r->locations['cylonHumanFleet'];
    else if($args[0] == 'z') $target = $this->r->locations['cylonResurrectionShip'];
    $currentLocation = $this->r->currentPlayer->location;
    if($currentLocation->location == $target->location) {
      if($currentLocation->location == 'Space' && !(in_array($target, $currentLocation->neighbours))) {
        $this->r->mChan("$from: You can only move to adjacent locations in space.");
        return;
      } else {
        $target->move($this->r->currentPlayer);
        $this->r->mChan("$from has moved to {$target->name}");
        $this->r->setPhase('action');
      }
    } else {
      if(!(isset($args[1]))) {
        $this->r->mChan("$from: To move to a different area, you must also specify a card to discard.");
        return;
      }
      if(isset($this->r->currentPlayer->skills[$args[1]])) {
        $card = $this->r->currentPlayer->skills[$args[1]];
        $target->move($this->r->currentPlayer);
        $this->r->mChan("$from has discarded a {$card->type} skill card, and moved to {$target->name}.");
        $skillType = strtolower(substr($card->type, 0, 2));
        if($skillType{0} != 'p') $skillType = $skillType{0};
        $this->r->skillDeck[$skillType]->discard($card);
        unset($this->r->currentPlayer->skills[$args[1]]);
        $this->r->setPhase('action');
      } else {
        $this->r->mChan("$from: Please specify a valid card to discard.");
        return;
      }
    }
  }
}
?>

