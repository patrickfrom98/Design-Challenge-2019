<?php
  //Create database connection
  function getConnection(){
    try {
        $pdo = new PDO("mysql:host=localhost; dbname=u1756102", 'u1756102', '08nov98');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
  }

  function getTrussStates($stateType){
    $pdo = getConnection();
    $statesQuery = "SELECT * FROM truss
      INNER JOIN truss_state ON truss.truss_id = truss_state.truss_id
      INNER JOIN state ON truss_state.state_id = state.state_id
      INNER JOIN state_type ON state.state_type_id = state_type.state_type_id
      WHERE state_type.state_name = :stateType
      ORDER BY state.timestamp DESC
      Limit 10;";
    $prepType = $pdo->prepare($statesQuery);
    $prepType->bindValue(':stateType', $stateType);
    $prepType->execute();
    $states = $prepType->fetchAll();
    return $states;
  }
?>
