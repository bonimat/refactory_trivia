<?php
/**
 *
 * User: matteo
 * Date: 07/02/18
 * Time: 17.22
 */

class Display {

    /**
     * Display constructor.
     */

    public function showPlayerLocation($player,$place) {
        echoln($player
                . "'s new location is "
                . $place);
    }

    public function showCategory($category) {
        echoln("The category is " . $category);
    }

}