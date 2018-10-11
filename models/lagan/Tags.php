<?php

namespace Lagan\Model;

/**
 * Post Tag
 */

class Tags extends \Lagan\Lagan {

	function __construct() {
		$this->type = 'tags';

		// Description in admin interface
		$this->description = 'Post tags.';

		$this->properties = [
			// Always have a title
			[
				'name' => 'title',
				'description' => 'Name',
				'required' => true,
				'searchable' => true,
				'type' => '\Lagan\Property\Str',
				'input' => 'text',
				'validate' => 'minlength(2)'
			],
			[
				'name' => 'post',
				'description' => 'Post',
				'type' => '\Lagan\Property\Manytomany',
				'input' => 'tomany'
			]
		];
	}

}