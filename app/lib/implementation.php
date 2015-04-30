<?php

/**
 * This is the class that has the purpose of apply functionality 
 * for our "Game of Life" implementation
 *
 * @author Tadeo Barranco <tbrrancoa@gmail.com>
 * @package GolPHP/app
 */

require_once('base.php');

class App_Implementation extends App_Base {

	/**
	 * this functions init the container as a table of our "Game of Life"
	 * @return string html table structure 
	 */
	public function initContainer(){
		$html = "<table cellpadding='0' cellspacing='0' border='0'>". $this->createGrid() ."</table>";
		return $html;
	}

	/**
	 * this functions create the grid of our "Game of Life"
	 * @return string html tr and td tags
	 */
	public function createGrid(){
		$html = 'hahahhahah';
		return $html;
	}

	/**
	 * function to define what are the beginning of cells marks as 1
	 * @return array the grid positions with value equals to 1;
	 */
	public function theBeginning(){
		$this->beginning = array();
	}

}