<?php 

/**
 * This is the init point of the "Game of Life" application based on a php core
 * 
 * @author Tadeo Barranco <tbarrancoa@gamail.com>
 * @package GolPHP
 */

require_once('lib/implementation.php');

/**
 * create an instance of App_Lib_Implementation class
 *
 * @param string cell width in pixels
 * @param string cell height in pixels
 * @param int grid width
 * @param int grid height
 * @var App_Lib_Implementation
 */
$game = new App_Lib_Implementation('30px','30px',3,3);

// Start session
$game->initSession();

// Looking for a 
(isset($_GET['kaos']) && $_GET['kaos'] == 1) ? $game->getKaos() : $game->initContainer();
