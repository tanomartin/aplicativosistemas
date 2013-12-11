<html>
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Subida de Archivos</title>
</head>
<?php
$archivo = $_FILES['archivo'];	
$archivo_name = $archivo['name'];
$archivo_type = $archivo['type'];
$archivo_size = $archivo['size'];
?>
<body bgcolor="#000000" text="#00FFFF">
<table border="1" width="100%">
  <tr>
    <td width="100%">
      <p align="center"><font face="Verdana"><b>ARCHIVOS PPJJ</b></font></td>
  </tr>
</table>
<table border="0" width="100%">
  <tr>
    <td width="23%" align="right"><font face="Verdana" size="2">Archivo:</font></td>
    <td width="77%"><b><font face="Verdana" color="#FF00FF" size="3"><?php echo $archivo_name;?></font></b></td>
  </tr>
  <tr>
    <td width="23%" align="right"><font face="Verdana" size="2">Tamaño en Bytes:</font></td>
    <td width="77%"><b><font face="Verdana" color="#FF00FF" size="3"><?php echo $archivo_size;?></font></b></td>
  </tr>
  <tr>
    <td width="23%" align="right"><font face="Verdana" size="2">Tipo de archivo:</font></td>
    <td width="77%"><b><font face="Verdana" color="#FF00FF" size="3"><?php echo $archivo_type;?></font></b></td>
  </tr>
  <tr>
    <td width="23%" align="right"><font face="Verdana" size="2">Cantidad de Registros:</font></td>
    <td width="77%"><b><font face="Verdana" color="#FF00FF" size="3"><?php echo $registros = count(file($archivo['tmp_name']));?></font></b></td>
  </tr>
</table>
<?php
$nom = '/ppjj/';
$ext = '/text/';
if(preg_match($ext, $archivo_type)) {
	if(preg_match($nom, $archivo_name)) {
		copy($archivo['tmp_name'], $archivo_name);
		$resultado = 'PIPIKUKU!!!';
		$cfondo = '00FF00';
		$cletra = '008000';
	} else {
		$resultado = 'NO ES EL ARCHIVO CORRECTO PARA ESTA OPERACION';
		$cfondo = 'FF0000';
		$cletra = '000000';
	}
} else { 
	$resultado = 'NO ES EL TIPO DE ARCHIVO CORRECTO PARA ESTA OPERACION';
	$cfondo = 'FF0000';
	$cletra = '000000';
}
?>
<table border="1" width="100%">
  <tr>
    <td width="23%">
      <p align="right"><font face="Verdana" size="2">Resultado:</font></td>
    <td width="77%" bgcolor="#<?php echo $cfondo;?>"><font face="Verdana" size="3" color="#<?php echo $cletra;?>"><b><?php echo $resultado;?></b></font></td>
  </tr>
</table>
<?php 
$ext2 = '/.txt/';
$ext3 = '/.bak/';
$directorio = opendir(".");
?>
<p><font face="Verdana"><b><u>Archivos:</u></b></font></p>
<table border="1" width="100%">
  <tr>
    <td width="23%"><font face="Verdana">.txt</font></td>
    <td width="77%"><font face="Verdana">
<?php
while($archi = readdir($directorio)) {
	if(preg_match($ext2, $archi)) {
		echo $archi;
		echo '<br>';
	}
}
?>
	</font></td>
  </tr>
  <tr>
    <td width="23%"><font face="Verdana">.bak</font></td>
    <td width="77%"><font face="Verdana">
<?php
$directorio = opendir(".");
while($archi2 = readdir($directorio)) {
	if(preg_match($ext3, $archi2)) {
		echo $archi2;
		echo '<br>';
	}
}
?>
	</font></td>
  </tr>
</table>
<table border="1" width="100%">
  <tr>
    <td width="50%" align="center" bgcolor="#C0C0C0"><font face="Verdana" size="1" color="#FF0000"><b><a href="cargaPPJJ.htm">VOLVER</a></b></font></td>
    <td width="50%" align="center" bgcolor="#008080"><font color="#333333" size="1" face="Verdana"><b><a href="procesoPPJJ.php">PROCESAR ARCHIVO</a></b></font></td>
  </tr>
</table>
</body>
</html>