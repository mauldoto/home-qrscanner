<?php $post_url = ''; ?>

<div class="form-content">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <form id="formID" action="<?= BASEURL; ?>/tamu/input" method="post">
            <section class="title-section">
                <div class="col-xs-12 col-sm-12 text-center mb-10">
                    <h3><strong>SURVEY KEPUASAN TAMU MESS</strong></h3>
                    <h4><?= NAMA_PT; ?></h4>
                </div>
            </section>

            <section class="content-section">
                <div class="col-xs-12 col-sm-12 text-center mb-10 mt-20">
                    <strong>Mohon berikan penilaian anda terkait pelayanan kami berikut:</strong>
                </div>
            </section>

            <section class="suggestion-section">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 text-center mb-10">
                    <div class="col-xs-12">
                        <div class="col-xs-3 saran-option">
                            <div class="saran saran-pelayanan" data-value="pelayanan">
                                <label class="label-kategori" for="saran1">
                                    <img src="<?= BASEURL; ?>/assets/icons/pelayanan.png" alt="pelayanan" width="80px">
                                    <h5 class="text-pelayanan text-saran">Pelayanan</h5>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1 padd">
                            <img src="<?= BASEURL; ?>/assets/icons/icon-arrow.png" alt="">
                        </div>
                        <div class="col-xs-8 text-center">
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan sangat-puas" data-key="pelayanan" data-value="2" data-id="1" data-text="SANGAT PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan1">
                                        <img class="img-sangat-puas" src="<?= BASEURL; ?>/assets/icons/sangat_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan1" class="text-sangat-puas text-kepuasan">SANGAT PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan cukup-puas" data-key="pelayanan" data-value="1" data-id="2" data-text="CUKUP PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan2">
                                        <img class="img-cukup-puas" src="<?= BASEURL; ?>/assets/icons/cukup_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan2" class="text-cukup-puas text-kepuasan">CUKUP PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan tidak-puas" data-key="pelayanan" data-value="0" data-id="3" data-text="TIDAK PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan3">
                                        <img class="img-tidak-puas" src="<?= BASEURL; ?>/assets/icons/tidak_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan3" class="text-tidak-puas text-kepuasan">TIDAK PUAS</h4>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-3 saran-option">
                            <div class="saran saran-hidangan" data-value="hidangan">
                                <label class="label-kategori" for="saran1">
                                    <img src="<?= BASEURL; ?>/assets/icons/hidangan.png" alt="hidangan" width="80px">
                                    <h5 class="text-hidangan text-saran">Hidangan</h5>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1 padd">
                            <img src="<?= BASEURL; ?>/assets/icons/icon-arrow.png" alt="">
                        </div>
                        <div class="col-xs-8 text-center">
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan sangat-puas" data-key="hidangan" data-value="2" data-id="1" data-text="SANGAT PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan1">
                                        <img class="img-sangat-puas" src="<?= BASEURL; ?>/assets/icons/sangat_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan1" class="text-sangat-puas text-kepuasan">SANGAT PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan cukup-puas" data-key="hidangan" data-value="1" data-id="2" data-text="CUKUP PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan2">
                                        <img class="img-cukup-puas" src="<?= BASEURL; ?>/assets/icons/cukup_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan2" class="text-cukup-puas text-kepuasan">CUKUP PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan tidak-puas" data-key="hidangan" data-value="0" data-id="3" data-text="TIDAK PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan3">
                                        <img class="img-tidak-puas" src="<?= BASEURL; ?>/assets/icons/tidak_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan3" class="text-tidak-puas text-kepuasan">TIDAK PUAS</h4>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-3 saran-option">
                            <div class="saran saran-fasilitas" data-value="fasilitas">
                                <label class="label-kategori" for="saran1">
                                    <img src="<?= BASEURL; ?>/assets/icons/fasilitas.png" alt="fasilitas" width="80px">
                                    <h5 class="text-fasilitas text-saran">Fasilitas</h5>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1 padd">
                            <img src="<?= BASEURL; ?>/assets/icons/icon-arrow.png" alt="">
                        </div>
                        <div class="col-xs-8 text-center">
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan sangat-puas" data-key="fasilitas" data-value="2" data-id="1" data-text="SANGAT PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan1">
                                        <img class="img-sangat-puas" src="<?= BASEURL; ?>/assets/icons/sangat_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan1" class="text-sangat-puas text-kepuasan">SANGAT PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan cukup-puas" data-key="fasilitas" data-value="1" data-id="2" data-text="CUKUP PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan2">
                                        <img class="img-cukup-puas" src="<?= BASEURL; ?>/assets/icons/cukup_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan2" class="text-cukup-puas text-kepuasan">CUKUP PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan tidak-puas" data-key="fasilitas" data-value="0" data-id="3" data-text="TIDAK PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan3">
                                        <img class="img-tidak-puas" src="<?= BASEURL; ?>/assets/icons/tidak_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan3" class="text-tidak-puas text-kepuasan">TIDAK PUAS</h4>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-3 saran-option">
                            <div class="saran saran-kebersihan" data-value="kebersihan">
                                <label class="label-kategori" for="saran1">
                                    <img src="<?= BASEURL; ?>/assets/icons/kebersihan.png" alt="kebersihan" width="80px">
                                    <h5 class="text-kebersihan text-saran">Kebersihan</h5>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1 padd">
                            <img src="<?= BASEURL; ?>/assets/icons/icon-arrow.png" alt="">
                        </div>
                        <div class="col-xs-8 text-center">
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan sangat-puas" data-key="kebersihan" data-value="2" data-id="1" data-text="SANGAT PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan1">
                                        <img class="img-sangat-puas" src="<?= BASEURL; ?>/assets/icons/sangat_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan1" class="text-sangat-puas text-kepuasan">SANGAT PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan cukup-puas" data-key="kebersihan" data-value="1" data-id="2" data-text="CUKUP PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan2">
                                        <img class="img-cukup-puas" src="<?= BASEURL; ?>/assets/icons/cukup_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan2" class="text-cukup-puas text-kepuasan">CUKUP PUAS</h4>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4 parent-kepuasan">
                                <div class="kepuasan tidak-puas" data-key="kebersihan" data-value="0" data-id="3" data-text="TIDAK PUAS">
                                    <label class="label-kepuasan" data-value="" data-text="" for="kepuasan3">
                                        <img class="img-tidak-puas" src="<?= BASEURL; ?>/assets/icons/tidak_puas.png" alt="" width="50px">
                                        <h4 id="textKepuasan3" class="text-tidak-puas text-kepuasan">TIDAK PUAS</h4>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <div class="col-xs-12">
                <input type="hidden" name="submited_data">
                <button type="submit" class="col-xs-12 btn btn-primary">Save</button>
            </div>
    </div>
    </form>

</div>
<div class="table-content">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <section class="title-section">
            <div class="col-xs-12 col-sm-12 text-center mb-10">
                <h4>Report Kepuasan Tamu</h4>
            </div>
            <div class="col-xs-12 text-center mb-10">
                <p>Pilih Tanggal Awal: <input id="startDate" type="text" name="startDate"></p>
                <p>Pilih Tanggal Akhir: <input id="endDate" type="text" name="endDate"></p>
                <!-- <input id="startDate" type="hidden" name="startDate"> -->
                <!-- <input id="endDate" type="hidden" name="endDate"> -->
                <button class="col-xs-12 btn btn-success" id="loadbtn">Load</button>
            </div>
        </section>

        <section class="table-section">

        </section>


    </div>

</div>
</div>
</div>