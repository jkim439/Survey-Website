<?
session_start();

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// ���� Ȯ��
if(!$_SESSION[ip] || !$_SESSION[admin] || !$_SESSION[ip]==$_SERVER[REMOTE_ADDR]) {
sleep(4);
echo "<script>alert('������ ��忡 ���� �����ϼ̽��ϴ�. ');location.href='admin_index.php';</script>"; exit;
}

// ������ ��Ī
if($_SESSION[admin]==1) { $admin_name='�ְ�'; }
if($_SESSION[admin]==2) { $admin_name='�Ϲ�'; }

?>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr">
	<title>�¶��� �������� �ý���</title>

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
                <p style="line-height:20pt; margin-right:10pt; margin-left:10pt;" align="left"><span style="font-size:9pt;"><b><font face="���� ���" color="red"><?=$admin_name?> ������ ���</font></b></span><font face="���� ���"><span style="font-size:9pt;"><b>�� �����ϼ̽��ϴ�.<br>
</b></span></font><font face="���� ���"><span style="font-size:9pt;"><b>���Ͻô� ������ ���� �޴��� �����Ͻʽÿ�.</b></span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
                <p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="���� ���" color="blue">�������� ���</font></a></span></b></p>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="���� ���"><span style="font-size:10pt;">���������� ����� �ǽð����� Ȯ���մϴ�.</span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
                <p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="���� ���" color="blue">������ȣ ����</font></a></span></b></p>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="���� ���"><span style="font-size:10pt;">������ȣ�� ���� �����մϴ�.</span></font></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
			<?if($_SESSION[admin]==1) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="���� ���" color="blue">������ȣ ����</font></a></span></b></p><?}?><?if($_SESSION[admin]==2) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><font face="���� ���" color="#999999">������ȣ ����</font></span></b></p><?}?>

            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="���� ���"><span style="font-size:10pt;">������ ������ȣ�� �����մϴ�.</span></font><span style="font-size:10pt;"><font face="���� ���" color="red"> (�ְ� ������ ����)</font></span></p>
            </td>
        </tr>
        <tr>
            <td height="45" width="200">
<?if($_SESSION[admin]==1) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><a href="http://kjh202.dothome.co.kr/phpmyadmin/" target="_blank"><font face="���� ���" color="blue">�����ͺ��̽� ����</font></a></span></b></p><?}?><?if($_SESSION[admin]==2) {?><p style="margin-right:10pt; margin-left:10pt;"><b><span style="font-size:12pt;"><font face="���� ���" color="#999999">�����ͺ��̽� ����</font></span></b></p><?}?>
            </td>
            <td width="591" height="45">
                <p style="margin-right:10pt; margin-left:10pt;"><font face="���� ���"><span style="font-size:10pt;">�����ͺ��̽��� ���� �����մϴ�.</span></font><span style="font-size:10pt;"><font face="���� ���" color="red"> (�ְ� ����������)</font></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="45" width="795">
                <p align="center"> <span style="font-size:10pt;"><font face="���� ���"><input type="button" name="logout" value=" �α׾ƿ� " style="font-family:'���� ���'; font-size:9pt;" onclick="javascript:location.href='admin_logout.php'"></font></span></p>
            </td>
        </tr>
    </table>
</form>
</body>

</html>