<?php if ($posts): ?>

	<?php foreach ($posts as $post): ?>

		<h2><?= $post['title'] ?></h2>

		<p><?= $post['body'] ?></p>

	<?php endforeach ?>

<?php else: ?>

	<p>No Posts Yet.</p>

<?php endif ?>