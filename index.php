<?php

// DB Connection
include('config/db_connect.php');

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

  // explode(',', $pizzas[0]['ingredients']);


?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php') ?>

  <h4 class="center grey-text">Pizzas!</h4>

  <div class="container">
    <div class="row">
    
      <?php foreach($pizzas as $pizza) : ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?= htmlspecialchars($pizza['title']); ?></h6>
              <ul>
                <?php foreach(explode(',', $pizza['ingredients']) as $ing) : ?>
                  <li><?= htmlspecialchars($ing) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="#" class="brand-text">More Info</a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    
    </div>
  </div>

  <?php include('templates/footer.php') ?>

</html>