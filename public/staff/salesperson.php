<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php
    // bounce back if id isn't specified
    if (!isset($_GET['id'])) {Header("Location: salespeople.php");};
    $result = salespersonForID($db, $_GET['id']);
    // bounce back if id has no matches
    if (!mysqli_num_rows($result)) {Header("Location: salespeople.php");};
    $salesperson = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $fullName = $salesperson['first_name']." ".$salesperson['last_name'];
    $pageTitle="Staff: ".h($fullName);
    include('../header.php');
  ?>
  <body>
    <a href='salespeople.php'>Back to Salespeople List</a>
    <h1>Salesperson: <?php echo h($fullName);?></h1>
    <div>
      <table>
        <?php
          echo "<tr><td>First Name:</td><td>".h($salesperson['first_name'])."</td></tr>";
          echo "<tr><td>Last Name:</td><td>".h($salesperson['last_name'])."</td></tr>";
          echo "<tr><td>Phone Number:</td><td>".h($salesperson['phone'])."</td></tr>";
          echo "<tr><td>Email Address:</td><td>".h($salesperson['email'])."</td></tr>";
        ?>
      </table>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
