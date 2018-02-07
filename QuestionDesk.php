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

    var $pop;

    var $science;

    var $sports;

    var $rock;

    private $popPlaces;

    private $sciencePlaces;

    private $sportsPlaces;

    private $rockPlaces;

    function  __construct()    {

        $this->pop = new QuestionCategory("Pop", array(0, 4, 8));

        $this->science = new QuestionCategory("Science", array(1, 5, 9));

        $this->sports = new QuestionCategory("Sports", array(2, 6, 10));

        $this->rock = new QuestionCategory("Rock", array(3, 7, 11));

    }
    /**\
     * @param $category
     */
    public function nextQuestion ($category)
    {
        if ($category == "Pop") {
            return $this->pop->next();
        }
        if ($category == "Science") {
            return $this->science->next();
        }
        if ($category == "Sports") {
            return $this->sports->next();
        }
        if ($category == "Rock") {
            return $this->rock->next();
        }
        throw new Exception("YOU MORON!");
    }

    public function CategoryAt ($place)
    {
        if ($this->pop->isAt($place)) return $this->pop->getCategory();
        if ($this->science->isAt($place)) return $this->science->getCategory();
        if ($this->sports->isAt($place)) return $this->sports->getCategory();
        if ($this->rock->isAt($place)) return $this->rock->getCategory();

        throw new Exception('Place must be inside the board');
    }

    public function createRockQuestion ($index)
    {
        return "Rock Question " . $index;
    }

    public function fillQuestions ()
    {
        for ($i = 0; $i < 50; $i++) {
            $this->pop->add("Pop Question " . $i);
            $this->science->add("Science Question " . $i);
            $this->sports->add("Sports Question " . $i);
            $this->rock->add("Rock Question " . $i);

        }
    }
}