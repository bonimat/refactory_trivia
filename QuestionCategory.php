<?php
/**
 *
 * User: matteo
 * Date: 07/02/18
 * Time: 15.07
 */

class QuestionCategory {
    private $category;
    private $questions;
    private $places;

    /**
     * QuestionCategory constructor.
     */
    public function __construct($category, $questions, $places) {

        $this->category = $category;
        $this->questions = $questions;
        $this->places = $places;
    }

    public function add($question) {
        array_push($this->questions, $question);
    }

    public function next() {
        return (array_shift($this->questions));
    }

    public function isAt($place) {
        return (in_array($place, $this->places));
    }

    public function getCategory() {
        return $this->category;
    }

}