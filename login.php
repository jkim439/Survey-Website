<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>
</head>
</html>

<?

session_start();

if(getenv("REQUEST_METHOD") == 'GET' ) {
sleep(3);
echo "<script>location.href='errmsg.php?msg=5&errcode=6131';</script>"; exit;
}

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// member ���̺� ����
mysql_select_db("member");

// ��ġ�ϴ� code �˻�
$result = mysql_query("select * from member where code='$_POST[code]'");
$data = mysql_fetch_array($result);

// ip �ߺ� �˻�
$ip = $_SERVER[REMOTE_ADDR];
$ipresult = mysql_query("select * from member where ip='$ip'");
$ipdata = mysql_fetch_array($ipresult);

if($data[code]) {
  if($data[survey]==0) {
    sleep(3);
    $no = $data[no];
    $msg2 = 1;
    if($ipdata[ip]!='' && $ipdata[no]!=$data[no]) {
    echo "<script>location.href='errmsg.php?msg=5&errcode=8052';</script>"; exit;
    } else {
    $_SESSION["no"] = "$no";
    $_SESSION["ip"] = "$ip";
    $_SESSION["msg2"] = "$msg2";
    session_register(no);
    session_register(ip);
    session_register(msg2);
    mysql_query("update member set ip='$ip' where no='$data[no]'", $dbconn);
    echo "<script>location.href='main1.php';</script>";
    }
  } else {
    sleep(3);
    echo "<script>location.href='errmsg.php?msg=3';</script>"; exit;
    }
} else {
sleep(3);
echo "<script>location.href='errmsg.php?msg=1';</script>"; exit;
}


?>