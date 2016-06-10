<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Staff: Territories';
    include('../header.php');
  ?>
  <body>
    <a href='menu.php'>Back to Menu</a>
    <h1>Territories</h1>
    <div>
      <table>
        <tr>
          <th>Name</th>
          <th>State ID</th>
          <th>Position within State</th>
        </tr>
        <?php
          $territoriesResult = territoriesResult($db);
          while ($territory = mysqli_fetch_assoc($territoriesResult)) {
            echo "<tr>";
            echo "<td>".h($territory['name'])."</td>";
            echo "<td>".h($territory['state_id'])."</td>";
            echo "<td>".h($territory['position'])."</td>";
            echo "<td><a href=territory.php?id=".u($territory['id']).">View</a></td>";
            echo "</tr>";
          }
          mysqli_free_result($territoriesResult);
        ?>
      </table>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
