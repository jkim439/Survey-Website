<?
session_start();

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// DB ����
$data = mysql_fetch_array(mysql_query("select * from member where no='$_SESSION[no]'",$dbconn));

// ���� Ȯ��
if(!$_SESSION[ip] || !$_SESSION[no] || !$_SESSION[ip]==$_SERVER[REMOTE_ADDR] || !$_SESSION[no]==$data[no]) {
sleep(4);
echo "<script>location.href='errmsg.php?msg=5&errcode=6133';</script>"; exit;
}

?>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>
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
			alert("��ĭ�� ä���ֽñ� �ٶ��ϴ�. ");
			javascript:document.login["grade[]"][5].focus();
			return false;
			}
		}

		if(document.login["kind[]"][0].checked==false&&document.login["kind[]"][1].checked==false&&document.login["kind[]"][2].checked==false&&document.login["kind[]"][3].checked==false&&document.login["kind[]"][4].checked==false&&document.login["kind[]"][5].checked==false&&document.login["kind[]"][6].checked==false){
			alert("�������� ���� �׸��� �ֽ��ϴ�. ");
			document.login["kind[]"][0].focus();
			return false;
		}
		
		if(document.login["kind[]"][6].checked){
			if(!document.login["kind[]"][7].value) {
			alert("��ĭ�� ä���ֽñ� �ٶ��ϴ�. ");
			document.login["kind[]"][7].focus();
			return false;
			}
		}
		
		if(!document.login.solve.value) {
			alert("��ĭ�� ä���ֽñ� �ٶ��ϴ�. ");
			document.login.solve.focus();
			return false;
		}
		
		if(document.login.solve.value.length>400){
			alert("400�ڸ� �ʰ��Ͽ����ϴ�.  ");
			document.login.solve.focus();
			return false;
		}
		
		if(document.login["good[]"][5].checked){
			if(!document.login["good[]"][6].value) {
			alert("��ĭ�� ä���ֽñ� �ٶ��ϴ�. ");
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
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span><font face="���� ���"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">1. ����� ���� ���б� �� �г��Դϱ�?</span></font></b><font face="���� ���"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white">1. </font></span></b><span style="font-size:10pt;"><input type="radio" name="grade[]" value="1" onclick="check1()" checked></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">1�г� &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input type="radio" name="grade[]" value="2" onclick="check1()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">2�г� &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span
style="font-size:10pt;"><input
type="radio" name="grade[]" value="3" onclick="check1()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">3�г� &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input
type="radio" name="grade[]" value="4" onclick="check1()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">4�г� &nbsp;&nbsp;&nbsp;&nbsp;</span></font><span style="font-size:10pt;"><input type="radio" name="grade[]" onclick="check1()" value="etc"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">��Ÿ : </span></font><input type="text" name="grade[]" maxlength="10" size="20" style="font-family:'���� ���'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span><font face="���� ���"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">2. ����� ���� ���Ի� �� � ��Ʈ������ �����̳���? </span></font><span style="font-size:11pt;"><font face="���� ���" color="red">(���� ��&nbsp;���ð���)</font></span></b><font face="���� ���"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white">2. </font></span></b><span style="font-size:10pt;"><font color="black"><input type="checkbox" name="kind[]" onclick="return check2()" value="1"></font></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">���� ���� ��� ������ ����(��/��/��)����&nbsp;�ٸ��� ģ���� ��ͱ� �����</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="2"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">��~����б��� �ٸ� ���ο� ȯ�� ������</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="3"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">���� ��ϱ����� ���� �δ㰨</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="4"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">����/�����/���뿡 ���� ����</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="5"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">�˹ٳ� ��� �غ� ���� �δ㰨</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="6"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">��/�Ĺ谣�� ���� ����</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="checkbox" name="kind[]" onclick="return check2()" value="etc"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">��Ÿ : </span></font><input type="text" name="kind[]" maxlength="40" size="80" style="font-family:'���� ���'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800" height="144">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span><font face="���� ���"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">3. ���� ������ ��Ʈ������ �ذ��ϱ� ���� ����� �� ���� �����Դϱ�? </span></font><span style="font-size:11pt;"><font face="���� ���" color="red">(���� �� 400�� ����)</font></span></b><font face="���� ���"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white">1. </font></span></b><textarea name="solve" rows="5" style="font-family:'���� ���'; font-size:9pt;" cols="100"></textarea><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span></b></p>
            </td>
        </tr>
        <tr>
            <td width="800">
                <p style="line-height:25pt; margin-right:10pt; margin-left:10pt;" align="left"><b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span><font face="���� ���"><span style="font-size:8pt;"><br>
</span><span style="font-size:11pt;">4. ���� ��Ʈ������ ������ ��ſ��� ������ �ִ� ���� �������� ���� �����ϼ���.</span></font></b><font face="���� ���"><span style="font-size:9pt;"><br>
</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white">2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="1" onclick="check3()" checked></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">�米��(���� ����)�� �� Ű�� �� �ִ�.</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="2" onclick="check3()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">������ �ٸ� ȯ�濡 ���� �������� �� Ű�� �� �ִ�.</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="3" onclick="check3()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">���� ���� �������� ������ �� �ִ�.</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="4" onclick="check3()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">�ڸ����� Ű�� �� �ִ�.</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" value="5" onclick="check3()"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">����� ����� �ڱ� ����(����, ����, �ڰ��� ��)�� �ø� �� �ִ�.</span></font><b><span style="font-size:11pt;"><font face="���� ���" color="white"><br>
2. </font></span></b><span style="font-size:10pt;"><input type="radio" name="good[]" onclick="check3()" value="etc"></span><font face="���� ���"><span style="font-size:10pt; line-height:20pt;">��Ÿ : </span></font><input type="text" name="good[]" maxlength="40" size="80" style="font-family:'���� ���'; font-size:9pt;" disabled><br>
<b><span style="font-size:8pt; line-height:25pt;"><font face="���� ���" color="white">0</font></span></b></p>
            </td>
        </tr>
		        <tr>
            <td colspan="2" height="45" width="800">
                <p align="center"><span style="font-size:10pt;"><font face="���� ���"><input type="submit" name="ok" value=" �� �� " style="font-family:'���� ���'; font-size:9pt;"></font></span> &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10pt;"><font face="���� ���"><input type="button" name="cancel" value=" �� �� " style="font-family:'���� ���'; font-size:9pt;" onclick="javascript:location.href='main1.php'"></font></span></p>
            </td>
        </tr>
    </table>
</form>
</body>

</html>