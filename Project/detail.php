<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
$postJSON = file_get_contents('posts.json');
$posts = json_decode($postJSON, true);

$post_id = $_GET['post_id'];
$updated = false;
$rows = [];
$views = 0;

// Read all rows of the csv into $rows
// [post_id, count] May look like $rows = [
//   [0,1],
//   [1,1],
//   [2,1],...
// ]
// If a row for this post_id exists, increment the counter
// Save the view count
$fp = fopen('visitors.csv', 'r');
while (!feof($fp)) {
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

// Row for this post didn't exist, make new entry 
// start with views as 1 (first visit to this blog post)
// save the view count
if (!$updated) {
  $rows[] = [$post_id, 1];
  $views = 1;
}

// Rewrite the whole csv file
// using each sub-array in the 'rows' array
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Custom CSS for sticky footer */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
      /* Makes the main content take up the remaining space */
    }

    footer {
      flex-shrink: 0;
      /* Ensures the footer stays at the bottom */
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
      <p class="lead text-muted mt-4">Read below what our TechGeeks say!</p>
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
  <footer class="bg-white py-5">
    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
          <h2 class="fw-bold mb-4">Want to send us your message? Write below and click send.</h2>
          <form>
            <div class="position-relative">
              <input type="text" class="form-control rounded-pill py-3 px-4" id="email"
                placeholder="Hello team, keep up the good work!">
              <button class="btn btn-primary rounded-pill position-relative mt-2 btn-subscribe "
                type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <p class="text-center text-lg-start text-muted">
            Want to learn more about us? Please send us a message above.
          </p>
        </div>
        <div class="col-lg-6">
          <div class="row text-center text-lg-start">
            <div class="col-sm-4 mb-4 mb-sm-0">
              <h5 class="fw-bold mb-3">Services</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-secondary">Marketing</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Graphic Design</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">App Development</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Web Development</a></li>
              </ul>
            </div>
            <div class="col-sm-4 mb-4 mb-sm-0">
              <h5 class="fw-bold mb-3">About</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-secondary">About</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Careers</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">History</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Our Team</a></li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h5 class="fw-bold mb-3">Support</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-secondary">FAQs</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Contact</a></li>
                <li><a href="#" class="text-decoration-none text-secondary">Live Chat</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="border-top pt-4 mt-5">
      <div class=" text-muted text-center py-4 mt-5">
        <p class="mb-0">&copy; <?= date("Y") ?> Our Awesome Blog. All rights reserved.</p>
      </div>
      <div class="container">
        <p class="text-center text-muted small">
          Created by
          <a href="#" class="text-decoration-none text-secondary">Joey</a>,
          <a href="#" class="text-decoration-none text-secondary">Bhuwan</a> and
          <a href="#" class="text-decoration-none text-secondary">Sushant</a>.
        </p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qhvux0g5v0a4TToZ6TF9ClMNZcazOz5GqD82hK6Orbt9GzYl2h5djC5Exu3PHvJf"
    crossorigin="anonymous"></script>
</body>

</html>