<?php
$posts = [
  [
    'title' => 'Exploring the Future of AI',
    'content' => 'Artificial Intelligence (AI) is rapidly transforming industries. From healthcare to finance, AI is revolutionizing the way we live and work. This blog post explores the advancements in AI and what the future holds for this groundbreaking technology.',
    'author' => 'Joseph Ampfer',
    'date' => 'January 22, 2024',
    'image' => 'Joey.jpeg'
  ],
  [
    'title' => 'The Ultimate Guide to Web Development',
    'content' => 'Web development has become an essential skill in today’s digital world. Whether you are building a personal website or a large-scale business platform, this guide covers all the key aspects of modern web development including HTML, CSS, JavaScript, and more.',
    'author' => 'Bhuwan Bhandari',
    'date' => 'January 22, 2024',
    'image' => 'Bhuwan.jpg'
  ],
  [
    'title' => 'Top 10 Healthy Lifestyle Tips',
    'content' => 'Living a healthy lifestyle doesn’t have to be complicated. In this post, we share the top 10 tips for staying healthy, including diet, exercise, and mental well-being strategies that anyone can follow.',
    'author' => 'Sushant Dahal',
    'date' => 'January 22, 2024'
  ]
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Titles:</h1>
  <?php foreach ($posts as $key => $post) {
    $isEven = $key % 2 == 0;
    ?>
    <div class="container text-center my-4">
      <div class="row <?= $isEven ? '' : 'flex-row-reverse' ?>">
        <div class="col-md-6 <?= $isEven ? 'offset-md-0' : 'offset-md-6' ?>">
          <div class="card mb-3 shadow" style="max-width: 800px; background-color: #f8f9fa; border-radius: 25px;">
            <div class="row g-0">
              <div class="col-md-4 d-flex flex-column justify-content-center align-items-center p-3">
                <img src="./images/<?= $post['image'] ?>" class="img-fluid rounded-circle shadow"
                  style="width: 100px; height: 100px;" alt="...">
                <h3 class="mt-2" style="font-size: 1.1rem; font-family: 'Arial, sans-serif';">
                  <?= $post['author'] ?>
                </h3>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title text-primary"><?= $post['title'] ?></h5>
                  <p class="card-text text-muted" style="font-size: 0.95rem;"><?= $post['content'] ?></p>
                  <p class="card-text"><small class="text-body-secondary"><?= $post['date'] ?></small></p>
                  <a href="<?= "detail.php?post_id=" . $key ?>" style="text-decoration: none;">
                    Find out more
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</body>

</html>