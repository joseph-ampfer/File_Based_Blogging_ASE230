<?php
$posts = [
  [
    'title' => 'Title 1',
    'content' => '',
    'author' => '',
    'date' => ''
  ],
  [
    'title' => 'Title 2',
    'content' => '',
    'author' => '',
    'date' => ''
  ],
  [
    'title' => 'Title 3',
    'content' => '',
    'author' => '',
    'date' => ''
  ],
  [
    'title' => 'Title 4',
    'content' => '',
    'author' => '',
    'date' => ''
  ],

]

?>

<!DOCTYPE html>
<html lang="en">
  <head></head>
  <body>
    <h1>Titles:</h1>
    <?php foreach($posts as $key => $post) { ?>
      <h3><a href=<?= "detail.php?post_id=".$key ?>><?= $post['title'] ?></a></h3>
    <?php } ?>
    
  </body>
</html>