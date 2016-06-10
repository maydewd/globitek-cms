<?php
  require_once("../../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Staff: Salespeople';
    include('../header.php');
  ?>
  <body>
    <a href='menu.php'>Back to Menu</a>
    <h1>Salespeople</h1>
      <div>
        <table>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Email</th>
        </tr>
        <?php
          $salespeopleResult = salespeopleResult($db);
          while ($salesperson = mysqli_fetch_assoc($salespeopleResult)) {
            echo "<tr>";
            echo "<td>".h($salesperson['first_name'])."</td>";
            echo "<td>".h($salesperson['last_name'])."</td>";
            echo "<td>".h($salesperson['phone'])."</td>";
            echo "<td>".h($salesperson['email'])."</td>";
            echo "<td><a href=salesperson.php?id=".u($salesperson['id']).">View</a></td>";
            echo "</tr>";
          }
          mysqli_free_result($salespeopleResult);
        ?>
      </table>
    </div>
  </body>
  <?php include('../footer.php'); ?>
</html>
