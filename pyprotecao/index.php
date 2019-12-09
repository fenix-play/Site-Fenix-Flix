<!--

	pyprotecao - by Fenix Flix
	Version 1.0 Final
	https://www.fenixflix.ml

	This is an open source software
	Read LICENSE file before using it

-->

<html>
	<head>
	    <!-- Tags -->
		<meta name="robots" content="index,follow">
		<meta charset="utf-8">
		<meta name="language" content="en">
		<meta http-equiv="content-language" content="en">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="author" content="Fenix Flix">
		<meta name="reply-to" content="https://www.fenixflix.ml">
		<meta name="rating" content="general">
		<meta name="application-name" content="Fenix Flix">
		<meta name="description" content="Esta é uma ferramenta on-line para criar criptografia para códigos python e suas fontes.">
		<meta name="abstract" content="Obfuscador de código python online.">
		<meta name="keywords" content="pyprotecao, python, obfuscate, obfuscator, crypt, encrypt, encode, pyobfuscate, tk, hide, source, secure, code, py, protecao">
		<meta property="og:site_name" content="Fenix Flix">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://www.fenixflix.ml/pyprotecao">
		<meta property="og:title" content="Fenix Flix">
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
		<script type="text/javascript">
			function showLoad(){
				document.getElementById('form').style.display = 'none';
				document.getElementById('img').style.display = 'inline';
				document.getElementById('txt').innerHTML = 'Uploading your file, please wait...'
			}
		</script>
	</head>
	<body>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">Py Proteção</span>
					<hr>
					<span id="txt" style="color: #424242;">Selecione um arquivo .py para ser criptografado:</span><br>
					<img src="loading.gif" id="img" class="loader">
					<form action="process" onsubmit="showLoad();" id="form" method="post" enctype="multipart/form-data">
						<input accept=".py" type="file" required name="file"><br>
						<button>Enviar Arquivo</button>
					</form>
					<hr>
					<span class="copy">by Fenix Flix<br>
					<a href="https://www.fenixflix.ml/" target="_blank">[Website]</a>&nbsp;&nbsp;<a href="https://www.fenixflix.ml/" target="_blank">[Contato]</a>&nbsp;&nbsp;<a href="https://www.fenixflix.ml" target="_blank">[Fonte]</a></span>
				</td>
			</tr>
		</table>
	</body>
</html>
