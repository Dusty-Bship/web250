<?php

require_once('../private/initialize.php');

require_login();

/* 
  Use the bicycles/staff/delete.php file as a guide 
  so your file mimics the same functionality.
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

    // Delete bird
    $result = $bird->delete();
    $_SESSION['message'] = 'The bird was deleted successfully.';
    redirect_to('birds.php');
  
  } else {
    // Display form
  }

?>

<?php $page_title = 'Delete' . $bird->common_name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <a href="birds.php">Back to Bird List</a>
  <h1>Delete Bird</h1>
  <p>Are you sure you want to delete this bird?</p>
  <p><?php echo h($bird->common_name); ?></p>

  <form action="<?php echo url_for('delete.php?id=' . h(u($id))); ?>" method="post">
    <input type="submit" name="commit" value="Delete Bird" />
  </form>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
