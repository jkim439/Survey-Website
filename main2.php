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
echo "<script>location.href='errmsg.php?msg=5&errcode=6133';</script>"; exit;
}

?>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>온라인 설문조사 시스템</title>
	<script>
	
	function check1() {

		if(document.login["grade[]"][4].checked){
			document.login["grade[]"][5].disabled=false;
			document.login["grade[]"][5].focus();
		} else {
			document.login["grade[]"][5].value="";
			document.login["grade[]"][5].disabled=true;
		}

	}
	
	function check2() {

		if(document.login["kind[]"][6].checked){
			document.login["kind[]"][7].disabled=false;
			document.login["kind[]"][7].focus();
		} else {
			document.login["kind[]"][7].value="";
			document.login["kind[]"][7].disabled=true;
		}
		
	}
	
	function check3() {

		if(document.login["good[]"][5].checked){
			document.login["good[]"][6].disabled=false;
			document.login["good[]"][6].focus();
		} else {
			document.login["good[]"][6].value="";
			document.login["good[]"][6].disabled=true;
		}

	}
	
	function checking() {

		if(document.login["grade[]"][4].checked){
			if(!document.login["grade[]"][5].value) {
			alert("빈칸을 채워주시기 바랍니다. ");
			javascript:document.login["grade[]"][5].focus();
			return false;
			}
		}

		if(document.login["kind[]"][0].checked==false&&document.login["kind[]"][1].checked==false&&document.login["kind[]"][2].checked==false&&document.login["kind[]"][3].checked==false&&document.login["kind[]"][4].checked==false&&document.login["kind[]"][5].checked==false&&document.login["kind[]"][6].checked==false){
			alert("선택하지 않은 항목이 있습니다. ");
			document.login["kind[]"][0].focus();
			return false;
		}
		
		if(document.login["kind[]"][6].checked){
			if(!document.login["kind[]"][7].value) {
			alert("빈칸을 채워주시기 바랍니다. ");
			document.login["kind[]"][7].focus();
			return false;
			}
		}
		
		if(!document.login.solve.value) {
			alert("빈칸을 채워주시기 바랍니다. ");
			document.login.solve.focus();
			return false;
		}
		
		if(document.login.solve.value.length>400){
			alert("400자를 초과하였습니다.  ");
			document.login.solve.focus();
			return false;
		}
		
		if(document.login["good[]"][5].checked){
			if(!document.login["good[]"][6].value) {
			alert("빈칸을 채워주시기 바랍니다. ");
			document.login["good[]"][6].focus();
			return false;
			}
		}
		
	}



	</script>

<meta name="generator" content="Namo WebEditor(Trial)"></head>

<body vlink="blue" alink="blue" link="blue">
<form name="login" target="_self" method="post" onsubmit="return checking()" action="submit1.php">
    <table width="800" align="center" border="1" cellspacing="0" bordercolordark="white" bordercolorlight="black">
        <tr>
            <td height="150" width="800" background="img/title.jpg">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="800">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span><font face="맑은 고딕"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">1. 당신은 현재 대학교 몇 학년입니까?</span></font></b><font face="맑은 고딕"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white">1. </font></span></b><span style="font-size:10pt;"><input type="radio" name="grade[]" value="1" onclick="check1()" checked></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">1학년 &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input type="radio" name="grade[]" value="2" onclick="check1()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">2학년 &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span
style="font-size:10pt;"><input
type="radio" name="grade[]" value="3" onclick="check1()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">3학년 &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input
type="radio" name="grade[]" value="4" onclick="check1()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">4학년 &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input type="radio" name="grade[]" onclick="check1()" value="etc"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">기타 : </span></font><input type="text" name="grade[]" maxlength="10" size="20" style="font-family:'맑은 고딕'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span><font face="맑은 고딕"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">2. 당신은 대학 신입생 때 어떤 스트레스를 받으셨나요? </span></font><span style="font-size:11pt;"><font face="맑은 고딕" color="red">(여러 개&nbsp;선택가능)</font></span></b><font face="맑은 고딕"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white">2. </font></span></b><span style="font-size:10pt;"><font color="black"><input type="checkbox" name="kind[]" onclick="return check2()" value="1"></font></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">대학 수업 방식 때문에 이전(초/중/고)과는&nbsp;다르게 친구를 사귀기 어려움</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="2"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">중~고등학교와 다른 새로운 환경 부적응</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="3"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">대학 등록금으로 인한 부담감</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="4"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">통학/기숙사/자취에 관한 문제</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="5"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">알바나 취업 준비에 대한 부담감</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="6"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">선/후배간의 대인 관계</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="etc"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">기타 : </span></font><input type="text" name="kind[]" maxlength="40" size="80" style="font-family:'맑은 고딕'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800" height="144">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span><font face="맑은 고딕"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">3. 위에 선택한 스트레스를 해결하기 위해 당신이 한 일은 무엇입니까? </span></font><span style="font-size:11pt;"><font face="맑은 고딕" color="red">(글자 수 400자 제한)</font></span></b><font face="맑은 고딕"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white">1. </font></span></b><textarea name="solve" rows="5" style="font-family:'맑은 고딕'; font-size:9pt;" cols="100"></textarea><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span><font face="맑은 고딕"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">4. 위의 스트레스가 오히려 당신에게 도움을 주는 가장 긍정적인 면을 선택하세요.</span></font></b><font face="맑은 고딕"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white">2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="1" onclick="check3()" checked></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">사교성(대인 관계)을 더 키울 수 있다.</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="2" onclick="check3()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">앞으로 다른 환경에 대한 적응력을 더 키울 수 있다.</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="3" onclick="check3()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">돈에 대한 소중함을 깨달을 수 있다.</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="4" onclick="check3()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">자립심을 키울 수 있다.</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="5" onclick="check3()"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">취업에 대비해 자기 스팩(학점, 토익, 자격증 등)을 올릴 수 있다.</span></font><b><span style="font-size:11pt;"><font face="맑은 고딕" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" onclick="check3()" value="etc"></span><font face="맑은 고딕"><span style="font-size:10pt; line-height:20pt;">기타 : </span></font><input type="text" name="good[]" maxlength="40" size="80" style="font-family:'맑은 고딕'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="맑은 고딕" color="white">0</font></span></b></p>
            </td>
        </tr>
		        <tr>
            <td colspan="2" height="45" width="800">
                <p align="center"><span style="font-size:10pt;"><font face="맑은 고딕"><input type="submit" name="ok" value=" 제 출 " style="font-family:'맑은 고딕'; font-size:9pt;"></font></span> &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10pt;"><font face="맑은 고딕"><input type="button" name="cancel" value=" 취 소 " style="font-family:'맑은 고딕'; font-size:9pt;" onclick="javascript:location.href='main1.php'"></font></span></p>
            </td>
        </tr>
    </table>
</form>
</body>

</html>