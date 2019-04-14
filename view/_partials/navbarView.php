<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-own">
  <a class="navbar-brand" href="../index.php">TAA Steganography Encription</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item <?php
      if ($thisPage=="Hide"){
        echo 'active';
      }

      ?>">
        <a class="nav-link" href="../view/encrypt_file_v.php">Hide Message</a>
      </li>
      <li class="nav-item <?php
      if ($thisPage=="Unhide"){
        echo 'active';
      }

      ?>">
        <a class="nav-link" href="../view/decrypt_file_v.php">Unhide Message</a>
      </li>
      <li class="nav-item <?php
      if ($thisPage=="About"){
        echo 'active';
      }

      ?>">
        <a class="nav-link" href="../view/about_v.php">About</a>
      </li>
    </ul>
    <span class="navbar-text font-italic"><small>
 "Hard to decode a message when you don't know where to look." - Boyd
    </small></span>
  </div>
</nav>