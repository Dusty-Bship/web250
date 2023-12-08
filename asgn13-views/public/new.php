<?php

require_once('../private/initialize.php');
require_login();

/* 
  Use the birds/staff/new.php file as a guide 
  so your file mimics the same functionality.
  Be sure to include the display_errors() function.
*/

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bird'];

  $bird = new Bird($args);
  $result = $bird->save();
  
  if($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $bird = new Bird();
}

?>

<?php $page_title = 'Create bird' ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <a href="birds.php">Back to Inventory</a>
  <h1>Create Bird</h1>

  <?php echo display_errors($bird->errors); ?>

  <form action="<?php echo url_for('new.php'); ?>" method="post">

    <?php include('form_fields.php'); ?>
    
      
    <input type="submit" value="Create Bird">
  </form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
