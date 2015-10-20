 <!-- 
 * AgriExtension
 * File: 	saoluu.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 20 2015
 -->

<?php
	# Set html envirolment
	echo "<!DOCTYPE html>".PHP_EOL;
	echo "<html>".PHP_EOL;
	echo '<meta charset="UTF-8">'.PHP_EOL;
	
	echo 'BACKUP SYSTEM<br>'.PHP_EOL;
	echo '<form action="saoluu.php" method="post">'.PHP_EOL;
	echo '<table>'.PHP_EOL.'<tr>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckFile" value="Backup files">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckData" value="Backup database">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '</tr>'.PHP_EOL.'</table>';
	echo '</form>';
	
	echo '</html>';
?>