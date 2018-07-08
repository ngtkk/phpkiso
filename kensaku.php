<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>回答一覧</title>
</head>
<body>

<?php
$code=$_POST['code'];

$dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql ='SELECT * FROM anketo WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);

while(1)
{
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print $rec['code'];
	print '<br/>';
	print $rec['nickname'];
	print '<br/>';
	print $rec['email'];
	print '<br/>';
	print $rec['goiken'];
	print '<br/>';
}


$dbh=null;
?>
<br/>
<a href="kensaku.html">検索結果に戻る</a>
</body>
</html>
