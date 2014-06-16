<?php
require_once('classes\player.php');
require_once('classes\locations.php');
require_once('classes\ships.php');


require_once('decks\deck.php');
require_once('decks\quorum.php');
require_once('decks\loyalty.php');
require_once('decks\skillEngineering.php');
require_once('decks\skillLeadership.php');
require_once('decks\skillPiloting.php');
require_once('decks\skillPolitics.php');
require_once('decks\skillTactics.php');
require_once('decks\civilians.php');

require_once('phases\nogame.php');
require_once('phases\characters.php');
require_once('phases\skills.php');
require_once('phases\draw.php');
require_once('phases\move.php');

require_once('special\viperLocation.php');


class bsg implements pluginInterface {
  var $config;
  var $socket;
  var $channel;

  var $food;
  var $fuel;
  var $morale;
  var $population;

  var $players;
  var $phases;
  var $phase; 
  var $currentPlayer;

  var $quorumDeck;
  var $loyaltyDeck;
  var $skillDeck;
  var $destinyDeck;
  var $civiliansDeck;

  var $locations;
  var $ships;

  function init($config, $socket) {
    $this->config = $config;
    $this->socket = $socket;
    $this->channel = '#PlayBSG';

    $this->setupBoard();
  }
  function setupBoard() {
    $this->food = 8;
    $this->fuel = 8;
    $this->morale = 10;
    $this->population = 12;

    $this->phases = array();
    $this->players = array();
    $this->phases['nogame'] = new phaseNoGame($this);
    $this->phases['characters'] = new phaseCharacters($this);
    $this->phases['skills'] = new phaseSkills($this);
    $this->phases['draw'] = new phaseSkills($this);
    $this->phases['move'] = new phaseSkills($this);
    $this->phases['viperLocation'] = new specialViperLocation($this);

    $this->phase = $this->phases['nogame'];
    $this->currentPlayer = null;
    $this->quorumDeck = new quorumDeck($this);
    $this->loyaltyDeck = new loyaltyDeck($this);
    $this->skillDeck = array();
    $this->skillDeck['e'] = new skillEngineeringDeck($this);
    $this->skillDeck['l'] = new skillLeadershipDeck($this);
    $this->skillDeck['pi'] = new skillPilotingDeck($this);
    $this->skillDeck['po'] = new skillPoliticsDeck($this);
    $this->skillDeck['t'] = new skillTacticsDeck($this);
    $this->destinyDeck = new destinyDeck($this);

    $this->locations = array();
    $this->locations['bsgFTLControl'] = new bsgFTLControl($this);
    $this->locations['bsgWeaponsControl'] = new bsgWeaponsControl($this);
    $this->locations['bsgCommand'] = new bsgCommand($this);
    $this->locations['bsgCommunications'] = new bsgCommunications($this);
    $this->locations['bsgResearchLab'] = new bsgResearchLab($this);
    $this->locations['bsgAdmiralsQuarters'] = new bsgAdmiralsQuarters($this);
    $this->locations['bsgHangarDeck'] = new bsgHangarDeck($this);
    $this->locations['bsgArmory'] = new bsgArmory($this);
    $this->locations['bsgSickbay'] = new bsgSickbay($this);
    $this->locations['bsgBrig'] = new bsgBrig($this);
    $this->locations['c1PressRoom'] = new c1PressRoom($this);
    $this->locations['c1PresidentsOffice'] = new c1PresidentsOffice($this);
    $this->locations['c1Administration'] = new c1Administration($this);
    $this->locations['cylonCaprica'] = new cylonCaprica($this);
    $this->locations['cylonCylonFleet'] = new cylonCylonFleet($this);
    $this->locations['cylonHumanFleet'] = new cylonHumanFleet($this);
    $this->locations['cylonResurrectionShip'] = new cylonResurrectionShip($this);
    $this->locations['stranded'] = new stranded($this);
    $this->locations['resources'] = new resources($this);

    $this->locations['spaceL'] = new space($this, 'spaceL', 'Space (Left)');
    $this->locations['spaceTL'] = new space($this, 'spaceTL', 'Space (Top Left)');
    $this->locations['spaceTR'] = new space($this, 'spaceTR', 'Space (Top Right)');
    $this->locations['spaceR'] = new space($this, 'spaceR', 'Space (Right)');
    $this->locations['spaceBR'] = new space($this, 'spaceBR', 'Space (Bottom Right)');
    $this->locations['spaceBL'] = new space($this, 'spaceBL', 'Space (Bottom Left)');

    $this->locations['spaceL']->neighbours['spaceTL'] = $this->locations['spaceTL'];
    $this->locations['spaceL']->neighbours['spaceBL'] = $this->locations['spaceBL'];
    $this->locations['spaceTL']->neighbours['spaceL'] = $this->locations['spaceL'];
    $this->locations['spaceTL']->neighbours['spaceTR'] = $this->locations['spaceTR'];
    $this->locations['spaceBL']->neighbours['spaceL'] = $this->locations['spaceL'];
    $this->locations['spaceBL']->neighbours['spaceBR'] = $this->locations['spaceBR'];
    $this->locations['spaceR']->neighbours['spaceTR'] = $this->locations['spaceTR'];
    $this->locations['spaceR']->neighbours['spaceBR'] = $this->locations['spaceBR'];
    $this->locations['spaceTR']->neighbours['spaceTL'] = $this->locations['spaceTL'];
    $this->locations['spaceTR']->neighbours['spaceR'] = $this->locations['spaceR'];
    $this->locations['spaceBR']->neighbours['spaceR'] = $this->locations['spaceR'];
    $this->locations['spaceBR']->neighbours['spaceBL'] = $this->locations['spaceBL'];

    $this->civilansDeck = new civiliansDeck($this);
    $this->ships = array();
    for($i=0;$i<2;$i++) { // 0-1
      $ship = new basestar($this);
      $this->locations['resources']->move($ship);
      $this->ships[] = $ship;
    }
    for($i=0;$i<8;$i++) { // 2-9
      $ship = new viper($this);
      $this->locations['resources']->move($ship);
      $this->ships[] = $ship;
    }
    for($i=0;$i<16;$i++) { // 10-25
      $ship = new raider($this);
      $this->locations['resources']->move($ship);
      $this->ships[] = $ship;
    }
    for($i=0;$i<4;$i++) { // 26-29
      $ship = new heavyRaider($this);
      $this->locations['resources']->move($ship);
      $this->ships[] = $ship;
    }
    $this->locations['spaceL']->move($this->ships[0]);
    $this->locations['spaceL']->move($this->ships[10]);
    $this->locations['spaceL']->move($this->ships[11]);
    $this->locations['spaceL']->move($this->ships[12]);
    $this->locations['spaceBL']->move($this->ships[2]);
    $this->locations['spaceBR']->move($this->ships[3]);
    $civ = $this->civiliansDeck->draw();
    $this->locations['spaceR']->move($civ);
    $civ = $this->civiliansDeck->draw();
    $this->locations['spaceR']->move($civ);
  }

