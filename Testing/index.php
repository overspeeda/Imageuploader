<?php
include("server.php");
include('destroysession.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="header">
    <?php if (isset($_SESSION['message'])) : ?>
    <p>
      <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
      ?>
    </p>
    <?php endif ?>
</div>

<div class="index_header">
	<h2>Website Name</h2>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="uploadpictures.php">Upload Pictures</a>
  <a href="#">Account</a>
  <a href="index.php?logout='1'" style="color: red;">Log out</a>

</div>

<div class="row">
<?php foreach($user as $item): ?>
  <div class="column">
    
    <h2 class="h2">
      <?php echo $item['id']; ?>
    </h2>

    <p>
    <img src="<?php echo 'images/'. $item['image']; ?>" width='90' height='90'> 
    </p>

    <p class="pg">
      <?php echo $item['description']; ?>
    </p>
    
    <a href="index.php?delete=<?php echo $item['id']; ?>" class="button1">Delete</a>

  </div>
<?php endforeach; ?>
</div>


</body>

</html>
