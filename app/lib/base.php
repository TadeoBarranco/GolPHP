<?php 

/**
 * This is a base class with the deafult methods to be implemated 
 * to make possible the "Game of Life" view
 *
 * @author Tadeo Barranco <tbarrancoa@gmail.com>
 * @package GolPHP/app/lib
 */

class App_Lib_Base {

	public $cellWidth;
	public $cellHeight;
	public $gridWidth;
	public $gridHeight;
	public $gridSize;
	public $beginning = array();
	public $kaos = array();

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
	}

	/**
	 * just a function to start with the session 
	 * 
	 * @return array $_SESSION 
	 */
	public function initSession(){
		session_start();
	}

	/**
	 * this functions init our "Game of Life" board
	 * 
	 * @return string html structure 
	 */
	public function initContainer(){
		$html = '';
		return $html;
	}

	/**
	 * function to define what are the beginning of cells marks as 1
	 * 
	 * @return array the beginning positions of our "Game of Life" implementation
	 */
	public function theBeginning(){
		for ($x = 0; $x < $this->gridSize; $x++) {
			for ($y = 0; $y < $this->gridSize; $y++) {
				$this->beginning[$x][$y] = (rand(0,500) > 450)? 1 : 0;
			}
		}
	}

	/**
	 * function to get the next state of each cell inside the beginning array
	 * 
	 * @param  array $beginning the current array state
	 * @return array the next array called kaos
	 */
	public function getNewBeginning($beginning){
		for ($row = 0; $row < $this->gridSize; $row++) {
			for ($col = 0; $col < $this->gridSize; $col++) {
				$isActive 	= $beginning[$row][$col];
				
				$neighbours = $beginning[$row - 1][$col]
							+ $beginning[$row - 1][$col + 1]
							+ $beginning[$row][$col + 1]
							+ $beginning[$row + 1][$col + 1]
							+ $beginning[$row + 1][$col]
							+ $beginning[$row + 1][$col - 1]
							+ $beginning[$row][$col - 1]
							+ $beginning[$row - 1][$col -1];

				if(!$isActive && $neighbours == 3){
					$this->kaos[$row][$col] = 1;
				} else if($isActive && $neighbours == 2){
					$this->kaos[$row][$col] = 1;
				} else if($isActive && $neighbours == 3){
					$this->kaos[$row][$col] = 1;
				} else{
					$this->kaos[$row][$col] = 0;
				}
			}
		}
	}

}