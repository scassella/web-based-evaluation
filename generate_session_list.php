<?php
		$dataFile = fopen("results.csv","r") or die ("Error! Data file is corrupt.");
		$array = array();
		while (! feof($dataFile)){
			$line = fgetcsv($dataFile);
			$sessions = explode(",", $line[3]);
			foreach($sessions as $ses){
				array_push($array, trim($ses));
			}		
		}

		$uniqueSes = array_unique($array);
		$uniqueSes = array_filter($uniqueSes);
		
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
