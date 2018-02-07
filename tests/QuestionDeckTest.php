<?php
/**
 *
 * User: matteo
 * Date: 07/02/18
 * Time: 11.43
 */

use PHPUnit\Framework\TestCase;

include_once __DIR__.'/../QuestionDesk.php';

class QuestionDeckTest extends TestCase {

    /**
     * @dataProvider placeECategory
     * @param $place
     * @param $category
     */
    public function testCategoryByPlaces($place,$category) {
        $questionDeck = new QuestionDeck();
        $this->assertEquals($category, $questionDeck->CategoryAt($place));
        }

    static function placeECategory() {
        return array(
                array(0,'Pop'),
                array(4,'Pop'),
                array(8,'Pop'),
                array(1,'Science'),
                array(5,'Science'),
                array(9,'Science'),
                array(2,'Sports'),
                array(6,'Sports'),
                array(10,'Sports'),
                array(3,'Rock'),
                array(7,'Rock'),
                array(11,'Rock'),

        );
    }

    function testCategoryOutOfBoardPlace(){
        $questionDeck = new QuestionDeck();

        $error = null;
        try {
            $questionDeck->CategoryAt(-1);
        }catch (Exception $ex){
            $error = $ex;
        }

        $this->assertNotNull($error);
    }

    /**
     * @dataProvider pippo
     * @param $category
     */
    function testAskFirstQuestionForPop($category) {
        $questionDeck = new QuestionDeck();
        $questionDeck->fillQuestions();

        $this->assertEquals($category.' Question 0', $questionDeck->nextQuestion($category));

    }

    static function pippo (){
        return array(
                array('Pop'),
                array('Science'),
                array('Sports'),
                array('Rock')
        );

    }

    function questionForUnknownCategory() {
        $questionDeck = new QuestionDeck();

        $questionDeck->fillQuestions();
        $error = null;
        try {
            $questionDeck->nextQuestion("UNKNOWN");
        }catch (Exception $ex){
            $error = $ex;
        }

        $this->assertNotNull($error);
    }

    function manyQuestionForSameCategory(){
        $questionDeck = new QuestionDeck();
        $questionDeck->fillQuestions();

        $this->assertEquals("Pop Question 0", $questionDeck->nextQuestion("Pop"));
        $this->assertEquals("Pop Question 1", $questionDeck->nextQuestion("Pop"));
        $this->assertEquals("Pop Question 2", $questionDeck->nextQuestion("Pop"));
        $this->assertEquals("Pop Question 3", $questionDeck->nextQuestion("Pop"));
    }
}
