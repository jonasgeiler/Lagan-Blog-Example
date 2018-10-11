<?php

namespace Lagan\Model;

/**
 * Blog Posts
 */

class Post extends \Lagan\Lagan {

	function __construct() {
		$this->type = 'post';

		// Description in admin interface
		$this->description = 'Blog posts.';

		$this->properties = [
			// Always have a title
			[
				'name' => 'title',
				'description' => 'Title',
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
				'input' => 'trumbowyg'
			],
			[
				'name' => 'comment',
				'description' => 'Comments',
				'type' => '\Lagan\Property\Onetomany',
				'input' => 'tomany'
			],
			[
				'name' => 'tags',
				'description' => 'Tags',
				'type' => '\Lagan\Property\Manytomany',
				'input' => 'tomany'
			]
		];
	}

}