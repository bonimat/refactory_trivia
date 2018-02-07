<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 2/7/18
 * Time: 10:20 AM
 */

class QuestionDeck
{

    var $popQuestions;
    var $scienceQuestions;
    var $sportsQuestions;
    var $rockQuestions;


    function  __construct()    {
        $this->popQuestions = array();
        $this->scienceQuestions = array();
        $this->sportsQuestions = array();
        $this->rockQuestions = array();
    }
    /**
     * @param $category
     */
    public function askQuestionFor ($category)
    {
        if ($category == "Pop")
            echoln(array_shift($this->popQuestions));
        if ($category == "Science")
            echoln(array_shift($this->scienceQuestions));
        if ($category == "Sports")
            echoln(array_shift($this->sportsQuestions));
        if ($category == "Rock")
            echoln(array_shift($this->rockQuestions));
    }

    public function CategoryAt ($place)
    {
        if ($place == 0) return "Pop";
        if ($place == 4) return "Pop";
        if ($place == 8) return "Pop";
        if ($place == 1) return "Science";
        if ($place == 5) return "Science";
        if ($place == 9) return "Science";
        if ($place == 2) return "Sports";
        if ($place == 6) return "Sports";
        if ($place == 10) return "Sports";
        if ($place == 3) return "Rock";
        if ($place == 7) return "Rock";
        if ($place == 11) return "Rock";
        throw new Exception('Place must be inside the board');
    }

    public function createRockQuestion ($index)
    {
        return "Rock Question " . $index;
    }

    public function fillQuestions ()
    {
        for ($i = 0; $i < 50; $i++) {
            array_push($this->popQuestions, "Pop Question " . $i);
            array_push($this->scienceQuestions, ("Science Question " . $i));
            array_push($this->sportsQuestions, ("Sports Question " . $i));
            array_push($this->rockQuestions, QuestionDeck::createRockQuestion($i));
        }
    }
}