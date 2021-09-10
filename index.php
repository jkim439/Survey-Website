<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>
	<script>
	function activation() {
	
	if(document.login.code.value.length==10){
	document.login.submit.disabled=false;
	}

	if(document.login.code.value.length<10){
	document.login.submit.disabled=true;
	}

	}
	
	function check() {
		if(document.login.code.value.length==10){
			full.style.display='';msg.style.display='';
			javascript:document.login.close.focus();
		} else {
			return false;
		}
	
	}
	
	</script>
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

<body onload="javascript:document.login.code.focus();" vlink="blue" alink="blue" link="blue">

<form name="login" target="_self" method="post" action="login.php" onsubmit="return check();">
<div id="full" style="background-color:rgb(153,153,153); width:100%; height:100%; position:absolute; left:0px; top:0px; z-index:1; filter=alpha(opacity=70); display:none;"></div>

    <div id="msg" style="background-color:white; background-image:url('img/loading.jpg');  width:500; height:150; position:absolute; z-index:2; display:none;">
    <p align="center"><br>
<br>
<br>
<br>
<br>
<input type="button" name="close" value=" 취 소 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='index.php'"></p>
    </div>
<table width="800" align="center" border="1" cellspacing="0" bordercolordark="white" bordercolorlight="black" height="329">
        <tr>
            <td colspan="2" height="150" width="800" background="img/title.jpg">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="800" height="100" colspan="2">
                <p style="line-height:20pt; margin-right:10pt; margin-left:10pt;" align="left"><font face="맑은 고딕"><span style="font-size:9pt;"><b>설문조사 참여 자격을 확인하기 위해 인증번호를 입력하여 주십시오.<br>
</b></span></font><span style="font-size:9pt;"><b><font face="맑은 고딕" color="red">인증에 오류가 발생하는 경우에는 김정환(erbion@naver.com)에게 문의하시기 바랍니다.</font></b></span></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="120">
                <p style="margin-right:10pt; margin-left:10pt;"><span style="font-size:10pt;"><b><font face="맑은 고딕">인증번호</font></b></span></p>
            </td>
            <td width="800" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><span style="font-size:10pt;"><font face="맑은 고딕"><input type="text" name="code" maxlength="10" size="20" style="font-family:'맑은 고딕'; font-size:9pt; IME-MODE:DISABLED; text-transform:uppercase;" onkeyup="activation()"></font></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="45" width="800">
                <p align="center"><span style="font-size:10pt;"><font face="맑은 고딕"><input type="submit" name="submit" value=" 인 증 " style="font-family:'맑은 고딕'; font-size:9pt;" disabled></font></span> &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10pt;"><font face="맑은 고딕"><input type="button" name="mode" value=" 관리자 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='admin_index.php'"></p>
            </td>
        </tr>
</table>
</form>

</body>

</html>