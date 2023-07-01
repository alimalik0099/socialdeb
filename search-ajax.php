<?php 
include 'db.php';

$search=$_POST['search_word'];

$Query = "SELECT word FROM trend WHERE word LIKE '%$search%'";
$ExecQuery = mysqli_query($conn, $Query);
while ($Result = MySQLi_fetch_array($ExecQuery)) {
	
    echo'<option>#'. $Result['word'].'</option>';
}

$Query1 = "SELECT question_heading FROM posts WHERE question_heading LIKE '%$search%'";
$ExecQuery1 = mysqli_query($conn, $Query1);
while ($Result1 = MySQLi_fetch_array($ExecQuery1)) {
    echo'<option>Q) '. $Result1['question_heading'].'</option>';
}

$Query2 = "SELECT tittle FROM news WHERE tittle LIKE '%$search%'";
$ExecQuery2 = mysqli_query($conn, $Query2);
while ($Result2 = MySQLi_fetch_array($ExecQuery2)) {
    echo'<option>News: '. $Result2['tittle'].'</option>';
}

