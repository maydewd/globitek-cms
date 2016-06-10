<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Staff: Menu';
    include('../header.php');
  ?>
  <body>
    <h1>Menu</h1>
    <div>
      <ul>
        <li><a href='states.php'>States</a></li>
        <li><a href='territories.php'>Territories</a></li>
        <li><a href='salespeople.php'>Salespeople</a></li>
      </ul>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
