<?php

/**
 * The public routes.
 *
 * You can put the routes to your public pages usign your own Twig templates here.
 * Put your templates in the templates/piblic directory.
 */

$app->get('/', function ($request, $response, $args) {
	$post = new \Lagan\Model\Post;
	$tags = new \Lagan\Model\Tags;

	// Show list of Posts
	return $this->view->render(
		$response,
		'public/posts/index.html',
		[
			'posts' => $post->read(),
			'tags' => $tags->read()
		]
	);
})->setName('home');

// Show single blog post
$app->get('/posts/{id}', function ($request, $response, $args) {
	$post = new \Lagan\Model\Post;
	$tags = new \Lagan\Model\Tags;

	// Show list of Posts
	return $this->view->render(
		$response,
		'public/posts/show.html',
		[
			'post' => $post->read($args['id']),
			'tags' => $tags->read()
		]
	);
})->setName('showpost');

// Show one Hoverkraft
$app->get('/posts/tags/{tag}', function ($request, $response, $args) {
	$tags = new \Lagan\Model\Tags;

	return $this->view->render(
		$response,
		'public/posts/index.html',
		[
			'posts' => $tags->read($args['tag'], 'title')['post'],
			'tags' => $tags->read(),
			'tag' => $args['tag']
		]
	);
})->setName('showpostswithtag');

// Add
$app->post('/posts/{id}/comments', function ($request, $response, $args) {
	$comment = new \Lagan\Model\Comment;
	$data = $request->getParsedBody();

	try {
		$comment->create( $data );

		return $response->withStatus(302)->withHeader(
			'Location',
			$this->get('router')->pathFor( 'showpost', [ 'id' => $args['id'] ] )
		);
	} catch (Exception $e) {
		echo $e;
	}
})->setName('createcomment');

?>