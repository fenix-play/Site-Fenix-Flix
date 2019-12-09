<?php

	/*

		pyprotect - by Fenix Flix
		Version 1.0 Final
		https://www.fenixflix.ml

		This is an open source software
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

						// Creates result file
						$result = "# encoded by Fenix Flix\r\n# https://www.fenixflix.ml/pyprotecao\r\n\r\nimport base64, codecs" . "\r\nmagic = '" . $parts[0] . "'\r\nlove = '" . str_rot13($parts[1]) . "'\r\ngod = '" . $parts[2] . "'\r\ndestiny = '" . str_rot13($parts[3]) . "'\r\n" . 'joy = \'\x72\x6f\x74\x31\x33\'' . "\r\n" . 'trust = eval(\'\x6d\x61\x67\x69\x63\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x6c\x6f\x76\x65\x2c\x20\x6a\x6f\x79\x29\') + eval(\'\x67\x6f\x64\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x64\x65\x73\x74\x69\x6e\x79\x2c\x20\x6a\x6f\x79\x29\')' . "\r\n" . 'eval(compile(base64.b64decode(eval(\'\x74\x72\x75\x73\x74\')),\'<string>\',\'exec\'))' . "";

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
<html>
	<head>
	    <!-- Tags -->
		<meta name="robots" content="noindex,nofollow">
		<meta charset="utf-8">
		<meta name="language" content="en">
		<meta http-equiv="content-language" content="en">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="author" content="Fenix Flix">
		<meta name="reply-to" content="suporte@fenixflix.tk">
		<meta name="rating" content="general">
		<meta name="application-name" content="pyprotecao">
		<meta name="description" content="This is a simple online tool to obfuscate python codes and &quot;hide&quot; their sources.">
		<meta name="abstract" content="Online python code obfuscator.">
		<meta name="keywords" content="pyprotecao, python, obfuscate, obfuscator, crypt, encrypt, encode, pyobfuscate, tk, hide, source, secure, code, py, protecao">
		<meta property="og:site_name" content="pyprotecao">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://www.fenixflix.ml/pyprotecao">
		<meta property="og:title" content="pyprotecao">
		<meta property="og:image" content="https://www.fenixflix.ml/pyprotecao/ogicon.png">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta property="og:locale" content="pt_BR">
		<link rel="canonical" href="https://www.fenixflix.ml/pyprotecao">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Py Proteção</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">Py Proteção</span>
					<hr>
					<?php
						// Print results based on error code
						switch($err){
							case 0:
								echo '<span id="txt" style="color: #424242;">Arquivo protegido com sucesso!!<br><a href="' . $_UP['result'] . $up_name.'" target="_blank">DOWNLOAD</a><br><a href="index.php">PROTEJA OUTRO ARQUIVO</a><br><br><i>Os arquivos são excluídos a cada hora.</i></span>';
								break;
							case 1:
								echo '<span id="txt" style="color: #424242;">Somente arquivos .py são permitidos!<br><a href="index.php">TENTE NOVAMENTE</a></span>';
								break;
							case 2:
								echo '<span id="txt" style="color: #424242;">O tamanho máximo do arquivo é de 5 MB!<br><a href="index.php">TENTE NOVAMENTE</a></span>';
								break;
							case 3:
								echo '<span id="txt" style="color: #424242;">Você escolheu um arquivo em branco!<br><a href="index.php">TENTE NOVAMENTE</a></span>';
								break;
							case 4:
								echo '<span id="txt" style="color: #424242;">Houve um problema com o seu upload!<br><a href="index.php">TENTE NOVAMENTE</a></span>';
								break;
							case 5:
								echo '<span id="txt" style="color: #424242;">Você não escolheu um arquivo!<br><a href="index.php">TENTE NOVAMENTE</a></span>';
								break;
						}
					?>
					<hr>
					<span class="copy">by Fenix Flix<br>
					<a href="https://www.fenixflix.ml" target="_blank">[Website]</a>&nbsp;&nbsp;<a href="http://bit.ly/Convite-do-Grupo-WhatsApp" target="_blank">[Contato]</a>&nbsp;&nbsp;<a href="https://www.fenixflix.ml" target="_blank">[Fonte]</a></span>
				</td>
			</tr>
		</table>
	</body>
</html>
