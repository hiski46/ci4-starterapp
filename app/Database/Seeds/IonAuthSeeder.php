<?php

namespace App\Database\Seeds;

/**
 * @package CodeIgniter-Ion-Auth
 */

class IonAuthSeeder extends \CodeIgniter\Database\Seeder
{
	/**
	 * Dumping data for table 'groups', 'users, 'users_groups'
	 *
	 * @return void
	 */
	public function run()
	{
		$config = config('IonAuth\\Config\\IonAuth');
		$this->DBGroup = empty($config->databaseGroupName) ? '' : $config->databaseGroupName;
		$tables        = $config->tables;
		$this->db->transStart();
		$groups = [
			[
				'name'        => 'admin',
				'description' => 'Administrator',
			],
			[
				'name'        => 'members',
				'description' => 'General User',
			]
		];
		$this->db->table($tables['groups'])->insertBatch($groups);

		$img = [
			[
				'small' 	=> 'default.png',
				'medium' 	=> 'default.png',
				'large' 	=> 'default.png',
			]
		];
		$this->db->table('image')->insertBatch($img);

		$users = [
			[
				'ip_address'              => '127.0.0.1',
				'username'                => 'administrator',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'admin@admin.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'first_name'              => 'Admin',
				'last_name'               => 'istrator',
				'company'                 => 'ADMIN',
				'phone'                   => '0',
				'img' => 1
			]
		];
		$this->db->table($tables['users'])->insertBatch($users);

		$usersGroups = [
			[
				'user_id'  => '1',
				'group_id' => '1',
			],
			[
				'user_id'  => '1',
				'group_id' => '2',
			]
		];
		$this->db->table($tables['users_groups'])->insertBatch($usersGroups);
		$this->db->transComplete();
	}
}
