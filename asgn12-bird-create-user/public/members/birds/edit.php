<?php require_once('../private/initialize.php');?>
<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
if(!isset($_GET['id']))
  redirect_to(url_for('/birds.php'));
$id = $_GET['id'];
$bird = bird::find_by_id($id);
if($bird == false)
  redirect_to(url_for('/birds.php'));

if(is_post_request()) {
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save();

if($result === true) {
  $_SESSION['message'] = 'The bird was updated successfully.';
  redirect_to(url_for('/detail.php?id=' . $id));
  }
}
?>

<a href="<?php echo url_for('/birds.php');?>">Back to list of birds</a>

<h1>Edit a bird</h1>

<?php echo display_errors($bird->errors); ?>

<form action="<?php echo url_for('/edit.php?id=' . h(u($id)));?>" method="post">
<?php include('form_fields.php'); ?>
<input type="submit" value="Edit Bird" />
</form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
