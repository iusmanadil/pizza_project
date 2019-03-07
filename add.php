<?php


?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php') ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="" method="">
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

  <?php include('templates/footer.php') ?>

</html>