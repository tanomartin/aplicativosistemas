<html>
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Procesamiento de Archivos</title>
</head>
<body bgcolor="#000000" text="#00FFFF">
<table border="1" width="100%">
  <tr>
    <td width="100%">
      <p align="center"><font face="Verdana"><b>ARCHIVOS VALIDAS</b></font></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<?php
$datos = array_values($_POST);
$dia = $datos[0];
$mes  = $datos[1];
$ano = $datos[2];
$host = "localhost";
$user = "ospimrem_legacy";
$pass = "trozo299tabea";
//Ejecucion de la sentencia SQL
$db = mysql_connect($host,$user,$pass) or die ('Problemas de Conexion con la BD');
mysql_select_db('ospimrem_newaplicativo');
$archivo = 'validas'.$ano.$mes.$dia.'.txt';
echo $archivo."<br>";
$filas = file($archivo);
$cont = 0;
$ok = 0;
$mal = 0;
for($i = 0; $i < count($filas); $i++) {
	$datos = explode ('|', $filas[$i]);
	$sql = "INSERT INTO validas VALUES ('".trim($datos[0])."','".trim($datos[1])."','".trim($datos[2])."','".trim($datos[3])."','".trim($datos[4])."','".trim($datos[5])."','".trim($datos[6])."','".trim($datos[7])."','".trim($datos[8])."','".trim($datos[9])."','".trim($datos[10])."','".trim($datos[11])."','".trim($datos[12])."','".trim($datos[13])."','".trim($datos[14])."','".trim($datos[15])."','".trim($datos[16])."','".trim($datos[17])."')";
	$query = mysql_query($sql, $db);
	if($query) {
		$ok = $ok + 1;
	} else {
		echo $datos[0]."-".$datos[1]." Error <br>";
		$mal = $mal + 1;
	}
	$cont++;
}
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1" width="100%">
  <tr> 
    <td width="23%"><font face="Verdana">Datos ok:</font></td>
    <td width="77%"><font face="Verdana"><?php echo $ok;?></font></td>
  </tr>
  <tr> 
    <td width="23%"><font face="Verdana">Datos mal:</font></td>
    <td width="77%"><font face="Verdana"><?php echo $mal;?></font></td>
  </tr>
</table>
<?php
$archivo2 = preg_replace('/txt/','bak',$archivo);
rename ($archivo, $archivo2);
$ext2 = '/.txt/';
$ext3 = '/.bak/';
$directorio = opendir(".");
?>
<p>&nbsp;</p>
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
<p>&nbsp;</p>
<table border="1" width="100%">
  <tr> 
    <td width="50%" align="center" bgcolor="#C0C0C0"><font face="Verdana" size="1" color="#FF0000"><b><a href="procesoValidas.php">VOLVER</a></b></font></td>
  </tr>
</table>
</body>
</html>