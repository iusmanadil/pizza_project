<?php

$errors = array('email' => '', 'title' => '', 'ingredients' => '');
$email = $title = $ingredients = '';

  if(isset($_POST['submit'])) {
    
    // Check Email
    if(empty($_POST['email'])) {
      $errors['email'] = "An email is required <br>";
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email must be a valid email address!';
      }
    }
    
    // Check Title
    if(empty($_POST['title'])) {
      $errors['title'] = "A title is required <br>";
    } else {
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must be letters & Spaces only!';
      }
    }
    
    // Check Ingredients
    if(empty($_POST['ingredients'])) {
      $errors ['ingredients'] = "At least 1 Ingredient is required <br>";
    } else {
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors ['ingredients'] = 'Ingredients must be comma separted list!';      
      }
    }

    if(!array_filter($errors)) {
      header('Location: index.php');
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
      <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
      <div class="red-text"><?= $errors['email']; ?></div>

      <label for="title">Pizza title</label>
      <input type="text" name="title" id="title" value="<?= htmlspecialchars($title) ?>">
      <div class="red-text"><?= $errors['title']; ?></div>

      <label for="ingredients">Ingredients (comma serparted):</label>
      <input type="text" name="ingredients" id="ingredients" value="<?= htmlspecialchars($ingredients) ?>">
      <div class="red-text"><?= $errors['ingredients']; ?></div>

      <div class="center">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
      </div>
    </form>

  </section>

  <?php include('templates/footer.php'); ?>

</html>