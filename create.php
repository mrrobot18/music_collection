<?
include("info.inc.php");
$conn = mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$playlist = "CREATE TABLE Playlist (
PlaylistID INT(11)  PRIMARY KEY,
DateMade DATE NOT NULL,
UserID INT(11) NOT NULL,
FOREIGN KEY (UserID) references User(UserID)
)";

$resultPlaylist=mysql_query($playlist);

if ($resultPlaylist === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table Playlist" . mysql_error();
}

mysql_close();
?>