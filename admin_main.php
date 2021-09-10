<?
session_start();

// DB 연결
include "account.php";

// DB 접속
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("데이터베이스 연결에 실패하였습니다.");
$status = mysql_select_db("$DB_Name",$dbconn);

// 인증 확인
if(!$_SESSION[ip] || !$_SESSION[admin] || !$_SESSION[ip]==$_SERVER[REMOTE_ADDR]) {
sleep(4);
echo "<script>alert('관리자 모드에 무단 접속하셨습니다. ');location.href='admin_index.php';</script>"; exit;
}

// 관리자 명칭
if($_SESSION[admin]==1) { $admin_name='최고'; }
if($_SESSION[admin]==2) { $admin_name='일반'; }

?>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>

<meta name="generator" content="Namo WebEditor(Trial)"></head>

<body vlink="blue" alink="blue" link="blue">
<form name="login">
    <table width="800" align="center" border="1" cellspacing="0" bordercolordark="white" bordercolorlight="black" height="329">
        <tr>
            <td colspan="2" height="150" width="795" background="img/admin_title.jpg">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="795" height="100" colspan="2">
                <p style="line-height:20pt; margin-right:10pt; margin-left:10pt;" align="left"><span style="font-size:9pt;"><b><font face="맑은 고딕" color="red"><?=$admin_name?> 관리자 모드</font></b></span><font face="맑은 고딕"><span style="font-size:9pt;"><b>에 접속하셨습니다.<br>
</b></span></font><font face="맑은 고딕"><span style="font-size:9pt;"><b>원하시는 관리자 전용 메뉴를 선택하십시오.</b></span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
                <p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="맑은 고딕" color="blue">설문조사 결과</font></a></span></b></p>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="맑은 고딕"><span style="font-size:10pt;">설문조사의 결과를 실시간으로 확인합니다.</span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
                <p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="맑은 고딕" color="blue">인증번호 생성</font></a></span></b></p>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="맑은 고딕"><span style="font-size:10pt;">인증번호를 새로 생성합니다.</span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
			<?if($_SESSION[admin]==1) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="맑은 고딕" color="blue">인증번호 삭제</font></a></span></b></p><?}?><?if($_SESSION[admin]==2) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><font face="맑은 고딕" color="#999999">인증번호 삭제</font></span></b></p><?}?>

            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="맑은 고딕"><span style="font-size:10pt;">생성된 인증번호를 삭제합니다.</span></font><span style="font-size:10pt;"><font face="맑은 고딕" color="red"> (최고 관리자 전용)</font></span></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
<?if($_SESSION[admin]==1) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="맑은 고딕" color="blue">데이터베이스 접속</font></a></span></b></p><?}?><?if($_SESSION[admin]==2) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><font face="맑은 고딕" color="#999999">데이터베이스 접속</font></span></b></p><?}?>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="맑은 고딕"><span style="font-size:10pt;">데이터베이스에 직접 접속합니다.</span></font><span style="font-size:10pt;"><font face="맑은 고딕" color="red"> (최고 관리자전용)</font></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="45" width="795">
                <p align="center"> <span style="font-size:10pt;"><font face="맑은 고딕"><input type="button" name="logout" value=" 로그아웃 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='admin_logout.php'"></font></span></p>
            </td>
        </tr>
    </table>
</form>
</body>

</html>