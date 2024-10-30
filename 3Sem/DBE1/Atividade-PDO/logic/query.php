<?php
function queryExecute($pdo, $query, $array)
{
  try {
    $stmt = $pdo->prepare($query);
    $resultado = $stmt->execute($array);
    return $resultado;
  } catch (PDOException $e) {
    error_log($e->getMessage());
    throw $e;
  }
}

function queryFetch($pdo, $query, $array)
{
  try {
    $stmt = $pdo->prepare($query);
    if ($stmt->execute($array)) {
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      return $resultado;
    } else {
      return false;
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    throw $e;
  }
}

function queryFetchAll($pdo, $query, $array = null)
{
  try {
    $stmt = $pdo->prepare($query);
    if ($stmt->execute($array)) {
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } else {
      return false;
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    throw $e;
  }
}
