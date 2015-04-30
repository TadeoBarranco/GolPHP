<?php

/**
 * This is the class that has the purpose of apply functionality 
 * for our "Game of Life" implementation
 *
 * @author Tadeo Barranco <tbrrancoa@gmail.com>
 * @package GolPHP/app/lib
 */

require_once('base.php');

class App_Implementation extends App_Base {

	/**
	 * just a function to start with the session 
	 * @return bool 
	 */
	public function initSession(){
		session_start();
		return true;
	}

	/**
	 * this functions init the container as a table of our "Game of Life"
	 * 
	 * @return string html table structure 
	 */
	public function initContainer(){
		$this->theBeginning();
		$_SESSION['beginning'] = $this->beginning;
		$this->grid = $this->createGrid($this->beginning);
		print $this->getPage($this->grid);
	}

	/**
	 * this functions create the grid of our "Game of Life"
	 *
	 * @param array $data the array with the column values
	 * @return string html table tag
	 */
	public function createGrid($data){
		return "<table cellpadding='0' cellspacing='0' border='0'>{$this->createRowsAndColumns($data)}</table>";
	}

	/**
	 * this function generate the rows and columns of the grid
	 * 
	 * @param  array $data the array with the column values
	 * @return string html tr and td tags
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
		return "<style></style>";
	}

	/**
	 * function to get the javascript functions 
	 * 		
	 * @return string script html node
	 */
	public function getJs(){
		return "<script type='text/javascript'></script>";
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
	 * @return array the beginning positions of our "Game of Life" implementation
	 */
	public function theBeginning(){
		for ($x = 0; $x < $this->gridSize; $x++) {
			for ($y = 0; $y < $this->gridSize; $y++) {
				$this->beginning[$x][$y] = (rand(0,500) > 450)? 1 : 0;
			}
		}
	}

	public function getKaos(){
		$this->kaos = $_SESSION['beginning'];
	}

}