<?php

  // Connect to DB
  $conn = mysqli_connect('localhost', 'usman', 'computer123', 'ninja_pizza');

  // Check Connection
  if(!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error();
  }

