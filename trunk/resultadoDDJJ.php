<html>
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Borrado de DDJJ</title>
</head>
<body bgcolor="#000000" text="#00FFFF">
<table border="1" width="100%">
  <tr>
    <td width="100%">
      <p align="center"><font face="Verdana"><b>BORRADO DDJJ</b></font></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<?php
$datos = array_values($_POST);
$dia = $datos[0];
$mes  = $datos[1];
$ano = $datos[2];
$fecsub = $ano.'-'.$mes.'-'.$dia;
echo 'Fecha de Subida: '.$fecsub;
echo '<br>';
$host = "localhost";
$user = "ospimrem_legacy";
$pass = "trozo299tabea";
$db = mysql_connect($host,$user,$pass);
mysql_select_db('ospimrem_aplicativo');
//////////////// DDJJ
$sqlValidas = "SELECT * FROM validas WHERE fecsub = '$fecsub'";
$resValidas = mysql_query($sqlValidas,$db);
$nfiValidas = mysql_num_rows($resValidas);
echo '<br>';
$okddjj = 0;
$malddjj = 0;
while($rowValidas=mysql_fetch_array($resValidas)) {
	//echo $rowValidas['id'].' | '.$rowValidas['nrcuit'].' | '.$rowValidas['nrcuil'].' | '.$nrctrl = $rowValidas['nrctrl'];
	//echo '<br>';
	$id = $rowValidas['id'];
	$nrctrl = $rowValidas['nrctrl'];
	$nrcuit = $rowValidas['nrcuit'];
	$nrcuil = $rowValidas['nrcuil'];
	$permes = $rowValidas['permes'];
	$perano = $rowValidas['perano'];
	$sqlBorraDDJJVali = "DELETE FROM ddjj WHERE id = '$id' AND nrcuit = '$nrcuit' AND nrcuil = '$nrcuil' AND nrctrl = '$nrctrl' AND permes = '$permes' AND perano = '$perano'";
	$resBorraDDJJVali = mysql_query($sqlBorraDDJJVali,$db);
	if($resBorraDDJJVali) {
		//echo $id." ".$nrcuit." ".$nrctrl." ok! <br>";
		$okddjj = $okddjj + 1;
	} else {
		echo $id." ".$nrcuit." ".$nrctrl." error <br>";
		$malddjj = $malddjj + 1;
	}
}
//////////// PPJJ
$sqlPPJJ = "SELECT * FROM ppjj WHERE fecsub = '$fecsub'";
$resPPJJ = mysql_query($sqlPPJJ,$db);
$nfiPPJJ = mysql_num_rows($resPPJJ);
echo '<br>';
$okppjj = 0;
$malppjj = 0;
while($rowPPJJ=mysql_fetch_array($resPPJJ)) {
	//echo $rowPPJJ['id'].' | '.$rowPPJJ['nrcuit'].' | '.$rowPPJJ['nrcuil'].' | '.$nrctrl = $rowPPJJ['nrctrl'];
	//echo '<br>';
	$id = $rowPPJJ['id'];
	$nrctrl = $rowPPJJ['nrctrl'];
	$nrcuit = $rowPPJJ['nrcuit'];
	$nrcuil = $rowPPJJ['nrcuil'];
	$permes = $rowPPJJ['permes'];
	$perano = $rowPPJJ['perano'];
	$sqlBorraDDJJPpjj = "DELETE FROM ddjj WHERE id = '$id' AND nrcuit = '$nrcuit' AND nrcuil = '$nrcuil' AND nrctrl = '$nrctrl'  AND permes = '$permes' AND perano = '$perano'";
	$resBorraDDJJPpjj = mysql_query($sqlBorraDDJJPpjj,$db);
	if($resBorraDDJJPpjj) {
		//echo $id." ".$nrcuit." ".$nrctrl." ok ppjj!!! <br>";
		$okppjj = $okppjj + 1;
	} else {
		echo $id." ".$nrcuit." ".$nrctrl." error <br>";
		$malppjj = $malppjj + 1;
	}
}
?>
<p>&nbsp;</p>
<p>VALIDAS</p>
<table border="1" width="100%">
  <tr> 
    <td width="23%"><font face="Verdana">Datos ok(<?php echo $nfiValidas; ?>):</font></td>
    <td width="77%"><font face="Verdana"><?php echo $okddjj;?></font></td>
  </tr>
  <tr> 
    <td width="23%"><font face="Verdana">Datos mal:</font></td>
    <td width="77%"><font face="Verdana"><?php echo $malddjj;?></font></td>
  </tr>
</table>
<p>PPJJ</p>
<table border="1" width="100%">
  <tr> 
    <td width="23%"><font face="Verdana">Datos ok(<?php echo $nfiPPJJ; ?>):</font></td>
    <td width="77%"><font face="Verdana"><?php echo $okppjj;?></font></td>
  </tr>
  <tr> 
    <td width="23%"><font face="Verdana">Datos mal:</font></td>
    <td width="77%"><font face="Verdana"><?php echo $malppjj;?></font></td>
  </tr>
</table>
<?php
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
    <td width="50%" align="center" bgcolor="#C0C0C0"><font face="Verdana" size="1" color="#FF0000"><b><a href="borraDDJJ.php">VOLVER</a></b></font></td>
  </tr>
</table>
</body>
</html>