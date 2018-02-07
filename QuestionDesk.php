<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 2/7/18
 * Time: 10:20 AM
 */
include_once "QuestionCategory.php";
class QuestionDeck
{

    var $popQuestions;
    var $pop;
    var $scienceQuestions;
    var $sportsQuestions;
    var $rockQuestions;

    private $popPlaces;

    private $sciencePlaces;

    private $sportsPlaces;

    private $rockPlaces;

    function  __construct()    {
        $this->popPlaces = array(0, 4, 8);
        $this->popQuestions = array();
        $this->pop = new QuestionCategory("Pop", $this->popQuestions, $this->popPlaces);
        $this->sciencePlaces = array(1, 5, 9);
        $this->scienceQuestions = array();

        $this->sportsPlaces = array(2, 6, 10);
        $this->sportsQuestions = array();

        $this->rockPlaces = array(3, 7, 11);
        $this->rockQuestions = array();
    }
    /**\
     * @param $category
     */
    public function nextQuestion ($category)
    {
        if ($category == "Pop") {
            $this->pop->next();
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
        if ($this->pop->isAt($place)) return $this->pop->getCategory();
        if (in_array($place, $this->popPlaces)) return "Pop";

        if (in_array($place, $this->sciencePlaces)) return "Science";
        if (in_array($place, $this->sportsPlaces)) return "Sports";
        if (in_array($place, $this->rockPlaces)) return "Rock";

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
            $this->pop->add("Pop Question " . $i);
            array_push($this->scienceQuestions, ("Science Question " . $i));
            array_push($this->sportsQuestions, ("Sports Question " . $i));
            array_push($this->rockQuestions, QuestionDeck::createRockQuestion($i));
        }
    }
}