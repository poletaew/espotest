<?php

namespace Espo\Modules\Test\Controllers;

class Test extends \Espo\Core\Controllers\Base
{
	public function actionSendEmail($params, $data) {
		return [
			'success' => mail(
				$data['email'],
				'Привет для Skyeng!',
				'Тело тестового сообщения'
			)
		];
	}
}