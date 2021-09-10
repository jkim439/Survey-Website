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
echo "<script>location.href='errmsg.php?msg=5&errcode=6134';</script>"; exit;
}

// DB 연결
include "account.php";

// DB 접속
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("데이터베이스 연결에 실패하였습니다.");
$status = mysql_select_db("$DB_Name",$dbconn);

// DB 선택
$data = mysql_fetch_array(mysql_query("select * from member where no='$_SESSION[no]'",$dbconn));

// 인증 확인
if(!$_SESSION[ip] || !$_SESSION[no] || !$_SESSION[ip]==$_SERVER[REMOTE_ADDR] || !$_SESSION[no]==$data[no]) {
sleep(4);
echo "<script>location.href='errmsg.php?msg=5';</script>"; exit;
}

// 재참여 여부 검사
if($data[survey]=='1') {
sleep(4);
echo "<script>location.href='errmsg.php?msg=3';</script>"; exit;
}

// 변수 변환
$grade = $_POST[grade];
$kind = $_POST[kind];
$solve = $_POST[solve];
$good = $_POST[good];
$solve = nl2br($solve);


// 변수 통합
if($grade[1]) { $grade0 = $grade[1]; } else { $grade0 = $grade[0]; }
$kind1 = 0;
$kind2 = 0;
$kind3 = 0;
$kind4 = 0;
$kind5 = 0;
$kind6 = 0;
$kind7 = 0;
if($kind[0]=='1' || $kind[1]=='1' || $kind[2]=='1' || $kind[3]=='1' || $kind[4]=='1' || $kind[5]=='1') { $kind1 = 1; }
if($kind[0]=='2' || $kind[1]=='2' || $kind[2]=='2' || $kind[3]=='2' || $kind[4]=='2' || $kind[5]=='2') { $kind2 = 1; }
if($kind[0]=='3' || $kind[1]=='3' || $kind[2]=='3' || $kind[3]=='3' || $kind[4]=='3' || $kind[5]=='3') { $kind3 = 1; }
if($kind[0]=='4' || $kind[1]=='4' || $kind[2]=='4' || $kind[3]=='4' || $kind[4]=='4' || $kind[5]=='4') { $kind4 = 1; }
if($kind[0]=='5' || $kind[1]=='5' || $kind[2]=='5' || $kind[3]=='5' || $kind[4]=='5' || $kind[5]=='5') { $kind5 = 1; }
if($kind[0]=='6' || $kind[1]=='6' || $kind[2]=='6' || $kind[3]=='6' || $kind[4]=='6' || $kind[5]=='6') { $kind6 = 1; }
if($kind[0]=='etc') { $kind7 = $kind[1]; }
if($kind[1]=='etc') { $kind7 = $kind[2]; }
if($kind[2]=='etc') { $kind7 = $kind[3]; }
if($kind[3]=='etc') { $kind7 = $kind[4]; }
if($kind[4]=='etc') { $kind7 = $kind[5]; }
if($kind[5]=='etc') { $kind7 = $kind[6]; }
if($kind[6]=='etc') { $kind7 = $kind[7]; }
if($good[1]) { $good0 = $good[1]; } else { $good0 = $good[0]; }

// 변수 검사
$grade0 = trim($grade0);
$kind7 = trim($kind7);
$solve = trim($solve);
$good0  = trim($good0);
$grade0 = addslashes($grade0);
$kind7 = addslashes($kind7);
$solve = addslashes($solve);
$good0  = addslashes($good0);

// DB 저장
mysql_query("update member set grade0='$grade0' where no='$data[no]'", $dbconn);
mysql_query("update member set kind1='$kind1' where no='$data[no]'", $dbconn);
mysql_query("update member set kind2='$kind2' where no='$data[no]'", $dbconn);
mysql_query("update member set kind3='$kind3' where no='$data[no]'", $dbconn);
mysql_query("update member set kind4='$kind4' where no='$data[no]'", $dbconn);
mysql_query("update member set kind5='$kind5' where no='$data[no]'", $dbconn);
mysql_query("update member set kind6='$kind6' where no='$data[no]'", $dbconn);
mysql_query("update member set kind7='$kind7' where no='$data[no]'", $dbconn);
mysql_query("update member set solve='$solve' where no='$data[no]'", $dbconn);
mysql_query("update member set good0='$good0' where no='$data[no]'", $dbconn);
mysql_query("update member set survey='1' where no='$data[no]'", $dbconn);




// 완료
echo "<script>location.href='submit2.php';</script>";
exit;


?>