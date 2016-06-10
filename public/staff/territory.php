<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php
    // bounce back if id isn't specified
    if (!isset($_GET['id'])) {Header("Location: territories.php");};
    $result = territoryForID($db, $_GET['id']);
    // bounce back if id has no matches
    if (!mysqli_num_rows($result)) {Header("Location: territories.php");};
    $territory = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $pageTitle='Staff: Territory of '.h($territory['name']);
    include('../header.php');
  ?>
  <body>
    <?php
      if (isset($_GET['state_id'])) {
        echo "<a href='state.php?id=".u($_GET['state_id'])."'>Back to State</a>";
      }
      else {
        echo "<a href='territories.php'>Back to Territories List</a>";
      }
    ?>
    <h1>Territory: <?php echo h($territory['name']);?></h1>
    <div>
      <table>
        <?php
          echo "<tr><td>Name:</td><td>".h($territory['name'])."</td></tr>";
          echo "<tr><td>State ID:</td><td>".h($territory['state_id'])."</td></tr>";
          echo "<tr><td>Position within State:</td><td>".h($territory['position'])."</td></tr>";
        ?>
      </table>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
