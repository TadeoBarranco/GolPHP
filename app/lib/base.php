<?php 

/**
 * This is a base class with the deafult methods to be implemated 
 * to make possible the "Game of Life" view
 *
 * @author Tadeo Barranco <tbarrancoa@gmail.com>
 * @package GolPHP/app/
 */

class App_Base {

	public $cellWidth;
	public $cellHeight;
	public $gridWidth;
	public $gridHeight;
	public $gridSize;
	public $beginning;

	/**
	 * this function define the grid container dimensions of our "Game of Life"
	 * @param int $cellWidth  width of cell in pixels
	 * @param int $cellHeight height of cell in pixels
	 * @param int $gridWidth  width of the grid container in pixels
	 * @param int $gridHeight height of the grid container in pixels
	 */
	public function __construct($cellWidth, $cellHeight, $gridWidth, $gridHeight){
		$this->cellWidth  	= $cellWidth;
		$this->cellHeight 	= $cellHeight;
		$this->gridWidth  	= $gridWidth;
		$this->gridHeight 	= $gridHeight;
		$this->gridSize   	= $gridWidth * $gridHeight;
		
		echo $this->cellWidth .' '. $this->cellHeight .' '. $this->gridWidth .' '. $this->gridHeight .' '. $this->gridSize;
	}

	/**
	 * this functions init the container as a table of our "Game of Life"
	 * @return string html table structure 
	 */
	public function initContainer(){
		$html = '';
		return $html;
	}

	/**
	 * this functions create the grid of our "Game of Life"
	 * @return string html tr and td tags
	 */
	public function createGrid(){
		$html = '';
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