<?php

namespace Librevlad\Csv\Tests;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase {

	public function testBasicApi() {
		$this->assertEquals( 1, 1 );

		$data = [
			[
				'first_name' => 'Petro',
				'patronymic' => 'Oleksiiovich',
				'last_name'  => 'Poroshenko',
			],
			[
				'last_name'  => 'Kravchuk',
				'first_name' => 'Leonid',
			],
			[
				'first_name' => 'Leonid',
				'patronymic' => 'Danylovych',
				'last_name'  => 'Kuchma',
			],
		];

		fsavecsv( 'presidents.csv', $data );

	}

}
