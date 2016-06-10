<?php
  require_once("../private/initialize.php");
?>
<!doctype html>

<html lang="en">
  <?php $pageTitle='Territories';
    include('header.php');
  ?>
  <body>
    <h1>Territories</h1>
    <?php
      $countriesResult = countriesResult($db);
      while ($country = mysqli_fetch_assoc($countriesResult)) {
        echo "<div>";
        echo "<h3>".h($country['name'])."</h3>";
        $statesResult = statesResultForCountry($db, $country['id']);
        echo "<ul>";
        while ($state = mysqli_fetch_assoc($statesResult)) {
          //Output state name
          echo "<li>".h(sprintf('%s (%s)', $state['name'], $state['code']))."</li>";
          //Output associated territories
          echo "<ul>";
          $territoriesResult = territoriesForState($db, $state["id"]);
          while ($territory = mysqli_fetch_assoc($territoriesResult)) {
            //Only output territory name if it does not match state name
            if ($territory['name'] != $state['name']) {
              echo "<li>".h($territory['name'])."</li>";
            }
            $salespplResult = salespeopleForTerritory($db, $territory["id"]);
            while ($salesperson = mysqli_fetch_assoc($salespplResult)) {
              echo "<a href=\"salesperson.php?id=".u($salesperson["id"])."\">"
                  .h($salesperson["first_name"]." ".$salesperson["last_name"])
                  ."</a>";
            }
            mysqli_free_result($salespplResult);
          }
          echo "</ul>";
          mysqli_free_result($territoriesResult);
        }
        echo "</ul>";
        echo "</div>";
        echo "<br>";
        mysqli_free_result($statesResult);
      }
      mysqli_free_result($countriesResult);
    ?>
  </body>
  <?php include('footer.php'); ?>
</html>
