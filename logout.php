<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>
</head>
</html>

<?

session_start();

session_unregister(no);
session_unregister(ip);
session_unregister(msg2);


echo "<script>location.href='index.php';</script>";
exit;

?>