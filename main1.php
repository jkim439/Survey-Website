<?
session_start();

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
echo "<script>location.href='errmsg.php?msg=5&errcode=6132';</script>"; exit;
}

?>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>
	<style>
	<!--
	#msg {
    top: 50%;
    left: 50%;
    margin-left: -250px; /* 길이의 절반 */
    margin-top: -75px; /* 높이의 절반 */
	}
	-->
</style>
<meta name="generator" content="Namo WebEditor(Trial)"></head>

<body <?if($_SESSION['msg2']=='0'){?>onload="javascript:document.login.ok.focus();" <?}?><?if($_SESSION['msg2']=='1'){?>onload="javascript:document.login.close.focus();" <?}?>vlink="blue" alink="blue" link="blue">
<form name="login">
<?if($_SESSION['msg2']=='1'){?>
<div id="full" style="background-color:rgb(153,153,153); width:100%; height:100%; position:absolute; left:0px; top:0px; z-index:1; filter=alpha(opacity=70);"></div>

    <div id="msg" style="background-color:white; background-image:url('img/msg2.jpg');  width:500; height:150; position:absolute; z-index:2;">
    <p align="center"><br>
<br>
<br>
<br>
<br>
<input type="button" name="close" value=" 확 인 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="msg.style.display='none';full.style.display='none';javascript:document.login.ok.focus();"></p>
</div>
<?}?>
<table width="800" align="center" border="1" cellspacing="0" bordercolordark="white" bordercolorlight="black" height="329">
        <tr>
            <td colspan="2" height="150" width="800" background="img/title.jpg">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="800" height="100" colspan="2">
                <p style="line-height:20pt; margin-right:10pt; margin-left:10pt;" align="left"><font face="맑은 고딕"><span style="font-size:9pt;"><b>설문조사 내용은 익명으로 처리됩니다.<br>
</b></span></font><font face="맑은 고딕"><span style="font-size:9pt;"><b>인증번호 1개당 설문조사에 단 1번만 참여할 수 있습니다.</b></span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="120">
                <p style="margin-right:10pt; margin-left:10pt;"><span style="font-size:10pt;"><b><font face="맑은 고딕">주제</font></b></span></p>
            </td>
            <td width="800" height="45">
               <p style="margin-right:10pt; margin-left:10pt;"><font face="맑은 고딕"><span style="font-size:12pt;">대학 신입생의 스트레스</span></font></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="45" width="800">
                <p align="center"><span style="font-size:10pt;"><font face="맑은 고딕"><input type="button" name="ok" value=" 참 여 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='main2.php'"></font></span> &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10pt;"><font face="맑은 고딕"><input type="button" name="logout" value=" 취 소 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='logout.php'"></font></span></p>
            </td>
        </tr>
</table>
</form>
</body>

</html>
<?

// 메시지 창 확인
if($_SESSION['msg2']=='1') {
$msg2 = 0;
$_SESSION["msg2"] = "$msg2";
session_register(msg2);
}

?>