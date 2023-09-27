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
                    <strong>PT. GRAHA CAKRA MULIA</strong>
                </div>
            </section>

            <section class="content-section">
                <div class="col-xs-12 col-sm-12 text-center mb-10 mt-20">
                    <strong>Puaskah anda dengan pelayanan kami?</strong>
                </div>
                <div class="col-xs-8 col-sm-8 col-xs-offset-2 col-sm-offset-2 text-center mb-10">
                    <div class="col-xs-4 parent-kepuasan">
                        <div class="kepuasan sangat-puas" data-id="1" data-text="SANGAT PUAS">
                            <input class="radio-kepuasan" type="radio" name="kepuasan" id="kepuasan1" value="2">
                            <label for="kepuasan1">
                                <img class="img-sangat-puas" src="/assets/icons/sangat_puas.png" alt="" width="100px">
                                <h3 id="textKepuasan1" class="text-sangat-puas text-kepuasan"></h3>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4 parent-kepuasan">
                        <div class="kepuasan cukup-puas" data-id="2" data-text="CUKUP PUAS">
                            <input class="radio-kepuasan" type="radio" name="kepuasan" id="kepuasan2" value="1">
                            <label for="kepuasan2">
                                <img class="img-cukup-puas" src="/assets/icons/cukup_puas.png" alt="" width="100px">
                                <h3 id="textKepuasan2" class="text-cukup-puas text-kepuasan"></h3>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4 parent-kepuasan">
                        <div class="kepuasan tidak-puas" data-id="3" data-text="TIDAK PUAS">
                            <input class="radio-kepuasan" type="radio" name="kepuasan" id="kepuasan3" value="0">
                            <label for="kepuasan3">
                                <img class=" img-tidak-puas" src="/assets/icons/tidak_puas.png" alt="" width="100px">
                                <h3 id="textKepuasan3" class="text-tidak-puas text-kepuasan"></h3>
                            </label>
                        </div>
                    </div>

                    <!-- <input type="hidden" name="kepuasan" /> -->
                </div>
            </section>

            <section class="mid-section">
                <div class="col-xs-12 col-sm-12 text-center mb-10">
                    <strong class="col-xs-8 col-xs-offset-2">Apabila ada yang perlu ditingkatkan, silakan informasikan kami bagian mana yang perlu diperbaiki dengan cara klik ikon dibawah ini :</strong>
                </div>
            </section>

            <section class="suggestion-section">
                <div class="col-xs-8 col-sm-8 col-xs-offset-2 col-sm-offset-2 text-center mb-10">
                    <div class="col-xs-3 saran saran-pelayanan">
                        <input class="radio-kepuasan" type="radio" name="saran" id="saran1" />
                        <label for="saran1">
                            <img src="/assets/icons/pelayanan.png" alt="" width="80px">
                            <h5 class="text-pelayanan text-saran">Pelayanan</h5>
                        </label>
                    </div>
                    <div class="col-xs-3 saran saran-hidangan">
                        <input class="radio-kepuasan" type="radio" name="saran" id="saran2" />
                        <label for="saran2">
                            <img src="/assets/icons/hidangan.png" alt="" width="80px">
                            <h5 class="text-pelayanan text-saran">Hidangan</h5>
                        </label>
                    </div>
                    <div class="col-xs-3 saran saran-fasilitas">
                        <input class="radio-kepuasan" type="radio" name="saran" id="saran3" />
                        <label for="saran3">
                            <img src="/assets/icons/fasilitas.png" alt="" width="80px">
                            <h5 class="text-pelayanan text-saran">Fasilitas</h5>
                        </label>
                    </div>
                    <div class="col-xs-3 saran saran-kebersihan">
                        <input class="radio-kepuasan" type="radio" name="saran" id="saran4" />
                        <label for="saran4">
                            <img src="/assets/icons/kebersihan.png" alt="" width="80px">
                            <h5 class="text-pelayanan text-saran">Kebersihan</h5>
                        </label>
                    </div>

                    <input type="hidden" name="saran" />
                </div>
            </section>


            <div class="col-xs-12">
                <button type="submit" class="col-xs-12 btn btn-primary">Save</button>
            </div>
    </div>
    </form>

</div>
</div>
</div>