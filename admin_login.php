<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>
</head>
</html>

<?

session_start();

if(getenv("REQUEST_METHOD") == 'GET' ) {
sleep(4);
echo "<script>alert('������ ��忡 ���� �����ϼ̽��ϴ�. ');location.href='admin_index.php';</script>"; exit;
}

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// member ���̺� ����
mysql_select_db("member");

if($_POST[code]=='bzetkj66' || $_POST[code]=='bzetkj77') {
    sleep(4);
    if($_POST[code]=='bzetkj66') { $admin = 1; }
    if($_POST[code]=='bzetkj77') { $admin = 2; }
    $ip = $_SERVER[REMOTE_ADDR];
    $_SESSION["admin"] = "$admin";
    $_SESSION["ip"] = "$ip";
    session_register(admin);
    session_register(ip);
    echo "<script>location.href='admin_main.php';</script>";
} else {
sleep(4);
echo "<script>alert('������ ��й�ȣ�� �ùٸ��� �ʽ��ϴ�. ');location.href='admin_index.php';</script>"; exit;
}


?>