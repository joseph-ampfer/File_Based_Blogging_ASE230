<?php

$postJSON = file_get_contents('posts.json');
$posts = json_decode($postJSON, true);

$post_id = $_GET['post_id'];
$updated = false;
$rows = [];
$views = 0;

$fp = fopen('visitors.csv', 'r');
while(!feof($fp)) {
  $line = fgetcsv($fp, 0, ';');
  if ($line) {
    if ($line[0] == $post_id) {
      $line[1]++;
      $views = $line[1];
      $updated = true;
    }
    $rows[] = $line;
  }
}
fclose($fp);

if (!$updated) {
  $rows[] = [$post_id, 1];
  $views = 1;
}

$fp = fopen('visitors.csv', 'w+');
foreach ($rows as $row) {
  fputcsv($fp, $row, ';');
}
fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Awesome Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Custom CSS for sticky footer */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1; /* Makes the main content take up the remaining space */
    }
    footer {
      flex-shrink: 0; /* Ensures the footer stays at the bottom */
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <!-- Blog Header -->
  <header class="blog-header py-5 text-center">
    <div class="container">
      <h1 class="display-4 fw-bold">Our Awesome Blogs</h1>
      <p class="lead text-muted">Exploring the world of technology, one post at a time</p>
      <div class="mt-4">
        <a href="index.php" class="btn btn-primary me-2">Latest Posts</a>
        <a href="#" class="btn btn-outline-secondary">About Us</a>
      </div>
      <p class="lead text-muted mt-4">Read below what out TechGeeks say!</p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mt-5 flex-1">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <article class="mb-4">
          <header class="mb-3">
            <h1 class="display-4"><?= $posts[$post_id]['title'] ?></h1>
            <p class="text-muted">by <?= $posts[$post_id]['author'] ?> | <?= $posts[$post_id]['date'] ?></p>
          </header>
          <section>
            <p class="lead"><?= $posts[$post_id]['full-content'] ?></p>
          </section>
        </article>
        <div>
          <h3>Views: <?= $views ?> </h3>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-5 ">
    <div class="container">
      <p class="mb-0">&copy; <?= date("Y") ?> Our Awesome Blog. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qhvux0g5v0a4TToZ6TF9ClMNZcazOz5GqD82hK6Orbt9GzYl2h5djC5Exu3PHvJf" crossorigin="anonymous"></script>
</body>
</html>
