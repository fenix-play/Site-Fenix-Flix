<?php

error_reporting(0);
require "Base2n.php";

function hex($string){
$field = $string;
$field=bin2hex($field);
$field=chunk_split($field,2,"\\x");
$field= "\\x" . substr($field,0,-2);
return $field;
}



$base32 = new Base2n(5, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567', FALSE, TRUE, TRUE);

if (($_POST["texto"] > '') && ($_POST["modo"] > '')){
	if ($_POST["modo"] == '1'){
		$resultado = hex($_POST["texto"]);
	}elseif($_POST["modo"] == '2'){
		$resultado = base64_encode($_POST["texto"]);
	}elseif($_POST["modo"] == '3'){
		$resultado = $base32->encode($_POST["texto"]);
	}elseif($_POST["modo"] == '4'){
		$resultado = hex2bin(str_replace("\x", "", $_POST["texto"]));
	}elseif($_POST["modo"] == '5'){
		$resultado = base64_decode($_POST["texto"]);
	}elseif($_POST["modo"] == '6'){
		$resultado = $base32->decode($_POST["texto"]);
	}elseif($_POST["modo"] == '7'){
		$resultado = strrev($_POST["texto"]);
	}elseif($_POST["modo"] == '8'){
		$resultado = strrev(hex2bin(str_replace("\x", "", $_POST["texto"])));
	}elseif($_POST["modo"] == '9'){
		$resultado = hex(strrev($_POST["texto"]));
	}else{
		$msg = "Texto Vazio ou Opção Não Selecionada!";
		echo "<script>alert('$msg');window.location.assign('./');</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Hex Converter</title>
</head>
<body>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div>  
<h3>Hex Converter</h3>
<body>
<table style="text-align: left; width: 100%;" border="0"
 cellpadding="2" cellspacing="2">
  <tbody>
  <tr>
  <td>
<form method="post" action="" name="converter"><span
 style="font-family: MS Shell Dlg;">Texto: </span><textarea cols="60" rows="5" name="texto"
 class="texto"><?php echo $_POST["texto"]; ?></textarea><br>
  <br>
  <label>
    <input class="radio" value="1" name="modo" type="checkbox">Texto para Hex</label>
  <label>
    <input class="radio" value="2" name="modo" type="checkbox">Texto para Base64</label>
 <label>
    <input class="radio" value="3" name="modo" type="checkbox">Texto para Base32</label>
 <label>
    <input class="radio" value="4" name="modo" type="checkbox">Hex para texto</label>
 <label>
    <input class="radio" value="5" name="modo" type="checkbox">Base64 para texto</label>
 <label>
    <input class="radio" value="6" name="modo" type="checkbox">Base32 para texto</label>
 <label>
    <input class="radio" value="7" name="modo" type="checkbox">Inverter texto</label>
 <label>
    <input class="radio" value="8" name="modo" type="checkbox">Hex invertido para texto</label>
<label>
    <input class="radio" value="9" name="modo" type="checkbox">Texto para hex invertido</label>	
</div>
 <button>Converter</button>
</form>
</td>
</tr>
<tr>
<td>
Resultado: <textarea cols="60" rows="5" name="resultado"
 class="resultado"><?php print $resultado; ?></textarea>
<button class="copiar">Copiar Texto</button>
 <br>
  <br>
  </td>
   </tbody>
</table>
<script type="text/javascript">
var copyTextareaBtn = document.querySelector('.copiar');

copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('.resultado');
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'sim!' : 'não!';
    alert('Texto copiado? ' + msg);
  } catch (err) {
    alert('Opa, Não conseguimos copiar o texto, é possivel que o seu navegador não tenha suporte, tente usar Crtl+C.');
  }
});
</script>
    
<script type="text/javascript">
        // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
    </script>
</body>
</html>
