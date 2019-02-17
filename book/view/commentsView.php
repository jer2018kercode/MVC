<?php $title = 'Comments view'; ?>
<?php ob_start(); ?>

<form action="index.php?action=hiUser&id=<?= $oneChap['id'] ?>" method="post">
    <div>
        <label for="user">User</label><br />
        <input type="text" id="user" name="user"><br />
    </div>
    <div>
        <label for="password">Password</label><br />
        <input type="password" id="psw" name="psw">
    </div>
    <div>
        <input type="submit" id="conf" name="conf" value="Confirm">
    </div>
</form>

    <p><strong><?= htmlspecialchars( $oneChap['title'] ) ?></strong>
    <p><?= nl2br( htmlspecialchars( $oneChap['content'] )) ?></p>

    <h1>Write a comment bellow! </h1>

<form action="index.php?action=addComment&id=<?= $oneChap['id'] ?>" method="post">
    <div class="comment">
        <label for="comment">Comment</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div class="comment">
        <input type="submit" value="Send" />
    </div>
</form>

<p><a href="index.php">Return</a></p>

<?php
    while( $comments = $allComs->fetch())
    {
?>
        <p class="right"><?= htmlspecialchars( $comments['content'] ) ?><br />
        <em><?= htmlspecialchars( $comments['creation_date'] ) ?></em></p>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>