<?php
class destinyDeck extends deck {
  function __construct($root) {
    $this->r = $root;
    $this->cards = array();
    $this->deck = array();
    $this->discard = array();
  }
  function generate() {
    foreach($this->discard as $id => $card) {
      $skillType = strtolower(substr($card->type, 0, 2));
      if($skillType{0} != 'p') $skillType = $skillType{0};
      $this->r->skillDeck[$skillType]->discard($card);
    }
    $this->discard = array();
    for($i=0;$i<2;$i++) {
      $this->deck[] = $this->r->skillDeck['e']->draw();
      $this->deck[] = $this->r->skillDeck['l']->draw();
      $this->deck[] = $this->r->skillDeck['pi']->draw();
      $this->deck[] = $this->r->skillDeck['po']->draw();
      $this->deck[] = $this->r->skillDeck['t']->draw();
    }
  }
  function draw() {
    if(count($this->deck) == 0) {
      $this->mChan('Destiny deck is empty, recreating.');
      $this->generate();
    }
    $keys = array_keys($this->deck);
    shuffle($keys);
    $card = $this->deck[$keys[0]];
    unset($this->deck[$keys[0]]);
    return $card;
  }
}
?>
