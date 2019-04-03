<?php

  // Connect to DB
  $conn = mysqli_connect('localhost', 'usman', 'computer123', 'ninja_pizza');

  // Check Connection
  if(!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error();
  }

  // Write query for All Pizzas
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

  // make query & get result
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free result from Memory
  mysqli_free_result($result);

  // Close Connection
  mysqli_close($conn);

  print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php') ?>

  <h4 class="center grey-text">Pizzas!</h4>

  <div class="container">
    <div class="row">
    
      <?php foreach($pizzas as $pizza) { ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
            </div>
          </div>
        </div>

      <?php } ?>
    
    </div>
  </div>

  <?php include('templates/footer.php') ?>

</html>