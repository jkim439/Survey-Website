<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>
</head>
</html>

<?

session_start();

if(getenv("REQUEST_METHOD") == 'GET' ) {
sleep(4);
echo "<script>alert('관리자 모드에 무단 접속하셨습니다. ');location.href='admin_index.php';</script>"; exit;
}

// DB 연결
include "account.php";

// DB 접속
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("데이터베이스 연결에 실패하였습니다.");
$status = mysql_select_db("$DB_Name",$dbconn);

// member 테이블 선택
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
echo "<script>alert('관리자 비밀번호가 올바르지 않습니다. ');location.href='admin_index.php';</script>"; exit;
}


?>