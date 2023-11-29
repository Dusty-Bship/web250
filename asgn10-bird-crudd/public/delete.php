<?php
require_once('../private/initialize.php');
$page_title = 'Delete A Bird';
include(SHARED_PATH . '/public_header.php');
?>


<?php
if(!isset($_GET['id'])) {
  redirect_to(url_for('/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('/birds.php'));
}
if(is_post_request()) {
  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted.';
  redirect_to(url_for('/birds.php'));
}
?>

<a href="<?php echo url_for('/birds.php');?>">Back to list of birds</a>

<h1>Delete a bird</h1>
<p>Are you sure you want to delete this bird?</p>
<p class="item"><?php echo h($bird->common_name); ?></p>

<form action="<?php echo url_for('/delete.php?id=' . h(u($id))); ?>" method="post">
<input type="submit" name="commit" value="Delete Bird" />

<?php include(SHARED_PATH . '/public_footer.php'); ?>
