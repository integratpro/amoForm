<?php
//******** Реквизиты доступа к amoCRM и другие настройки ********//

/**
 * =========================
 *    Настройки amoCRM
 * =========================
 **/
// Аккаунт - поддомен, (до .amocrm.ru)
define(AMO_SUBDOMAIN, 'testingintegrat'); 

// Реквизиты для авторизации
$amo_user=array(
	'USER_LOGIN'=>'****@mail.ru', 			// Логин (электронная почта)
	'USER_HASH'=>'******' // Хэш для доступа к API
);


// Системные поля (id)
define(AMO_PHONE_FIELD_ID, 486751);			// Телефон. Варианты: WORK, WORKDD, MOB, FAX, HOME, OTHER
define(AMO_EMAIL_FIELD_ID, 486753); 			// Email. Варианты: WORK, PRIV, OTHER

// ID некоторых пользовательских полей

//define(AMO_WHERE_FROM_FIELD_ID, 378859); 		// Откуда этот лид
//define(AMO_WHERE_FROM_FIELD_VALUE, 818097); 		// Откуда этот лид [enum] => 818097, для списка

/**
 * =========================
 *    Настройки для сайта
 * =========================
 **/

define(AMO_RESPONSIBLE_USER_ID, 2224033); 		// id ответственного по сделке, контакту, компании
define(AMO_LEAD_STATUS_ID, 18643777); 			// id этапа воронки, куда помещать сделку
define(AMO_TASK_TIME, strtotime('+1hours'));		// задача поставленная на час

/**
 * ============================================
 *    Передаваемые данные (тянуть с формы)
 * ============================================
 **/

$contact_name = $_POST['name'];	        //имя контакта
$contact_phone = $_POST['phone'];	//проверить валидность!
$contact_email = $_POST['email']; 	//почта контакта
$amo_lead_name = 'Заявка с сайта'; 	// 'Заявка на'.$formname;
$amo_contact_tags = 'тег1,тег2';   	// или id тега из amoCRM


//UTM-метки
//подтягивать с сайта, либо так
/*
$url_utm =  $_SERVER["HTTP_REFERER"];
parse_str( parse_url( $url_utm, PHP_URL_QUERY ) );
*/

?>
