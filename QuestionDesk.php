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
    /**\
     * @param $category
     */
    public function nextQuestion ($category)
    {
        if ($category == "Pop") {
            return(array_shift($this->popQuestions));
        }
        if ($category == "Science") {
            return(array_shift($this->scienceQuestions));
        }
        if ($category == "Sports") {
            return(array_shift($this->sportsQuestions));
        }
        if ($category == "Rock") {
            return(array_shift($this->rockQuestions));
        }
        throw new Exception("YOU MORON!");
    }

    public function CategoryAt ($place)
    {
        if (in_array($place, array(0,4,8))) return "Pop";
        if (in_array($place, array(1,5,9))) return "Science";
        if (in_array($place, array(2,6,10))) return "Sports";
        if (in_array($place, array(3,7,11))) return "Rock";

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