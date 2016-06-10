<?php

/**
* encode special html characters
*/
function h($string="") {
  return htmlspecialchars($string);
}

/**
* encode url characters
*/
function u($string="") {
  return urlencode($string);
}

/**
* get sql result of all countries ordered by name
*/
function countriesResult($db) {
  $countriesQuery = "SELECT * FROM countries ORDER BY name";
  return mysqli_query($db, $countriesQuery);
}

/**
* get prepared sql result of all states for a given country ID ordered by name
*/
function statesResultForCountry($db, $countryID) {
  $statesQuery = "SELECT * FROM states WHERE country_id=? ORDER BY name";
  return prepareAndExecute($db, $statesQuery, "i", $countryID);
}

/**
* get prepared sql result of all territories for a given state ID ordered by position, name
*/
function territoriesForState($db, $state_id) {
  $territoriesQuery = "SELECT * FROM territories
      WHERE state_id=? ORDER BY position, name";
  return prepareAndExecute($db, $territoriesQuery, "i", $state_id);
}

/**
* get prepared sql result of all salespeople for a given territory ID ordered by last name, first name
*/
function salespeopleForTerritory($db, $territory_id) {
  $salespplQuery = "SELECT A.* FROM salespeople A
    LEFT JOIN salespeople_territories B ON A.id = B.salespeople_ids
    WHERE B.territory_id =? ORDER BY last_name, first_name";
  return prepareAndExecute($db, $salespplQuery, "i", $territory_id);
}

/**
* get prepared sql result of the 1 salesperson for a given ID
*/
function salespersonForID($db, $id) {
  $query = "SELECT * FROM salespeople WHERE id=? LIMIT 1";
  return prepareAndExecute($db, $query, "i", $id);
}

/**
* get prepared sql result of all territories for a given salesperson ID
*/
function territoriesForSalespeople($db, $salespeople_id) {
  $query = "SELECT A.* FROM territories A
    LEFT JOIN salespeople_territories B ON A.id = B.territory_id
    WHERE B.salespeople_ids=?";
  return prepareAndExecute($db, $query, "i", $salespeople_id);
}

/**
* get sql result of all states ordered by name
*/
function statesResult($db) {
  $statesQuery = "SELECT * FROM states ORDER BY name";
  return mysqli_query($db, $statesQuery);
}

/**
* get prepared sql result of the 1 state for a given ID
*/
function stateForID($db, $id) {
  $statesQuery = "SELECT * FROM states WHERE id=? LIMIT 1";
  return prepareAndExecute($db, $statesQuery, "i", $id);
}

/**
* get sql result of all territories ordered by state ID, position
*/
function territoriesResult($db) {
  $territoriesQuery = "SELECT * FROM territories ORDER BY state_id, position";
  return mysqli_query($db, $territoriesQuery);
}

/**
* get prepared sql result of the 1 territory for a given ID
*/
function territoryForID($db, $id) {
  $territoriesQuery = "SELECT * FROM territories
      WHERE id=? LIMIT 1";
  return prepareAndExecute($db, $territoriesQuery, "i", $id);
}

/**
* get sql result of all salespeople ordered by id
*/
function salespeopleResult($db) {
  $territoriesQuery = "SELECT * FROM salespeople ORDER BY id";
  return mysqli_query($db, $territoriesQuery);
}

/**
* get sql result of a given query after preparing it with the given parameters
*/
function prepareAndExecute($db, $query, $types, &$var1, &...$vars) {
  $stmt = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($stmt, $types, $var1, ...$vars);

  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  return $result;
}
?>
