<?php if ($posts): ?>

	<?php foreach ($posts as $post): ?>

		<h2><a href="post/<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>

		<p><?= $post['body'] ?></p>

	<?php endforeach ?>

<?php else: ?>

	<p>No Posts Yet.</p>

<?php endif ?>