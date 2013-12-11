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
      <p align="center"><b><font face="Verdana">BORRADO DDJJ</font></b></td>
  </tr>
</table>
<form method="POST" action="resultadoDDJJ.php">
  <p align="center"><font face="Verdana" size="2"><b>DIA <select size="1" name="D1">
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
    <option>31</option>     
  </select> MES <select size="1" name="D2">
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
  </select> AÑO <input type="text" name="T1" size="6"></b></font></p>
  <p align="center">&nbsp;</p>
  <p align="center"><input type="submit" value="Enviar" name="B1"><input type="reset" value="Restablecer" name="B2"></p>
</form>
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
</body>
</html>