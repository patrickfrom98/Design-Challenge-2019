<?php
// print_r($_GET);
  if (empty($_GET)) {
?>
<!-- <form action="sensor_process.php" method="get" id="sensorSubmit">
  <input type="file" id="json" name="json">
  <input type="submit" id="submit" name="submit" value="submit">
</form> -->

<?php
  } else {
    // $jsonRaw = $_GET["json"];
    // $jsonRaw = '{
    //   "truss_id":"1",
    //   "sensor_id":"1",
    //   "state_type_id":"1",
    //   "timestamp":"2019-02-21 09:28:00",
    //   "location":"Warehouse 1"
    // }';
    // $jsonArray = explode(',', $jsonRaw);
    // $cleanArray = [];
    // foreach ($jsonArray as $jsonValue) {
    //   $charArray = str_split($jsonValue);
    //   $filteredArray = array_filter($charArray, function($char){
    //     if (in_array($char, ['{', '}', ',' ,'"', "'"])) {
    //       return false;
    //     }
    //     return true;
    //   });
    //   if (!empty($filteredArray)) {
    //     array_push($cleanArray, implode($filteredArray));
    //   }
    // }
    //
    // $truss_id = substr($cleanArray[0], (strpos($cleanArray[0], ':') + 1));
    // $sensor_id = substr($cleanArray[1], (strpos($cleanArray[1], ':') + 1));
    // $state_type_id = substr($cleanArray[2], (strpos($cleanArray[2], ':') + 1));
    // $timestamp = substr($cleanArray[3], (strpos($cleanArray[3], ':') + 1));
    // $location = substr($cleanArray[4], (strpos($cleanArray[4], ':') + 1));

    try {
        $pdo = new PDO("mysql:host=localhost; dbname=", '', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $stateCreationQuery = "INSERT INTO state (state_id, state_type_id, `timestamp`, location, data) VALUES (NULL, :state_type_id, :timest, :location, NULL);";
    $prepState = $pdo->prepare($stateCreationQuery);
    $prepState->bindValue(':state_type_id', $_GET["state_type_id"]);
    $prepState->bindValue(':timest', $_GET["timestamp"]);
    // $timestamp = date("Y-m-d H:i:s");
    // $prepState->bindValue(':timest', $timestamp);
    $prepState->bindValue(':location', $_GET["location"]);
    // $prepState->bindValue(':jsonRaw', $_GET["state_type_id"]);
    $prepState->execute();

    $stateVerifyQuery = "SELECT state_id FROM state ORDER BY state_id DESC LIMIT 1;";
    $stateVerify = $pdo->query($stateVerifyQuery);
    $state_id = ($stateVerify->fetchAll())[0][0];

    $trussStateCreationQuery = "INSERT INTO truss_state (truss_id, state_id) VALUES (:truss_id, :state_id);";
    $prepTrussState = $pdo->prepare($trussStateCreationQuery);
    $prepTrussState->bindValue(':truss_id', $_GET["truss_id"]);
    $prepTrussState->bindValue(':state_id', $state_id);
    $prepTrussState->execute();

    $sensorStateCreationQuery = "INSERT INTO sensor_state (sensor_id, state_id) VALUES (:sensor_id, :state_id);";
    $prepSensorState = $pdo->prepare($sensorStateCreationQuery);
    $prepSensorState->bindValue(':sensor_id', $_GET["sensor_id"]);
    $prepSensorState->bindValue(':state_id', $state_id);
    $prepSensorState->execute();
  }

?>
