<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>
</head>
</html>

<?

session_start();

session_unregister(admin);
session_unregister(ip);


echo "<script>location.href='admin_index.php';</script>";
exit;

?>