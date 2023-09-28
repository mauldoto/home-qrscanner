<?php $post_url = ''; ?>

<div class="table-content">
    <div class="row">
        <div class="col-sm-12" id="msg-info">
            <?php
            Flasher::msgInfo();
            ?>
        </div>

        <section class="title-section">
            <div class="col-xs-12 col-sm-12 text-center mb-3">
                <h4>Scan Data Perumahan</h4>
            </div>
            <div class="col-xs-12 text-center">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Kode Rumah</div>
                        <input type="text" class="form-control" id="kodePerumahan" placeholder="Kode Perumahan">
                        <span class="input-group-btn">
                            <button id="btnScan" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalScanner">Scan</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">No Pintu</div>
                        <input type="text" class="form-control" id="noPintu" placeholder="No Pintu Perumahan">
                    </div>
                </div>
                <button class="col-xs-12 btn btn-success" id="loadbtn">Load</button>
            </div>
        </section>

        <section>
            <div class="modal fade" id="modalScanner" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div id="reader" class="mb-5" width="600px"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </section>

        <section class="table-section">
            <div class="col-xs-12 card-penghuni">
                <hr>

                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="width: 25%;"><strong>Kode Rumah</strong></td>
                            <td>:</td>
                            <td style="width: 60%;">SJE00A02 - Bangunan G10 Permanen 02 Emplasment Utama</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><strong>No Pintu</strong></td>
                            <td>:</td>
                            <td style="width: 70%;">isi</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><strong>NIK</strong></td>
                            <td>:</td>
                            <td style="width: 70%;">isi</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><strong>Nama</strong></td>
                            <td>:</td>
                            <td style="width: 70%;">isi</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><strong>Jabatan</strong></td>
                            <td>:</td>
                            <td style="width: 70%;">isi</td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <table class="table table-bordered">
                    <thead>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Keterangan</th>
                        <th>Umur</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bapak</td>
                            <td>Laki-Laki</td>
                            <td>Suami</td>
                            <td>33</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>


    </div>

</div>
</div>
</div>