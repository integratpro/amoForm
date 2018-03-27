<?php

// Добавляем примечание
$note['add'] = array (
	array(
   		 'element_id' => current($contact_ids),
     		 'element_type' => '1',
    		 'text' =>  "Данные с формы: \n
			             Имя : ". $contact_name."\n 
                         Телефон : ". $contact_phone."\n 
		                 Почта : ". $contact_email,  
    		 'note_type' => '4',		
      		 'responsible_user_id' => $responsible_user_id,
    )
);

unset( $curldata );
$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/notes';
$curldata['postfields'] = $note;
$Response = amoCRMCurl($curldata);

// Добавляем задачу
$task['add'] = array (
	array(
		'name => $contact_name',
		'responsible_user_id' => $responsible_user_id,
		'element_type' => 1,
		'element_id' => current($contact_ids),
		'text' => 'Повторное обращение',
		'complete_till' => AMO_TASK_TIME,	// в течение какого времени выполнить
		'task_type' => 1
			)
		);	

unset( $curldata );
$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/tasks';
$curldata['postfields'] = $task;
$Response = amoCRMCurl($curldata);

?>