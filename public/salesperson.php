<?php
  require_once("../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Salesperson Info';
    include('header.php');
  ?>
  <body>
    <a href='territories.php'>Back to Territories</a>
    <h1>Salesperson</h1>
    <div>
    <?php
    // bounce back if id isn't specified
    if (!isset($_GET['id'])){Header("Location: territories.php");};
    $result = salespersonForID($db, $_GET['id']);
    // bounce back if id has no matches
    if (!mysqli_num_rows($result)) {Header("Location: territories.php");}
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<span>".h($row['first_name']. " " . $row['last_name'])."</span>";
      echo "<span>".h($row['phone'])."</span>";
      echo "<span>".h($row['email'])."</span>";
    }
    mysqli_free_result($result);
    ?>
    <h2>Territories</h2>
    <?php
    $result = territoriesForSalespeople($db, $_GET['id']);
    echo "<ul>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<li>".h($row['name'])."</li>";
    }
    echo "</ul>";
    mysqli_free_result($result);
    ?>
    </div>
  </body>
  <?php include('footer.php'); ?>
</html>
