<?php

// ДОБАВЛЯЕМ СДЕЛКУ
$leads['add']=array(
	array(
		'name' => $amo_lead_name,
		'status_id' => AMO_LEAD_STATUS_ID,	    	  //id статуса
		'responsible_user_id' => AMO_RESPONSIBLE_USER_ID, //id ответственного по сделке
		'tags' => 'Заявка с сайта', #Теги		  // Если присвоить новые теги, то перечислите их через запятую.
							          // Если необходимо прикрепить существующие теги, передавайте массив их id
		
		'contacts_id' => $contact_ids, 	                  // Прикрепляем существующий(ие) контакт(ы) в виде массива

		'custom_fields'=>array(
			// любые поля в карточке сделки 
			array(
				'id'=>163901, // source
				'values'=>array(array('value'=>$source))
			),
			array(
				'id'=>163903, // medium
				'values'=>array(array('value'=>$medium))
			),
			array(
				'id'=>163905, // campaign
				'values'=>array(array('value'=>$campaign))
			),
			array(
				'id'=>163907, // content
				'values'=>array(array('value'=>$content))
			)
		)
	)
);

unset( $curldata );

$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/leads';
$curldata['postfields'] = $leads;
$Response = amoCRMCurl($curldata);


?>
