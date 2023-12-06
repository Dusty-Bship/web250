<?php

require_once('../../../private/initialize.php');
//require_login();

if(is_post_request()) {

  $args = $_POST['user'];
  $user = new Members($args);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $session->message('The member was created successfully.');
    redirect_to(url_for('/members/admins/show.php?id=' . $new_id));
  } elseif(!has_unique_username($user->username, $user->id ?? 0)) {
    $user->errors[] = "Username is already taken. Try another.";
  }

} else {
  // display the form
  $user = new Members;
}

?>

<?php $page_title = 'Create member'; ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/members/admins/index.php'); ?>">&laquo; Back to List</a>
  <div class="member new">
    <h1>Create member</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/members/admins/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create member" />
      </div>
    </form>
  </div>
</div>

