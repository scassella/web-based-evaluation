<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sessionNumber = ($_POST["sesID"]);
		$dataFile = fopen("results.csv","r") or die ("Error! Data file is corrupt.");
		$array = array();
		$titles = array("Judge Pin", "Judge Name", "Project Name", "Session", "Room Number", "Group Members", "Advisors", "Technical Accuracy", "Creativity and Innovation", "Supporting Analytical Work", "Methodical Design Process Demonstrated", "Addresses Project Complexity Appropriately", "Expectation of Completion", "Design and Analysis of Tests", "Quality of Response During Q&A", "Organization", "Use of Allotted Time", "Visual Aids", "Confidence and Poise", "economic", "ethical", "environmental", "health and safety", "sustainability", "social", "manufacturability", "political", "total");
		array_push($array, $titles);
		$prevTitle = ""; 
		$numEvals = 0;
		$sumEvals = 0;
		while ( ! feof($dataFile)){
			$line = fgetcsv($dataFile);
			if($sessionNumber == $line[3]){
				if($prevTitle == $line[2]){
					//same as origional title,
					//increment counter
					$numEvals = $numEvals + 1;
					$sumEvals = $sumEvals + $line[28];
					$line[27] = $line[28];
					$line[28] = "";
					array_push($array,$line);
				}
				elseif($numEvals > 0){
					//must be new title
					//first add print session total
					$avg = $sumEvals / $numEvals;
					$avgTxt = $prevTitle . " Total Average:";
					array_push($array, array($avgTxt,$avg));
					$prevTitle = $line[2];
					$numEvals = 1;
					$sumEvals = $line[28];
					$line[27] = $line[28];
					$line[28] = "";
					array_push($array,$line);
				}else{
					//first condition
					$prevTitle = $line[2];
					$numEvals = 1;
					$sumEvals = $line[28];
					$line[27] = $line[28];
					$line[28] = "";
					array_push($array,$line);
				}
				//array_push($array, $line);
			}			
		}

		if($numEvals > 0){
			$avg = $sumEvals / $numEvals;
			$avgTxt = $prevTitle . " Total Average:";
			array_push($array, array($avgTxt,$avg));
		}

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=session_report.csv');
		$output = fopen('php://output', 'w');
		foreach($array as $index){
			fputcsv($output, $index);
		}
		fclose($output);
		fclose($dataFile);
	}
?>
