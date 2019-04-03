<?php

  if(isset($_POST['submit'])) {
    
    // Check Email
    if(empty($_POST['email'])) {
      echo "An email is required <br>";
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email must be a valid email address!';
      }
    }
    
    // Check Title
    if(empty($_POST['title'])) {
      echo "A title is required <br>";
    } else {
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        echo 'Title must be letters & Spaces only!';
      }
    }
    
    // Check Ingredients
    if(empty($_POST['ingredients'])) {
      echo "At least 1 Ingredient is required <br>";
    } else {
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        echo 'Ingredients must be comma separted list!';      
      }
    }
  }     // End of POST Check

?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">
      <label for="email">Your Email</label>
      <input type="text" name="email" id="email">
      <label for="title">Pizza title</label>
      <input type="text" name="title" id="title">
      <label for="ingredients">Ingredients (comma serparted):</label>
      <input type="text" name="ingredients" id="ingredients">
      <div class="center">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>

  <?php include('templates/footer.php'); ?>

</html>