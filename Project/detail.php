<?php
$posts = [
  [
    'title' => 'The Future of Artificial Intelligence: What to Expect in the Next Decade',
    'content' => 'Artificial intelligence (AI) is evolving at an unprecedented pace. Over the next decade, we can expect significant advancements in machine learning, natural language processing, and computer vision. From autonomous vehicles to personalized healthcare, AI will continue to revolutionize various industries. In this blog, we explore the top trends and predictions for AI in the coming years.',
    'author' => 'Jane Doe',
    'date' => '2024-09-15'
  ],
  [
    'title' => '10 Tips for a Successful Remote Work Environment',
    'content' => 'With remote work becoming more prevalent, creating a productive and healthy work environment at home is crucial. Here are 10 practical tips to help you stay focused, organized, and motivated while working remotely. From setting up a dedicated workspace to managing your time effectively, these strategies will help you thrive in a remote work setting.',
    'author' => 'John Smith',
    'date' => '2024-08-20'
  ],
  [
    'title' => 'The Ultimate Guide to Sustainable Living',
    'content' => 'Sustainable living is more than just a trend—it\'s a lifestyle choice that can have a positive impact on the planet. In this comprehensive guide, we cover everything from reducing waste and conserving energy to choosing eco-friendly products and supporting sustainable brands. Start your journey towards a more sustainable lifestyle today!',
    'author' => 'Emily Johnson',
    'date' => '2024-07-05'
  ],
  [
    'title' => 'Exploring the World’s Most Underrated Travel Destinations',
    'content' => 'While popular tourist spots often steal the spotlight, there are many underrated destinations around the world that offer unique experiences without the crowds. From hidden gems in Europe to off-the-beaten-path adventures in Asia, we highlight some of the best-kept secrets in travel. Discover new places to add to your bucket list!',
    'author' => 'Michael Brown',
    'date' => '2024-06-18'
  ],
];


$post_id = $_GET['post_id'];

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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Our Awesome Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

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
            <p class="lead"><?= $posts[$post_id]['content'] ?></p>
          </section>
        </article>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-5 ">
    <div class="container">
      <p class="mb-0">&copy; <?= date("Y") ?> Our Awesome Blog. All rights reserved.</p>
      <!-- <p class="small">Follow us on 
        <a href="#" class="text-white">Twitter</a>, 
        <a href="#" class="text-white">Facebook</a>, and 
        <a href="#" class="text-white">Instagram</a>.
      </p> -->
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qhvux0g5v0a4TToZ6TF9ClMNZcazOz5GqD82hK6Orbt9GzYl2h5djC5Exu3PHvJf" crossorigin="anonymous"></script>
</body>
</html>
