<?php require_once('../../../private/initialize.php'); ?>

<?php

$subject_set = subjectsPassQuery();

?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?php echo buildUrl('/staff/subjects/new.php') ?>">Create New Subject</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><?php echo $subject['id']; ?></td>
          <td><?php echo $subject['position']; ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo $subject['menu_name']; ?></td>
          <td><a class="action" href="<?php echo buildUrl('/staff/subjects/show.php?id=') . h(urlencode($subject['id'])) ?>">View</a></td>
          <td><a class="action" href="<?php echo buildUrl('/staff/subjects/edit.php?id=') . h(urlencode($subject['id'])) ?>">Edit</a></td>
          <td><a class="action" href="<?php echo buildUrl('/staff/subjects/delete.php?id=') . h(urlencode($subject['id'])) ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
    <?php mysqli_free_result($subject_set); ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>