<?php

  // DB Connection
  include('config/db_connect.php');

  // Check GET request id parameter
  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make Sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // Get the query result
    $result = mysqli_query($conn, $sql);

    // Fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

  }

?>

<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <div class="container center">

    <?php if($pizza) : ?>

      <h4><?= htmlspecialchars($pizza['title']); ?></h4>
      <p>Created by: <?= htmlspecialchars($pizza['email']); ?></p>
      <p><?= date($pizza['created_at']); ?></p>
      <h5>Ingredients:</h5>
      <p><?= htmlspecialchars($pizza['ingredients']); ?></p>

    <?php else : ?>

      <h5>No such Pizza Exists!</h5>

    <?php endif; ?>

  </div>
  
  <?php include('templates/footer.php'); ?>

</html>
