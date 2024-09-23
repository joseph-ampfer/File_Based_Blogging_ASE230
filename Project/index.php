<?php

$postJSON = file_get_contents('posts.json');
$posts = json_decode($postJSON, true);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .card-gradient {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 8px;
      background: linear-gradient(to right, #86efac, #3b82f6, #a855f7);
    }

    .btn-subscribe {
      right: 8px;
      top: 50%;
      transform: translateY(-50%);
    }
  </style>

</head>

<body>
  <!-- Blog Header -->
  <header class="blog-header py-5 text-center">
    <div class="container">
      <h1 class="display-4 fw-bold">Our Awesome Blogs</h1>
      <p class="lead text-muted">Exploring the world of technology, one post at a time</p>
      <div class="mt-4">
        <a href="#" class="btn btn-primary me-2">Latest Posts</a>
        <a href="#" class="btn btn-outline-secondary">About Us</a>
      </div>
      <p class="lead text-muted mt-4">Read below what out TechGeeks say!</p>
    </div>
  </header>
  <?php foreach ($posts as $key => $post) {
    $isEven = $key % 2 == 0;
    ?>
    <div class="container my-4">
      <div class="row <?= $isEven ? '' : 'flex-row-reverse' ?>">
        <div class="col-md-6 <?= $isEven ? 'offset-md-0' : 'offset-md-6' ?>">
          <div class="card position-relative shadow rounded " style="max-width: 800px; border-radius: 30px;">
            <div class="card-gradient"></div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-9">
                  <h3 class="card-title h4 fw-bold"><?= $post['title'] ?></h3>
                  <p class="mt-1 text-muted small">By <?= $post['author'] ?></p>
                </div>
                <div class="col-sm-3 d-none d-sm-block">
                  <img src="./images/<?= $post['image'] ?>" alt="" class="img-fluid rounded-circle shadow-sm"
                    style="width: 70px; height: 70px; object-fit: cover;">
                </div>
              </div>
              <p class="card-text small text-muted mt-3">
                <?= $post['content'] ?>
              </p>
              <div class="mt-4 d-flex gap-4">
                <div>
                  <dt class="small text-muted mb-0">Published</dt>
                  <dd class="small text-muted"><?= $post['date'] ?></dd>
                </div>
                <div>
                  <dt class="small text-muted mb-0">Reading time</dt>
                  <dd class="small text-muted">3 minute</dd>
                </div>
                <div>
                  <dd class="small text-muted">
                    <a href="<?= "detail.php?post_id=" . $key ?>" style="text-decoration: none;">
                      Find out more
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                      </svg>
                    </a>
                  </dd>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <footer class="bg-white py-5">
    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center">
          <h2 class="fw-bold mb-4">Want us to email you with the latest blockbuster news?</h2>
          <form>
            <div class="position-relative">
              <input type="email" class="form-control rounded-pill py-3 px-4" id="email" placeholder="john@doe.com">
              <button class="btn btn-primary rounded-pill position-absolute btn-subscribe"
                type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <p class="text-center text-lg-start text-muted">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium natus quod eveniet
            aut perferendis distinctio iusto repudiandae, provident velit earum?
          </p>
          <div class="d-flex justify-content-center justify-content-lg-start mt-4">
            <a href="#" class="text-secondary me-3" target="_blank" rel="noreferrer">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="#facebook" />
              </svg>
            </a>
            <a href="#" class="text-secondary me-3" target="_blank" rel="noreferrer">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="#instagram" />
              </svg>
            </a>
            <a href="#" class="text-secondary me-3" target="_blank" rel="noreferrer">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="#twitter" />
              </svg>
            </a>
            <a href="#" class="text-secondary me-3" target="_blank" rel="noreferrer">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="#github" />
              </svg>
            </a>
            <a href="#" class="text-secondary" target="_blank" rel="noreferrer">
              <svg class="bi" width="24" height="24" fill="currentColor">
                <use xlink:href="#dribbble" />
              </svg>
            </a>
          </div>
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
      <div class="container">
        <p class="text-center text-muted small">
          © Company 2022. All rights reserved.<br>
          Created with
          <a href="#" class="text-decoration-none text-secondary">Laravel</a> and
          <a href="#" class="text-decoration-none text-secondary">Laravel Livewire</a>.
        </p>
      </div>
    </div>
  </footer>

</body>

</html>