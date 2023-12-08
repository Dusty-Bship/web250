<?php

require_once('../private/initialize.php');

require_login();

/* 
  Use the bicycles/staff/edit.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/

if(!isset($_GET['id'])) {
  redirect_to('birds.php');
 }

$id = $_GET['id'];

 // Find bird using ID
 $bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to('birds.php');
}

// Checking for Post Request
if(is_post_request()) {

  $args = $_POST['bird'];

  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('show.php?id=' . $id));
  } else {
    // show errors
  }

} else {
  // Display form
}


?>


<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<a href="birds.php">Back to Bird List</a>

<h1>Edit Bird</h1>

<?php echo display_errors($bird->errors); ?>

<form action="<?php echo url_for('edit.php?id=' . h(u($id))); ?>" method="post">

  <?php include('form_fields.php'); ?>
  
  <input type="submit" value="Edit Bird" />
</form>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
