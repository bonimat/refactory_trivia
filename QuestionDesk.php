<?php
/**
 *
 * User: matteo
 * Date: 06/02/18
 * Time: 17.08
 */

Class QuestionDeck {
    /**
     * @param $currentCategory
     */
    public static function askQuestionFor($currentCategory, $game) {
        if ($currentCategory == "Pop") {
            echoln(array_shift($game->popQuestions));
        }
        if ($currentCategory == "Science") {
            echoln(array_shift($game->scienceQuestions));
        }
        if ($currentCategory == "Sports") {
            echoln(array_shift($game->sportsQuestions));
        }
        if ($currentCategory == "Rock") {
            echoln(array_shift($game->rockQuestions));
        }
    }

    /**
     * @param $place
     * @return string
     */
    public function currentCategoryFor($place): string {
        if ($place == 0) {
            return "Pop";
        }
        if ($place == 4) {
            return "Pop";
        }
        if ($place == 8) {
            return "Pop";
        }
        if ($place == 1) {
            return "Science";
        }
        if ($place == 5) {
            return "Science";
        }
        if ($place == 9) {
            return "Science";
        }
        if ($place == 2) {
            return "Sports";
        }
        if ($place == 6) {
            return "Sports";
        }
        if ($place == 10) {
            return "Sports";
        }
        return "Rock";
    }

    public function createRockQuestion($index) {
        return "Rock Question " . $index;
    }

    public function  fillQuestions(Game $game) {
        for ($i = 0; $i < 50; $i++) {
            array_push($game->popQuestions, "Pop Question " . $i);
            array_push($game->scienceQuestions, ("Science Question " . $i));
            array_push($game->sportsQuestions, ("Sports Question " . $i));
            array_push($game->rockQuestions, QuestionDeck::createRockQuestion($i));
        }
    }

}