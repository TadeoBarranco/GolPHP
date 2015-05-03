<?php

/**
 * This is the class that has the purpose of apply functionality 
 * for our "Game of Life" implementation
 *
 * @author Tadeo Barranco <tbrrancoa@gmail.com>
 * @package GolPHP/app/lib
 */

require_once('base.php');

class App_Lib_Implementation extends App_Lib_Base {

	/**
	 * this functions init our "Game of Life" board
	 * 
	 * @return string html structure 
	 */
	public function initContainer(){
		$this->theBeginning(0,0);
		$_SESSION['beginning'] = $this->beginning;
		print $this->getPage($this->createGrid($this->beginning));
	}

	/**
	 * this functions create the grid of our "Game of Life"
	 *
	 * @param array $data the array with the column values
	 * @return string html table node
	 */
	public function createGrid($data){
		return "<table cellpadding='0' cellspacing='0' border='0'>{$this->createRowsAndColumns($data)}</table>";
	}

	/**
	 * this function generate the rows and columns of the grid
	 * 
	 * @param  array $data the array with the column values
	 * @return string html tr and td nodes
	 */
	public function createRowsAndColumns($data){
		$html = '';
		foreach ($data as $tr) {
			$html .= "<tr>";
			foreach ($tr as $td) {
				$html .= ($td) ? "<td style='background-color:black'>&nbsp;</td>" : "<td>&nbsp;</td>";
			}
			$html .= "</tr>";
		}
		return $html;
	}

	/**
	 * this function create the complete html structure of a default webpage
	 * 
	 * @param  string $grid the grid contain
	 * @return string complete html structure
	 */
	public function getPage($grid){
		return "<html>{$this->getHeadHtml()}{$this->getBodyHtml($grid)}</html>";
	}

	/**
	 * fucntion to get the head structure of our web page
	 * 	
	 * @return string head html node
	 */
	public function getHeadHtml(){
		return "<head>{$this->getTitleHtml()}{$this->getStyles()}{$this->getJs()}</head>";
	}

	/**
	 * get the title of the web page
	 * 
	 * @return string title html node
	 */
	public function getTitleHtml(){
		return "<title>GolPHP</title>";
	}

	/**
	 * function to get the styles of our grid elements
	 * 
	 * @return string style html node
	 */
	public function getStyles(){
		return "<style>
			table tr td{width: {$this->cellWidth}; height: {$this->cellHeight}; border: 1px solid #D8D8D8; -webkit-border-radius:5px; -moz-border-radius:5px 5px 5px 5px; border-radius:5px; border-collapse: separate;}
			</style>";
	}

	/**
	 * function to get the javascript functions 
	 * 		
	 * @return string script html node
	 */
	public function getJs(){
		return "
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
			<script type='text/javascript'>
				function getKaos(){
					var kaos = jQuery.ajax({
						url 	: 'http://gol.crowd.mx/?kaos=1',
						type 	: 'html',
						async	: false,
					}).responseText;
					jQuery('.container').html(kaos);
				}
				setInterval('getKaos()', 10000);
			</script>";
	}

	/**
	 * function to get the body and the container of our grid
	 * 		
	 * @param  string $grid table thml tag
	 * @return string body html node
	 */
	public function getBodyHtml($grid){
		return "<body><div class='container'>{$grid}</div></body>";
	}

	/**
	 * function to define what are the beginning of cells marks as 1
	 * 
	 * @return array the beginning positions of our "Game of Life" implementation
	 */
	public function theBeginning($row, $col){
		$this->beginning[$row][$col] = (rand(0,500) > 450) ? 1 : 0;
		return (($row+1) == $this->gridSize && ($col+1) == $this->gridSize) ? false : ((($col+1) == $this->gridSize) ? $this->theBeginning(($row+1), 0) : $this->theBeginning($row, ($col+1)));
	}

	/**
	 * function to get the kaos of our beginning state 
	 * 
	 * @return string table html node
	 */
	public function getKaos(){
		$this->getNewBeginning(0, 0, $_SESSION['beginning']);
		$_SESSION['beginning'] = $this->kaos;
		print $this->createGrid($this->kaos);
	}

	/**
	 * function to get the next state of each cell inside the beginning array
	 *
	 * @param int $row row index of the beginning array
	 * @param int $col column index of the beginning array
	 * @param  array $beginning the current array state
	 * @return array the next array called kaos
	 */
	public function getNewBeginning($row, $col, $beginning){
		$isActive 	= $beginning[$row][$col];
		$neighbours = $this->getNeighboursActiveCount($row, $col, $beginning);
		$this->kaos[$row][$col] = (!$isActive && $neighbours == 3) || ($isActive && $neighbours == 2) || ($isActive && $neighbours == 3);
		return (($row+1) == $this->gridSize && ($col+1) == $this->gridSize) ? false : ((($col+1) == $this->gridSize) ? $this->getNewBeginning(($row+1), 0, $beginning) : $this->getNewBeginning($row, ($col+1), $beginning)); 
	}

	/**
	 * function to get active neighbours count of the current cell
	 * 
	 * @param  int $row row index of the beginning array
	 * @param  int $col colum index of the beginning array
	 * @return int active neighbours count
	 */
	public function getNeighboursActiveCount($row, $col, $beginning){
		return $beginning[$row - 1][$col] + $beginning[$row - 1][$col + 1] + $beginning[$row][$col + 1] + $beginning[$row + 1][$col + 1] + $beginning[$row + 1][$col] + $beginning[$row + 1][$col - 1] + $beginning[$row][$col - 1] + $beginning[$row - 1][$col -1];
	}

}