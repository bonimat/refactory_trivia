<?php
/**
 *
 * il passaggio successivo sarebbe quello di passare dalla logica di tanti if per ogni category ad
 * una struttura ad array che potrebbe anche essere passata da game e precevedere di cambiare in
 * maniera semplice e flessibile le categorie in gioco.
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
        if ($category == $this->pop->getCategory()) {
            return $this->pop->next();
        }
        if ($category == $this->science->getCategory()) {
            return $this->science->next();
        }
        if ($category == $this->sports->getCategory()) {
            return $this->sports->next();
        }
        if ($category == $this->rock->getCategory()) {
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
            $this->pop->add($this->pop->getCategory()." Question " . $i);
            $this->science->add($this->science->getCategory()." Question " . $i);
            $this->sports->add($this->sports->getCategory()." Question " . $i);
            $this->rock->add($this->rock->getCategory()." Question " . $i);

        }
    }
}