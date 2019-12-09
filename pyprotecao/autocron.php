<?php

	/*

		pyprotecao - by Fenix Flix
		Version 1.0 Final
		https://www.fenixflix.ml

		This is an open source software
		Read LICENSE file before using it

	*/

	// 1. PREPARATION

	// Changes the working folder
	chdir('public_html/pyprotect');

	// Defines the output type
	header("Content-Type: text/plain; charset=utf-8");

	// Stores the number of files
	$count = 0;

	// Stores current time
	$date = date('d/m/Y H:i:s');

	// 2. RESULT FOLDER

	// Specifies the folder to delete files
	$folder = 'result';

	// Get all the python files from folder
	$files = glob($folder . '/*.py');

	// Adds the number of files
	$count += count($files);

	// Loop through each file
	foreach($files as $file){
    	// Check if file is valid
    	if(is_file($file)){
    		// Delete file
        	@unlink($file);
    	}
	}

	// 3. UPLOAD FOLDER

	// Specifies the folder to delete files
	$folder = 'upload';

	// Get all the python files from folder
	$files = glob($folder . '/*.py');

	// Adds the number of files
	$count += count($files);

	// Loop through each file
	foreach($files as $file){
    	// Check if file is valid
    	if(is_file($file)){
    		// Delete file
        	@unlink($file);
    	}
	}

	// 4. CONCLUSION

	// Prints the result log if files were deleted
	if($count != 0){
		print $count . ' files deleted at ' . $date . ' UTC.';
	}
?>
