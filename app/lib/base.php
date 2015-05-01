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
		$rule1 = 2;
		$rule2 = 3;
		
		// Cycle through cells (i = row | j = column)
		for ($i=0; $i < $this->gridSize; $i++) {
			for ($j = 0; $j < $this->gridSize; $j++) {
				// Looking for active neighbours
				$neighbours	= $beginning[$j - 1][$i + 0]
							+ $beginning[$j + 1][$i + 0]
							+ $beginning[$j + 0][$i - 1]
							+ $beginning[$j + 0][$i + 1]
							+ $beginning[$j - 1][$i - 1]
							+ $beginning[$j - 1][$i + 1]
							+ $beginning[$j + 1][$i - 1]
							+ $beginning[$j + 1][$i + 1];
				
				// What is the nex status of the current cell
				if ($neighbours == $rule1 || $neighbours == $rule2) {
					$this->kaos[$j][$i] = 1;
				} else {
					$this->kaos[$j][$i] = 0;
				}
			}
		}
	}

}