<?php
/**
* ���з��ʵ����
*/
// �����ļ�
require('config/config.php');
// ģ��
require('kagari/template.php');

// δ�ύ�κ�GET��������Ϊ������ҳ

if (!isset($_GET) || empty($_GET)) {
	$html = file_get_contents("html/index.html");
	$html = Template::replace($html);
	echo $html;
	exit();
}

if (isset($_GET)) {
	print_r($_GET);
}
?>