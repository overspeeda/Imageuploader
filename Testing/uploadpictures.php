<?php
include('server.php');
include('destroysession.php');
include('errors.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload Picture</title>
</head>

    <body>

        <div class="index_header">
            <h2>Website Name</h2>
        </div>

        <div class="topnav">
            <a href="index.php">Home</a>
            <a href="uploadpictures.php">Upload Pictures</a>
            <a href="#">Account</a>
            <a href="index.php?logout='1'" style="color: red;">Log out</a>
        </div>

        <div class="header">
            <h2>Upload Pictures</h2>
        </div>

        <form action="index.php" method= "post" enctype="multipart/form-data">
        
        <div style="color: white;">	
		    <?php include('errors.php'); ?>
	    </div>

        <div class="input-group">
            <p>Description: </p>
            <div class="webflow-style-input">
                <input type="text" name="description">
            </div>
            <br><br>
        
            <input type="file" name="image">
            <br><br>
            
            <div class="movement"> 
                <button type="submit" class="button1" name="upload">Upload</button>
            </div>
        <div>

        </form>

    </body>

</html>