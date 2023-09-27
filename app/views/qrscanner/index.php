<?php $post_url = ''; ?>

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
                <div id="reader" class="mb-5" width="600px"></div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Kode Rumah</div>
                        <input type="text" class="form-control" id="kodePerumahan" placeholder="Kode Perumahan">
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

        <section class="table-section">

        </section>


    </div>

</div>
</div>
</div>