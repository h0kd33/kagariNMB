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
	$html = Template::index('index.html');
	$html = Template::replace($html);
	echo $html;
	exit();
}

if (isset($_GET)) {
	if (count(explode('-', $_GET['q'])) < 2) {
		$html = 'lack of parameters...';
		echo $html;
		exit();
	}
	// �����ʣ���ȡǰ�����ַ�
	if (substr($_GET['q'], 0, 2) == 'a-') {
		$html = Template::index('area.html');
		$html = Template::replace($html);
		echo $html;
		exit();
	// ������
	} else if (substr($_GET['q'], 0, 2) == 'p-') {
		echo 'post';
		exit();
	// ͼƬ����
	} else if (substr($_GET['q'], 0, 2) == 'i-') {
		
	}
}
?>