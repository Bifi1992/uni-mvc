<!DOCTYPE html>
<html>
  <head>
    <title>default</title>
  </head>
  <body>
    <header>
      <h1>Inhalt aus <?= __FILE__ ?></h1>
      <nav>
        <ol>
          <li><a href = "<?= WEBDIR ?>">Home</a></li>
          <li><a href = "<?= WEBDIR ?>about/">About</a></li>
          <li><a href = "<?= WEBDIR ?>products/">Products</a></li>
          <li>
            <a href = "javascript:void(0)">Service</a>
            <ol>
              <li><a href = "<?= WEBDIR ?>contact/">Contact</a></li>
              <li><a href = "<?= WEBDIR ?>career/">Career</a></li>
              <li><a href = "<?= WEBDIR ?>privacy/">Privacy</a></li>
              <li><a href = "<?= WEBDIR ?>imprint/">Imprint</a></li>
            </ol>
          </li>
        </ol>
      </nav>
    </header>
    <?= $this->content ?>
  </body>
  </head>
