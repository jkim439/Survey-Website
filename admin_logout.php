<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>
</head>
</html>

<?

session_start();

session_unregister(admin);
session_unregister(ip);


echo "<script>location.href='admin_index.php';</script>";
exit;

?>