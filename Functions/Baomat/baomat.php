 <!-- 
 * AgriExtension
 * File: 	baomat.php
 * Written: Nguyen Ngoc Duy
 * Date: Oct 19 2015
 -->

<?php
	# Set html envirolment
	echo "<!DOCTYPE html>".PHP_EOL;
	echo "<html>".PHP_EOL;
	echo '<meta charset="UTF-8">'.PHP_EOL;
	
	# Variables
	$filteredArray = array();

	# Get files of root directory
	$dir    = dirname(dirname(dirname(__FILE__)));
	foreach (glob($dir."/*.*") as $filename)
		$filteredArray[] = $filename;
	
	# Process [POST] data
	/*
	 * Run these commands below before this code can run
	 * sudo chown -R www-data:www-data /home/duyltv/Web/CNPM/
	 * sudo adduser $USER www-data
	 */
	if(isset($_POST['FileNum'])){
		$filenum = $_POST['FileNum'].'<br>';
		for ($x = 0; $x < $filenum; $x++) {
			$output = shell_exec('chmod -R '.$_POST['chm'][$x].' '.$filteredArray[$x]);
		}
	}
	
	# Print table form
	echo '<form action="baomat.php" method="post">'.PHP_EOL;
	echo "<table>".PHP_EOL;
	echo '<input type="hidden" name="FileNum" value="'.count($filteredArray).'">';
	echo "<tr>".PHP_EOL;
	echo "<td>";
	echo "<b>File name</b>";
	echo "</td>".PHP_EOL;
	echo "<td>";
	echo "<b>Chmod code</b>";
	echo "</td>".PHP_EOL;
	echo "</tr>".PHP_EOL;
	
	# Println all data
	for ($x = 0; $x < count($filteredArray); $x++) {
		echo "<tr>".PHP_EOL;
		echo "<td>";
		print_r(basename($filteredArray[$x]));
		echo "</td>".PHP_EOL;
		echo "<td>";
		echo '<input type="text" name="chm[]" value="'.substr(sprintf('%o', fileperms($filteredArray[$x])), -4).'" />';
		echo "</td>".PHP_EOL;
		echo "</tr>".PHP_EOL;
	}
	
	# Print end table
	echo "</table>".PHP_EOL;
	echo '<input type="submit" value="Update" /><br>'.PHP_EOL;
	echo '</form>'.PHP_EOL;
	if(isset($_POST['FileNum'])) echo '<font size="3" color="red"><b>Permissions changed!</b></font><br>';
	
	# End html
	echo "</html>";
?>