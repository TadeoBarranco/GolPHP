<?php 

/**
 * This is the init point of the "Game of Life" application based on a php core
 * 
 * @author Tadeo Barranco <tbarrancoa@gamail.com>
 * @package GolPHP
 */

require_once('lib/implementation.php');

$game = new App_Implementation(30,30,5,5);

# Start the Session
$game->initSession();

// (isset($_GET['action']) && $_GET['action'] == 'refresh') ? refresh() : display();
(isset($_GET['action']) && $_GET['action'] == 'refresh') ? $game->getKaos() : $game->initContainer();
