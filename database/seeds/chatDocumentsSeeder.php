<?php

use Illuminate\Database\Seeder;

class chatDocumentsSeeder extends Seeder {

	public function run() {

		$chats = [

			['texto'          => 'Test desde seeder para chat',
				'documento_id'   => 1,
				'status_id'      => 1,
				'user_send_id'   => 2,
				'user_recibe_id' => 1
			],

			['texto'          => 'recibido tu mensaje desde el seeder',
				'documento_id'   => 1,
				'status_id'      => 1,
				'user_send_id'   => 1,
				'user_recibe_id' => 2
			],

			['texto'          => 'Otro Texto desde el seeder',
				'documento_id'   => 2,
				'status_id'      => 1,
				'user_send_id'   => 1,
				'user_recibe_id' => 2
			],

			['texto'          => 'recibido tu mensaje desde el seeder2',
				'documento_id'   => 2,
				'status_id'      => 1,
				'user_send_id'   => 2,
				'user_recibe_id' => 1
			]

		];

		foreach ($chats as $chat) {
			App\Models\chat_docts::create($chat);
		}
	}
}
