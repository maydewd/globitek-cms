<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php
    // bounce back if id isn't specified
    if (!isset($_GET['id'])) {Header("Location: states.php");};
    $result = stateForID($db, $_GET['id']);
    // bounce back if id has no matches
    if (!mysqli_num_rows($result)) {Header("Location: states.php");};
    $state = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $pageTitle='Staff: State of '.h($state['name']);
    include('../header.php');
  ?>
  <body>
    <a href='states.php'>Back to States List</a>
    <h1>State: <?php echo h($state['name']);?></h1>
    <div>
      <table>
        <?php
          echo "<tr><td>Name:</td><td>".h($state['name'])."</td></tr>";
          echo "<tr><td>Code:</td><td>".h($state['code'])."</td></tr>";
          echo "<tr><td>Country ID:</td><td>".h($state['country_id'])."</td></tr>";
        ?>
      </table>
      <?php
        echo "<h3>Territories for State:</h3>";
        echo "<ul>";
        $result = territoriesForState($db, $_GET['id']);
        while ($territory = mysqli_fetch_assoc($result)) {
          echo "<li><a href='territory.php?id=".u($territory['id'])."&state_id=".u($_GET['id'])."'>". h($territory['name']). "</a></li>";
        }
        echo "</ul>";
        mysqli_free_result($result);
      ?>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
