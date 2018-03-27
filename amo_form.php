<?php
header("Content-Type: text/html; charset=utf-8");

// Точка входа
$root = __DIR__ . DIRECTORY_SEPARATOR;

// Подготовка данных
require $root.'config.php';
require $root.'functions.php';

// Авторизация
	unset( $curldata );
	$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/private/api/auth.php?type=json';
	$curldata['postfields'] = $amo_user;
	$Response = amoCRMCurl($curldata);

	unset( $curldata);
	$contact_phone = cleanPhoneNumber($contact_phone); // 'чистка' номера от символов

// Поиск контакта по телефону
	$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/contacts/?query='.substr($contact_phone, -10, 10);
	$Response = amoCRMCurl($curldata);

	if($Response) {
		$contacts = $Response['_embedded']['items'];
		$responsible_user_id =  $Response['_embedded']['items'][0]['responsible_user_id']; //ответственный по контакту при дубле

	foreach($contacts as $key => $value) {
		$contact_ids[] = $value['id'];
	}
	require $root.'add_task.php';		  	   // Задача + примечание на контакт
	} else {

// Телефон не найден, ищем по e-mail
	unset( $curldata );
	$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/contacts?query='.$contact_email;
	$Response = amoCRMCurl($curldata);
        
	if($Response) {
		$contacts = $Response['_embedded']['items'];
		$responsible_user_id =  $Response['_embedded']['items'][0]['responsible_user_id']; //ответственный по контакту при дубле

		foreach($contacts as $key => $value) {
			$contact_ids[] = $value['id'];
		}
		require $root.'add_task.php';

	 } else {	

// Контакт не был найден ни по телефону, ни по адресу почты
// Добавляем новый + сделка
		require('add_contact.php');
		require('add_lead.php');
	}
}

?>
