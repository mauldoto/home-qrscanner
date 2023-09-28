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
    const result = decodedResult.split("-");
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
      { facingMode: { exact: "environment" } },
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

  function renderCardPenghuni(data) {}

  function getDataPenghuni(data, renderCallback = null) {
    alert("test " + data);

    const baseUrl = document.querySelector("meta[name='baseURL']").content;

    $.ajax({
      url:
        baseUrl +
        "/homeqrscanner/report?koderumah=" +
        data.koderumah +
        "&nopintu=" +
        data.nopintu,
      type: "get",
      success: function (results) {
        // const data = JSON.parse(results);
        // const dataSurvey = data.data;
        // renderAllChart(dataSurvey);
        // console.log(dataSurvey);
      },
    });
  }
};
