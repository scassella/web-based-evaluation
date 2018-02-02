<?php
  $formData = array();
  $considerationsChecked = NULL;
  $considerationOptions = [
    19 => "economic",
    20 => "ethical",
    21 => "enviromental",
    22 => "health and safety",
    23 => "sustainability",
    24 => "social",
    25 => "manufacturability",
    26 => "political"
  ];
  $resultsArray = array();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $formData = [
      $_SESSION['pin'],	//Judge pin
      $_SESSION["results"][0][1],	//Judge Name
      $_SESSION["results"][$_SESSION['projIndex']][2],	//Project Name
      $_SESSION["results"][$_SESSION['projIndex']][3],	//Session
      $_SESSION["results"][$_SESSION['projIndex']][4],	//Room #
      $_SESSION["results"][$_SESSION['projIndex']][5],	//Group Members
      $_SESSION["results"][$_SESSION['projIndex']][6],	//Advisors
      $_POST["technicalAccuracy"],
      $_POST["creativityAndInnovation"],
      $_POST["supportingAnalyticalWork"],
      $_POST["designProcess"],
      $_POST["projectComplexity"],
      $_POST["completion"],
      $_POST["designAndAnalysis"],
      $_POST["qa"],
      $_POST["organization"],
      $_POST["allottedTime"],
      $_POST["visualAids"],
      $_POST["poise"],
    ];

    $considerationsChecked = $_POST["considerations"];
    $i = 19;
    foreach($considerationOptions as $option) {
      if(in_array($option, $considerationsChecked)) {
        $formData[$i] = "checked";
      }
      else {
        $formData[$i] = "unchecked";
      }
      $i++;
    }

    $formData[27] = $_POST["comments"];
    for($i = 7; $i < 19; $i++) {
      $formData[28]+=$formData[$i];
    }

    $resultsFile = fopen("results.csv", "r") or die ("Error! Can't access data.");
    while( ! feof($resultsFile)) {
      $result = fgetcsv($resultsFile);
      array_push($resultsArray, $result);
    }


    //Overwrite the result in resultsArray
    $i = 0;
    foreach($resultsArray as $result) {
      if($result[1] == $formData[1] and $result[2] == $formData[2]) {
          $resultsArray[$i] = $formData;
          break;
      }
      $i++;
    }

    fclose($resultsFile);
    $resultsFile = fopen("results.csv", "w") or die ("Error! Can't access data.");

    //Then overwrite results.csv with the new resultsArray
    //file_put_contents("results.csv", "");
    for($i = 0; $i < count($resultsArray); $i++) {
      fputcsv($resultsFile, $resultsArray[$i]);
    }

    fclose($resultsFile);
    $_SESSION["submissionRecorded"] = "Thank you, your response has been recorded.";
    header("Location: selectProject.php");
  }
?>
