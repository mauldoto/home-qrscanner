window.onload = () => {
  // function onScanSuccess(decodedText, decodedResult) {
  //   // handle the scanned code as you like, for example:
  //   console.log(`Code matched = ${decodedText}`, decodedResult);
  // }
  // function onScanFailure(error) {
  //   // handle scan failure, usually better to ignore and keep scanning.
  //   // for example:
  //   console.warn(`Code scan error = ${error}`);
  // }
  // let html5QrcodeScanner = new Html5QrcodeScanner(
  //   "reader",
  //   { fps: 10, qrbox: { width: 250, height: 250 } },
  //   /* verbose= */ false
  // );
  // html5QrcodeScanner.render(onScanSuccess, onScanFailure);

  $("#loadbtn").on("click", function () {
    let data = {};
    data.koderumah = $("#kodePerumahan").val();
    data.nopintu = $("#noPintu").val();

    getDataPenghuni(data);
  });

  const html5QrCode = new Html5Qrcode("reader");
  const qrCodeSuccessCallback = (decodedText, decodedResult) => {
    /* handle success */
    let data = {};
    const result = decodedText.split("-");
    $("#kodePerumahan").val(result[0]);
    data.koderumah = result[0];

    if (result.length > 1) {
      $("#noPintu").val(result[1]);
      data.nopintu = result[1];

      getDataPenghuni(data);
    }

    $("#modalScanner").modal("hide");
  };

  const config = { fps: 10, qrbox: { width: 250, height: 250 } };

  $("#btnScan").on("click", function () {
    html5QrCode.start(
      { facingMode: "environment" },
      config,
      qrCodeSuccessCallback
    );
  });

  $("#modalScanner").on("hide.bs.modal", function (e) {
    html5QrCode
      .stop()
      .then((ignore) => {
        // QR Code scanning is stopped.
      })
      .catch((err) => {
        // Stop failed, handle it.
      });
  });

  function getDataPenghuni(data, renderCallback = null) {
    $(".table-section").html("");

    if (!data.koderumah || !data.nopintu) {
      alert("Mohon lengkapi inputan!!");
      return;
    }

    const baseUrl = document.querySelector("meta[name='baseURL']").content;
    $.ajax({
      url:
        baseUrl +
        "homeqrscanner/report?koderumah=" +
        data.koderumah +
        "&nopintu=" +
        data.nopintu,
      type: "get",
      success: function (results) {
        const data = JSON.parse(results);
        const dataPenghuni = data.data;
        renderCardPenghuni(dataPenghuni);
      },
    });
  }

  function renderCardPenghuni(data) {
    let htmlFinal = "";
    for (const detail of data) {
      htmlFinal += `
      <div class="col-xs-12 card-penghuni">
      <hr>
      <table style="width: 100%;" class="mb-3">
      <tbody>`;

      htmlFinal += `
        <tr>
        <td style="width: 25%;"><strong>Kode Rumah</strong></td>
        <td>:</td>
        <td style="width: 60%;" id="tdKodeRumah">${detail.KODERUMAH} - ${detail.NAMARUMAH}</td>
        </tr>
        <tr>`;

      htmlFinal += `
        <tr>
        <td style="width: 25%;"><strong>No Pintu</strong></td>
        <td>:</td>
        <td style="width: 70%;" id="tdNoPintu">${detail.NOPINTU}</td>
        </tr>`;

      htmlFinal += `
        <tr>
        <td style="width: 25%;"><strong>NIK</strong></td>
        <td>:</td>
        <td style="width: 70%;" id="tdNIK">${detail.INDUK_NIK}</td>
        </tr>`;

      htmlFinal += `
        <tr>
        <td style="width: 25%;"><strong>Nama</strong></td>
        <td>:</td>
        <td style="width: 70%;" id="tdNama">${detail.INDUK_NAME}</td>
        </tr>`;

      htmlFinal += `
        <tr>
        <td style="width: 25%;"><strong>Jabatan</strong></td>
        <td>:</td>
        <td style="width: 70%;" id="tdJabatan">${detail.INDUK_JABATAN}</td>
        </tr>`;

      htmlFinal += `
        </tbody>
        </table>
        <div class="text-center">
        <img id="imgInduk" src="${detail.FOTO}" alt="foto-${detail.INDUK_NIK}" style="width: 100px;height: 150px;">
        </div>
        <hr>
        <table class="table table-bordered">
        <thead>
        <th>Nama</th>
        <th>JK</th>
        <th>Ket</th>
        <th>Umur</th>
        <th>Tinggal</th>
        </thead>
        <tbody class="detailKeluarga">`;

      for (const subdetail of detail.details) {
        htmlFinal += `
          <tr>
            <td>${subdetail.FAMILY_NAME}</td>
            <td>${subdetail.JENKEL}</td>
            <td>${subdetail.KET}</td>
            <td>${subdetail.UMUR}</td>
            <td>${subdetail.TINGGAL}</td>
          </tr>`;
      }

      htmlFinal += `
        </tbody>
        </table>
        </div>`;
    }

    $(".table-section").append(htmlFinal);
  }
};
