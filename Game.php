<?php


include 'QuestionDeck.php';
include 'Display.php';

function echoln($string) {
    echo $string."\n";
}


class Game {
    var $players;
    var $places;
    var $purses ;
    var $inPenaltyBox ;
    var $display;

    var $questionDeck;

    var $currentPlayer = 0;
    var $isGettingOutOfPenaltyBox;

    const BOARD_SIZE = 11;

    function  __construct(){

        $this->players = array();
        $this->places = array(0);
        $this->purses  = array(0);
        $this->inPenaltyBox  = array(0);

        $this->questionDeck=new QuestionDeck($this);
        $this->questionDeck->fillQuestions();

        $this->display = new Display();


    }

    function add($playerName) {
        array_push($this->players, $playerName);
        $this->places[$this->howManyPlayers()] = 0;
        $this->purses[$this->howManyPlayers()] = 0;
        $this->inPenaltyBox[$this->howManyPlayers()] = false;

        echoln($playerName . " was added");
        echoln("They are player number " . count($this->players));
        return true;
    }

    function howManyPlayers() {
        return count($this->players);
    }

    function  roll($roll) {
        echoln($this->players[$this->currentPlayer] . " is the current player");
        echoln("They have rolled a " . $roll);

        if ($this->inPenaltyBox[$this->currentPlayer]) {
            if ($this->isOdd($roll)) {
                $this->isGettingOutOfPenaltyBox = true;

                echoln($this->players[$this->currentPlayer] . " is getting out of the penalty box");
                $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
                if ($this->places[$this->currentPlayer] > self::BOARD_SIZE) $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;

                $this->display->showPlayerLocation($this->players[$this->currentPlayer],$this->places[$this->currentPlayer]);
                $this->display->showCategory($this->currentCategory());
                $this->askQuestion();
            } else {
                echoln($this->players[$this->currentPlayer] . " is not getting out of the penalty box");
                $this->isGettingOutOfPenaltyBox = false;
            }

        } else {

            $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
            if ($this->places[$this->currentPlayer] > self::BOARD_SIZE) $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;

            $this->display->showPlayerLocation($this->players[$this->currentPlayer],$this->places[$this->currentPlayer]);
            $this->display->showCategory($this->currentCategory());
            $this->askQuestion();
        }

    }


    public function currentCategory() {
        return $this->questionDeck->CategoryAt($this->places[$this->currentPlayer]);
    }

    function wasCorrectlyAnswered() {
        if ($this->inPenaltyBox[$this->currentPlayer]){
            if ($this->isGettingOutOfPenaltyBox) {
                echoln("Answer was correct!!!!");
                $this->giveGoldCoin();
                echoln($this->players[$this->currentPlayer]
                        . " now has "
                        .$this->purses[$this->currentPlayer]
                        . " Gold Coins.");

                $winner = $this->didPlayerWin();
                $this->nextPlayer();

                return $winner;
            } else {
                $this->nextPlayer();
                return true;
            }



        } else {

            echoln("Answer was corrent!!!!");
            $this->giveGoldCoin();
            echoln($this->players[$this->currentPlayer]
                    . " now has "
                    .$this->purses[$this->currentPlayer]
                    . " Gold Coins.");

            $winner = $this->didPlayerWin();
            $this->nextPlayer();

            return $winner;
        }
    }

    function wrongAnswer(){
        echoln("Question was incorrectly answered");
        echoln($this->players[$this->currentPlayer] . " was sent to the penalty box");
        $this->inPenaltyBox[$this->currentPlayer] = true;

        $this->nextPlayer();
        return true;
    }


    function didPlayerWin() {
        return !($this->purses[$this->currentPlayer] == 6);
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isOdd($roll): bool {
        return $roll % 2 != 0;
    }

    private function nextPlayer() {
        $this->currentPlayer++;
        if ($this->currentPlayer == count($this->players)) {
            $this->currentPlayer = 0;
        }
    }

    function askQuestion() {
        $question = $this->questionDeck->nextQuestion($this->currentCategory());
        echoln($question);
    }

    private function giveGoldCoin() {
        $this->purses[$this->currentPlayer]++;
    }


}