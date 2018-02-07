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
     */
    public function testPopCategory($place,$category) {
        $questionDeck = new QuestionDeck();
        $this->assertEquals($category, $questionDeck->currentCategoryFor($place));
        }

    static function placeECategory() {
        return array(
                array(0,'Pop'),
                array(4,'Pop'),
                array(8,'Pop')
        );
    }
}
