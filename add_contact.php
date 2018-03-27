<?php

// ДОБАВЛЕНИЕ КОНТАКТА
$contact['add'] = array(array(
	'name' => $contact_name,                          // имя контакта
	'responsible_user_id' => AMO_RESPONSIBLE_USER_ID, // id ответственного
	'tags' => $amo_contact_tags,                      // тэги

	'custom_fields'=>array(
		array(
			'id' => AMO_PHONE_FIELD_ID,        // Телефон контакта
			'values' => array(array('value' => $contact_phone, 
                                   	'enum' => 'WORK')
			)
		),
		array(
			'id' => AMO_EMAIL_FIELD_ID,         // Почта контакта
			'values' => array(array('value' => $contact_email, 
                                    	'enum' => 'WORK')
			)
		 )

	)
));

// Формируем ссылку для запроса
unset( $curldata );
$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/contacts';
$curldata['postfields'] = $contact;
$Response = amoCRMCurl($curldata);

$contact_ids = array();
    if($Response) {
	   $contacts = $Response['_embedded']['items'];
	   foreach($contacts as $key => $value) {
		      $contact_ids[] = $value['id'];
	}
}

?>
