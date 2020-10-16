<?php
error_reporting(0);

	/*

		pyprotect - By PyProtect
		Version 0.1alpha
		https://pyprotect.tk

		This is an open Fonte software
		Read LICENSE file before using it

	*/

	try{
		// Checks if file was chosen
		if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){
			// Store error code for reference
			$err = 0;

			// Upload properties
			$_UP['folder'] = 'upload/'; // Destination folder
			$_UP['size'] = 1024 * 1024 * 5; // Maximum file size of 5 MB

			// Unexpected error check
			if($_FILES['file']['error'] != 0){header("Location: error");exit();}

			// Gets file extension
			$tmp = explode('.', $_FILES['file']['name']);
			$extension = strtolower(end($tmp));

			// Checks if extension is allowed
			if(trim($extension) != 'py'){
				// Invalid extension
				$err = 1;

			// Checks if file size is allowed
			}elseif($_UP['size'] <= $_FILES['file']['size']){
				// Invalid size
				$err = 2;
			}else{
				// Creates temporary filename
				$up_name = date('His') . '-' . $_FILES['file']['name'];

				// Does the upload
				if(move_uploaded_file($_FILES['file']['tmp_name'], $_UP['folder'] . $up_name)){

					// Reads the uploaded file
					$text = file_get_contents($_UP['folder'] . $up_name);

					// Checks if file is blank
					if(trim($text) == ''){
						// Blank file
						$err = 3;
					}else{
						// Encodes the text
						$encode = base64_encode($text);

						// Splits the encoded text into keywords
						$parts = str_split($encode, strlen($encode) / 4);
						
						// function to hex
						
						function hex($string){
						$field = $string;
						$field=bin2hex($field);
						$field=chunk_split($field,2,"\\x");
						$field= "\\x" . substr($field,0,-2);
						return $field;
						}
						
						// String reverse
						
						function mb_strrev($str){
						$r = '';
						for ($i = mb_strlen($str); $i>=0; $i--) {
						$r .= mb_substr($str, $i, 1);
							}
						return $r;
						}
						
						// Manipulation
						
						//$line = "\r\n";
						
						$magic_reverse = mb_strrev($parts[0]);						
						$magic = $magic_reverse; // magic						
						$magic_hex = hex($magic);
						
						$love_rot13 = str_rot13($parts[1]);
						$love_hex = hex($love_rot13);
						
						$god_hex = hex($parts[2]);
						
						$destiny_rot13 = str_rot13($parts[3]);
						$destiny_hex = hex($destiny_rot13);
						
						$joy_hex = hex('rot13');						

						$trust = 'trust';
						$trus_hex = hex($trust);
						
						// Trust parts
						$trust1_hex = hex("magic[::-1]");
						$trust1 = "eval('".$trust1_hex."')";
						
						$trust2_hex = hex('codecs.decode(love, joy)');
						$trust2 = "eval('".$trust2_hex."')";
						
						$trust3_hex = hex('god');
						$trust3 = "eval('".$trust3_hex."')";
						
						$trust4_hex = hex('codecs.decode(destiny, joy)');
						$trust4 = "eval('".$trust4_hex."')";						
						
											


						// Creates result file
						
$result = "# encoded by PyProtect\r\n# https://pyprotect.cf\r\n
import base64, codecs
magic = '".$magic_hex."'
love = '".$love_hex."'
god = '".$god_hex."'
destiny = '".$destiny_hex."'
joy = '".$joy_hex."'
trust = ".$trust1." + ".$trust2." + ".$trust3." + ".$trust4."
eval(compile(base64.b64decode(eval('".$trus_hex."')),'<string>','exec'))
";											
						// antigo
						//$result = "# encoded by PyProtect\r\n# https://pyprotect.tk\r\n\r\nimport base64, codecs" . "\r\nmagic = '" . $parts[0] . "'\r\nlove = '" . str_rot13($parts[1]) . "'\r\ngod = '" . $parts[2] . "'\r\ndestiny = '" . str_rot13($parts[3]) . "'\r\n" . 'joy = \'\x72\x6f\x74\x31\x33\'' . "\r\n" . 'trust = eval(\'\x6d\x61\x67\x69\x63\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x6c\x6f\x76\x65\x2c\x20\x6a\x6f\x79\x29\') + eval(\'\x67\x6f\x64\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x64\x65\x73\x74\x69\x6e\x79\x2c\x20\x6a\x6f\x79\x29\')' . "\r\n" . 'eval(compile(base64.b64decode(eval(\'\x74\x72\x75\x73\x74\')),\'<string>\',\'exec\'))' . "";

						// Specifies result folder
						$_UP['result'] = 'result/';

						// Writes the new file and closes the stream
						$file = fopen($_UP['result'] . $up_name, 'w');
						fwrite($file,$result);
						fclose($file);						
						
					}
				}else{
					// Upload error
					$err = 4;
				}
			}
		}else{
			// File not specified
			$err = 5;
		}
	}catch(Exception $e){
		// Unexpected error
		header("Location: error");
		exit();
	}
	
?>
<!--

	PyProtect - By: Joel Silva
	Version 2.0
	https://www.pyprotect.cf

-->
<html>
	<head>
	    <!-- Tags -->
		<meta name="robots" content="noindex,nofollow">
		<meta charset="utf-8">
		<meta name="language" content="en">
		<meta http-equiv="content-language" content="en">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="author" content="Joel Silva">
		<meta name="rating" content="general">
		<meta name="application-name" content="pyprotect">
		<meta name="description" content="This is a simple online tool to obfuscate python codes and &quot;hide&quot; their Fontes.">
		<meta name="abstract" content="Online python code obfuscator.">
		<meta name="keywords" content="pyprotect, python, obfuscate, obfuscator, crypt, encrypt, encode, pyobfuscate, tk, hide, Fonte, secure, code, py, protect">
		<meta property="og:site_name" content="pyprotect">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://<?php echo $_SERVER['SERVER_NAME']; ?>">
		<meta property="og:title" content="pyprotect">
		<meta property="og:image" content="https://<?php echo $_SERVER['SERVER_NAME']; ?>/ogicon.png">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta property="og:locale" content="pt_BR">
		<link rel="canonical" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>PyProtect</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">PyProtect</span>
					<hr>
					<?php
				
						// Print results based on error code
						switch($err){
							case 0:
								$up_original = $_FILES['file']['name'];
								echo '<span id="txt" style="color: #424242;">File protected successfully!!<br><a download="' . $up_original . '" href="' . $_UP['result'] . $up_name.'" target="_blank">DOWNLOAD</a><br><a href="./">PROTECT ANOTHER FILE</a><br><br><i>Files are deleted every hour.</i></span>';
								break;
							case 1:
								echo '<span id="txt" style="color: #424242;">Only .py files are allowed!<br><a href="./">TRY AGAIN</a></span>';
								break;
							case 2:
								echo '<span id="txt" style="color: #424242;">The maximum file size is 5 MB!<br><a href="./">TRY AGAIN</a></span>';
								break;
							case 3:
								echo '<span id="txt" style="color: #424242;">You have chosen a blank file!<br><a href="./">TRY AGAIN</a></span>';
								break;
							case 4:
								echo '<span id="txt" style="color: #424242;">There was a problem with your upload!<br><a href="./">TRY AGAIN</a></span>';
								break;
							case 5:
								echo '<span id="txt" style="color: #424242;">You did not choose a file!<br><a href="./">TRY AGAIN</a></span>';
								break;
						}
					?>
					<hr>
					<span class="copy">By Joel Silva<br>
					<a href="./">[Website]</a></span>
				</td>
			</tr>
		</table>
	</body>
</html>
