<?php
require_once("config.php");
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['user'])) {
 	header('Location:login.php');
 }
include('template/top.php');
include('template/navigasi.php');

 
?>

<div id="main">
	<div class="content">
		<?php
        $dir_path = "denah2/";
        $extensions_array = array('jpg','png','jpeg');

        if(is_dir($dir_path))
        {
        $files = scandir($dir_path);
    
        for($i = 0; $i < count($files); $i++)
        {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<img src='$dir_path$files[$i]' style='width:800px;height:500px;'><br>";
            }
        }
        }
        }
        ?>

	</div>
	</div> 

<?php include('template/footer.php'); ?>