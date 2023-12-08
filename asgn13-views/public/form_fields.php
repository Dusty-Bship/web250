<?php

/* 
  Use the bicycles/staff/form_fields.php file as a guide 
  so your file mimics the same functionality.
 
*/
if(!isset($bird)) {
  redirect_to('birds.php');
}
?>

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name)?>"></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat)?>"></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food)?>"></dd>
</dl>

<!-- $conservation_id -->
<dl>
  <dt>Conservation</dt>
  <dd>
    <select name="bird[conservation_id]">
      <option value=""></option>
      <?php foreach(Bird::CONSERVATION_OPTIONS as $cons_id => $cons_name) { ?>
      <option value="<?php echo $cons_id; ?>" <?php if($bird->conservation_id == $cons_id) {echo ' selected'; } ?>><?php echo $cons_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><input type="text" name="bird[backyard_tips]" value="<?php echo h($bird->backyard_tips)?>"></dd>
</dl>