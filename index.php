<!-- 
 * AgriExtension
 * File: 	index.php
 * Written: Nguyen Ngoc Duy
 * Date: Sep 18 2015
 -->
<?php  
 echo '<html>';
 
 echo '<head>';
 echo '<title>AgriExtension</title>';

 include(config.php);
 include(RootPath.'/Template/header.php');

 echo '</head>';
 echo '<body>';
 echo '<center><h2>AgriExtension</h2><br /><br />This system is not working now. Please come back later</center>';
 include('login.php');
 echo '</body>';
 echo '<footer>';
 include(RootPath.'/Template/footer.php');
 echo '</footer>';
 
 echo '</html>';