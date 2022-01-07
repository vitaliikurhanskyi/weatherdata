<?php

require_once('database.php');

$result = $db->query("SELECT * FROM `weather`");

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Results</title>
  </head>
  <body>
    <h1>Results</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Request Time</th>
      <th scope="col">City</th>
      <th scope="col">Temperature</th>
      <th scope="col">Clouds</th>
      <th scope="col">Wind</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $key => $array) : ?>
              
        <tr>
            <td><?php echo $array['datetime']; ?></td>
            <td><?php echo $array['city']; ?></td>
            <td><?php echo $array['temperature']; ?></td>
            <td><?php echo $array['clouds']; ?></td>
            <td><?php echo $array['wind']; ?></td>
        </tr>

    <?php endforeach; ?>
  </tbody>
</table>

<div>
<a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back To The Pleshny Wheather</a>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>