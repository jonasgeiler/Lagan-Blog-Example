<?php

namespace Lagan\Model;

/**
 * Post Comments
 */

class Comment extends \Lagan\Lagan {

	function __construct() {
		$this->type = 'comment';

		// Description in admin interface
		$this->description = 'Post comments.';

		$this->properties = [
			// Always have a title
			[
				'name' => 'title',
				'description' => 'Username',
				'required' => true,
				'searchable' => true,
				'type' => '\Lagan\Property\Str',
				'input' => 'text',
				'validate' => 'minlength(2)'
			],
			[
				'name' => 'body',
				'description' => 'Body',
				'required' => true,
				'searchable' => true,
				'type' => '\Lagan\Property\Str',
				'input' => 'textarea'
			],
			[
				'name' => 'post',
				'description' => 'Post',
				'type' => '\Lagan\Property\Manytoone',
				'input' => 'manytoone'
			]
		];
	}

}