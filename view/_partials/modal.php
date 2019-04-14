<!-- Modal Dekripsi File-->
<div class="modal fade" id="modalDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">File telah di dekripsi.</h5>
      </div>
      <div class="modal-body">
        Silahkan cek folder TAA_Steganografi/www/decryptedFile/<?php echo $namaDF;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Dekripsi file -->

<!-- Modal Salah Password -->
<div class="modal fade" id="modalSP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Dekripsi Gagal.</h5>
      </div>
      <div class="modal-body">
        Password salah atau file tidak didukung. Harap periksa kembali.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Salah Password -->

<!-- Modal Enkripsi File -->
<div class="modal fade" id="modalEF" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">File telah dienkripsi kedalam gambar.</h5>
      </div>
      <div class="modal-body">
        Silahkan cek folder : TAA_Steganografi/www/encryptedImage/<?php echo $namaEF;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Enkripsi File -->

<!-- Modal Dekripsi Teks -->
<div class="modal fade" id="modalDT" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">File telah di dekripsi.</h5>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Dekripsi Teks -->

<!-- Modal Enkripsi Teks -->
<div class="modal fade" id="modalET" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Teks telah dimasukkan ke dalam gambar.</h5>
      </div>
      <div class="modal-body">
        Silahkan cek folder : TAA_Steganografi/www/encryptedImage/<?php echo $namaET;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Enkripsi Teks -->