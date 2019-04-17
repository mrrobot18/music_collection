<?
include("info.inc.php");
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$queryUser="SELECT * FROM User";
$queryPlaylist = "SELECT * FROM Playlist";

$result1=mysql_query($queryUser);
$result2=mysql_query($queryPlaylist);


$num1=mysql_numrows($result1); 
$num2=mysql_numrows($result2); 

mysql_close();

echo "<b><center>Database Output</center></b><br><br>";

?>
<table border="0" cellspacing="2" cellpadding="2">
<tr> 
<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
<th><font face="Arial, Helvetica, sans-serif">UserName</font></th>
<th><font face="Arial, Helvetica, sans-serif">E-mail</font></th>
<th><font face="Arial, Helvetica, sans-serif">Pass</font></th>
</tr>



<?
$i=0;
while ($i < $num1) {
$id1=mysql_result($result1,$i,"UserID");
$id=mysql_result($result1,$i,"username");
$email=mysql_result($result1,$i,"Email");
$pass=mysql_result($result1,$i,"Password");
?>

<tr> 
<td><font face="Arial, Helvetica, sans-serif"><? echo "$id1"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo "$id"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo "$email"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo "$pass"; ?></font></td>
</tr>
<?
++$i;
} 
echo "</table>";
?>

<br><br>

<table border="0" cellspacing="2" cellpadding="2">
<th><font face="Arial, Helvetica, sans-serif">PlaylistID</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">UserID</font></th>
<?
$j=0;
while ($j < $num2) {
$playid=mysql_result($result2,$j,"PlaylistID");
$date=mysql_result($result2,$j,"DateMade");
$userid=mysql_result($result2,$j,"UserID");
?>

<tr> 
<td><font face="Arial, Helvetica, sans-serif"><? echo "$playid"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo "$date"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo "$userid"; ?></font></td>
</tr>
<?
++$j;
} 
echo "</table>";
?>
