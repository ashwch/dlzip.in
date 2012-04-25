<?php session_start(); ?>
<?php 
define('DB_HOST','localhost');
define('DB_PWD','@9997829951#');
define('DB_USER','root');
define('DB_NAME','TalentBox');

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) OR die('couldn\'t connect' . mysqli_connect_error());
//qecho $dbc;
?>
<html>
<head>
<title>Question Bank
</title>
</head>
<body>
<form>
<H1>Question Bank</H1><input type="Submit" value="Add New Question" name="Add"></br>
<table border="1">
<tr>
<th width="50">Sr.No</th>
<th width="350">Questions</th>
<th width="100">Type</th>
<th width="50">Marks</th>
<th width="50">Count</th>
<th width="200">Action</th>
<th width="350">Answers</th>
</tr>
<?php
echo "<tr>
<td>"
?>
</table>
</form>
</body>
</html>
<?php

$r=mysqli_query($dbc,"select Qid, Quest, Qtype, mm from question where isdelete=0");
$a=mysqli_query($dbc,"select correct from answer");
if(mysqli_num_rows($r)>0)
{echo '<form method="POST" action="">';
while($data=mysqli_fetch_assoc($r))
{
echo '<form method="POST" action="">';
$data1=mysqli_fetch_assoc($a);
echo '<table border="1"><tr>
<th width="50">'.$data["Qid"].'</th>
<th width="350">'.$data["Quest"].'</th>
<th width="100">'.$data["Qtype"].'</th> 
<th width="50">'.$data["mm"].'</th>
<th width="50"></th>
<th width="200"><form action ="" Method="POST"><input type="Submit" value="edit" name="edit"></form> <form action ="" Method="POST"> <input type="Submit" value="Delete" name="delete"><input type="hidden" value='.$data['Qid'].' name="shikhar"></form>
<form action ="" Method="POST"><input type="Submit" value="View" name="view"></th><th width="350">'.$data1["correct"].'</th><tr></form>';
if(isset($_POST["delete"]) && isset($_POST["shikhar"]))
{
$temp_id=(int)$_POST["shikhar"];	
mysqli_query($dbc,"UPDATE question SET isdelete = '1' WHERE Qid='$temp_id'")or trigger_error("error".mysqli_error($dbc));
}

}
}
if(isset($_POST["edit"]))
header("location:1.php");
else 
if(isset($_POST["view"]))
{
mysqli_query("UPDATE `talentbox`.`question` SET `isdelete` = \'1\' WHERE `question`.`Qid` = in(".$b.")");	
}