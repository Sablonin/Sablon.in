<?php
require '../../configs/koneksi.php';

function ViewUlasan()
{
  global $conn;
  $GetData =  mysqli_query($conn, "SELECT * FROM ulasan ORDER BY IDUlasan DESC LIMIT 5");
  while ($Data = mysqli_fetch_array($GetData)) { ?>
    <div class='embla__slide slider-image item' style='margin-left: 7rem; margin-right: 7rem;'>
      <div class='user'>
        <div class='user_image'>
          <div class='item-wrapper position-relative'>
            <img src='../../assets/images/foto-ulasan/<?= $Data['Foto'] ?>'>
          </div>
        </div>
        <div class='user_text mb-4'>
          <p class='mbr-fonts-style display-7'>
            <?= $Data['Ulasan'] ?>
          </p>
        </div>
        <div class='user_name mbr-fonts-style mb-2 display-7'>
          <strong><?= $Data['Nama'] ?></strong>
        </div>
      </div>
    </div>
<?php
  }
}
