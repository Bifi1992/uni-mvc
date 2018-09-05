<!DOCTYPE html>
<html>
  <head>
    <title>default</title>
  </head>
  <body>
    <header>
      <h1>Inhalt aus <?= __DIR__ ?></h1>
      <nav>
        <ol>
          <li><a href = "<?= WEBDIR ?>">Home</a></li>
          <li><a href = "<?= WEBDIR ?>about/">About</a></li>
          <li><a href = "<?= WEBDIR ?>products/">Products</a></li>
          <li><ol>
              <li><a href = "<?= WEBDIR ?>contact/">Contact</a></li>
              <li><a href = "<?= WEBDIR ?>career/">Career</a></li>
              <li><a href = "<?= WEBDIR ?>privacy/">Privacy</a></li>
              <li><a href = "<?= WEBDIR ?>imprint/">Imprint</a></li>
            </ol>
            <li><a href = "javascript:void(0)">Service</a></li>
          </li>
        </ol>
      </nav>
    </header>
    <?= $this->content ?>
  </body>
  </head>
