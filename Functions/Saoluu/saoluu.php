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
	echo '<head>'.PHP_EOL;
	echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>';
	echo '<script type="text/javascript" src="progressbar.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="progressbar.css">';
	echo '<link rel="stylesheet" type="text/css" href="skins/tiny-green/progressbar.css">';
	echo '</head>'.PHP_EOL;
	echo '<meta charset="UTF-8">'.PHP_EOL;
	
	
	# Interface
	echo 'BACKUP SYSTEM<br>'.PHP_EOL;
	echo '<form action="saoluu.php" method="post">'.PHP_EOL;
	echo '<table>'.PHP_EOL.'<tr>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckFile" value="Backup files">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '<td>'.PHP_EOL;
	echo '<input type="submit" name="bckData" value="Backup database">'.PHP_EOL;
	echo '</td>'.PHP_EOL;
	echo '</tr>'.PHP_EOL;
	echo '<tr>'.PHP_EOL;
	
	# Process submittion
	if(isset($_POST['bckFile'])){
		echo '<div id="progressBar" class="tiny-green"><div></div></div>';
		echo '<script>';
		echo 'progressBar(0, $("#progressBar"));';
		echo '</script>';
		backup_file();
	} else if(isset($_POST['bckData'])){
		
	}
	
	echo '</tr>'.PHP_EOL.'</table>';
	echo '</form>';
	echo '</html>';
	
	# Function: Create Zip
	function create_zip($files = array(),$destination = '',$overwrite = false) {
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) { return false; }
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			//add the files
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);
		}
		else
		{
			return false;
		}
	}
	
	function listFolderFiles($dir,$out,$count){
		$ffs = scandir($dir);
		foreach($ffs as $ff){
			if($ff != '.' && $ff != '..'){
				$out[] = $ff;
				if($count<=80) {
					echo '<script>';
					echo 'progressBar('.$count.', $("#progressBar"));';
					echo '</script>';
			   }
				if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff,$out,$count);
			}
		}
	}
	
	# Function: List all files
	function backup_file(){
		$count = 0;
		$dir    = dirname(dirname(dirname(__FILE__)));
		$out = array();
		listFolderFiles($dir,$out,$count)
		
		
		if(create_zip($out,'/var/www/html/backup'.time().'.zip') == true){
			echo '<script>';
			echo 'progressBar(100, $("#progressBar"));';
			echo '</script>';
		}
	}
?>