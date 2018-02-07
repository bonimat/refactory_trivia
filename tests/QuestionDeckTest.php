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


    public function testPopCategory() {
        $questionDeck = new QuestionDeck();
        $this->assertEquals('Pop', $questionDeck->currentCategoryFor(0));
        $this->assertEquals('Pop', $questionDeck->currentCategoryFor(4));
        $this->assertEquals('Pop', $questionDeck->currentCategoryFor(8));
    }

    function
}
