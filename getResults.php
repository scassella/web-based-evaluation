<?php
  // if(!$_SESSION["gotResults"]) {
    // print_r("getting the results");

    $resultsFile = fopen("results.csv", "r") or die ("Error! Can't access data.");

    //empty array to store each relevant result line
    $resultsArray = array();
    // while( ! feof($resultsFile)) {
    //   //store a line in the csv into an array
    //   $result = fgetcsv($resultsFile);
    //   $newResult = array();
    //   //if we find a line with a corresponding pin
    //   if($_SESSION["pin"] == $result[0]) {
    //     //put line data into the $newResult array
    //     for ($i = 0; $i < count($result); $i++) {
    //       array_push($newResult, $result[$i]);
    //     }
    //     //add this new array to $resultsArray
    //     array_push($resultsArray, $newResult);
    //   }
    // }

    while( ! feof($resultsFile)) {
      $result = fgetcsv($resultsFile);

      // print_r($result[0] . "<br>");
      // print_r($result[2] . "<br><br>");

      if($_SESSION["pin"] == $result[0]) {
        array_push($resultsArray, $result);
      }
    }

    $_SESSION["results"] = $resultsArray;
    $_SESSION["gotResults"] = True;

    // print_r("<br> results: " . implode(", ", $_SESSION["results"]));

    fclose($resultsFile);
  // }
?>