  function tick() {

  }

  function onMessage($from, $channel, $msg) {
    if($msg{0} != '!') continue;
    $args = explode(" ", $msg);
    $cmdRaw = array_shift($args);
    $cmd = 'cmd'.strtolower(substr($cmdRaw, 1));
    if(trim($cmd) == 'cmd') continue;
    if(method_exists($this, $cmd)) {
      $this->$cmd($from, $args);
    } else if(method_exists($this->phase, $cmd)) {
      $this->phase->$cmd($from, $args);
    } else {
      $this->mChan("$from: $cmdRaw does not exist in the phase '{$this->phase->desc}'.");
    }

  }
  function onNick($from, $to) {
    if(isset($this->players[$from])) {
      $this->players[$to] = $this->players[$from];
      $this->players[$to]->nick = $to;
      unset($this->players[$from]);
    }
  }
  function onQuit($from) {

  }

  function destroy() {

  }
  function onData($data) {
    $tmp = explode(" ", trim($data));
    $from = getNick($tmp[0]);
    if(!(isset($tmp[1]))) continue;
    if($tmp[1] == 'NICK') $this->onNick($from, str_replace(":", "", $tmp[2]));
    else if($tmp[1] == 'PART' && trim(strtolower($this->channel)) == trim(strtolower($tmp[2]))) $this->onQuit($from);
    else if($tmp[1] == 'QUIT') $this->onQuit($from);
  }
  function mChan($message) {
    sendMessage($this->socket, $this->channel, $message);
  }
  function nUser($nick, $message) {
    if($this->players[$nick]->messages == 'notice')
      sendNotice($this->socket, $nick, $message);
    else
      sendMessage($this->socket, $nick, $message);
  }
  function playerList() {
    $players = array_keys($this->players);
    return implode(", ", $players);
  }
  function specialPhase($phase, $return, $args = array()) {
    $this->phase = $this->phases[$phase];
    $this->phase->init($args);
  }
  function setPhase($phase, $init = true) {
    $this->phase = $this->phases[$phase];
    if($init) $this->phase->init();
  }
  function checkCurrentPlayer($from, $cmd) {
    if($this->p->currentPlayer->nick != $from) {
      $this->mChan("$from: Please wait your turn to $cmd.");
      return false;
    }
    return true;
  }
  function checkArgs($from, $args, $min, $max = -1) {
    if($max == -1) $max = $min;
    $argc = count($args);
    if($argc < $min || $argc > $max) {
      if($min == $max) $this->mChan("$from: That command only takes $min argument(s). Please try again.");
      else $this->mChan("$from: That command requires $min-$max arguments. Please try again.");
      return false;
    }
    return true;
  }
  function cmdshuffle($from, $args) {
    if(isset($this->players[$from])) {
      $player = $this->players[$from];
      shuffle($player->skills);
      $this->nUser($from, "Skills: ".$player->skillsDisplay().'.');
      if($player->president != null) {
        shuffle($player->president->quorumHand);
        $this->nUser($from, "Quorum: ".$player->president->quorumDisplay().'.');
      }
    }
  }
  function cmdmessages($from, $args) {
    if(isset($this->players[$from])) {
      $player = $this->players[$from];
      if(!(checkArgs($from, $args, 1))) return;
      $messageType = strtolower(substr($arg, 0, 1));
      if($messageType == 'q' || $messageType == 'm' || $messageType == 'p') $player->messages = 'query';
      else if($messageType == 'n') $player->messages = 'notice';
      else {
        $this->mChan("$from: Please specify a valid message destination, q for queries or n for notices.");
        return;
      }
      $this->nUser($from, "Messages will now be delivered here.");
    }
  }
}
?>
