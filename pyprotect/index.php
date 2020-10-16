<!--

	PyProtect
	Version 2.0

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
		<meta name="description" content="Esta é uma ferramenta online simples para ofuscar códigos Python e &quot;hide&quot; suas Fontes.">
		<meta name="abstract" content="Obfuscator de código python online.">
		<meta name="keywords" content="pyprotect, python, obfuscate, obfuscator, crypt, encrypt, encode, pyobfuscate, tk, hide, Fonte, secure, code, py, protect">
		<meta property="og:site_name" content="pyprotect">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://<?php echo $_SERVER['SERVER_NAME']; ?>">
		<meta property="og:title" content="pyprotect">
		<meta property="og:image" content="https://<?php echo $_SERVER['SERVER_NAME']; ?>/pyprotect/ogicon.png">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="256">
		<meta property="og:image:height" content="256">
		<meta property="og:locale" content="pt_BR">
		<link rel="canonical" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>PyProtect</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="main.css">
		<script type="text/javascript">
			function showLoad(){
				document.getElementById('form').style.display = 'none';
				document.getElementById('img').style.display = 'inline';
				document.getElementById('txt').innerHTML = 'Sending your file, Please wait......'
			}
		</script>
	</head>
	
	<body>
	<center>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">PyProtect</span>
					<hr>
					<span id="txt" style="color: #424242;">Selecione um arquivo .py para ser ofuscado</span><br>
					<img src="loading.gif" id="img" class="loader">
					<form action="process" onsubmit="showLoad();" id="form" method="post" enctype="multipart/form-data">
						<input accept=".py" type="file" required name="file"><br>
						<button>Enviar arquivo</button>
						<br>
						<span style="color: dimgray; font-size: 14px; font-style: italic;">Ao enviar um arquivo, você concorda com nossos <a href="terms">termos.</a>.</span>
					
					</form>				
					<hr>
					<span class="copy">By: Team Fênix Flix<br>basiado no projeto eugabrielsilva.tk/pyprotect<br>
				</td>
			</tr>
		</table>
	</center>
	</body>
</html>
