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
	if (count(explode('/', $_GET['q'])) < 2) {
		$html = 'lack of parameters...';
		echo $html;
		exit();
	}
	// �����ʣ���ȡǰ�����ַ�
	if (substr($_GET['q'], 0, 2) == 'a/') {
		$html = file_get_contents('html/area.html');
		exit();
	// ������
	} else if (substr($_GET['q'], 0, 2) == 'p/') {
		echo 'post';
		exit();
	}
}
?>