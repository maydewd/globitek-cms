<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Staff: States';
    include('../header.php');
  ?>
  <body>
    <a href='menu.php'>Back to Menu</a>
    <h1>States</h1>
    <div>
      <table>
        <tr>
          <th>Name</th>
          <th>Code</th>
          <th>Country ID</th>
        </tr>
        <?php
          $statesResult = statesResult($db);
          while ($state = mysqli_fetch_assoc($statesResult)) {
            echo "<tr>";
            echo "<td>".h($state['name'])."</td>";
            echo "<td>".h($state['code'])."</td>";
            echo "<td>".h($state['country_id'])."</td>";
            echo "<td><a href=state.php?id=".u($state['id']).">View</a></td>";
            echo "</tr>";
          }
          mysqli_free_result($statesResult);
        ?>
      </table>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
