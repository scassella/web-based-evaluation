<?php
		$dataFile = fopen("results.csv","r") or die ("Error! Data file is corrupt.");
		$array = array();
		while (! feof($dataFile)){
			$line = fgetcsv($dataFile);
			$advisors = explode(",", $line[6]);
			foreach($advisors as $adv){
				array_push($array, trim($adv));
			}		
		}

		$uniqueAdv = array_unique($array);
		$uniqueAdv = array_filter($uniqueAdv);
		
		//uniqueAdv now is an array of unique advisors to choose from
		/*
		print_r($uniqueAdv);
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=report.csv');
		$output = fopen('php://output', 'w');
		foreach($uniqueAdv as $index){
			fputcsv($output, $index);
		}
		fclose($output);
		 */
		fclose($dataFile)
?>
