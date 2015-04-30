<?php 

/**
 * This is the init point of the "Game of Life" application based on a php core
 * 
 * @author Tadeo Barranco <tbarrancoa@gamail.com>
 * @package GolPHP
 */

require_once('lib/implementation.php');

$game = new App_Implementation(30,30,10,10);

?>
<html>
<head>
	<title>GolPHP</title>
</head>
<body>
	<div class="container">
		<?php echo $game->initContainer(); ?>
	</div>
</body>
</html>