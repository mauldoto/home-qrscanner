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

  const html5QrCode = new Html5Qrcode("reader");
  const qrCodeSuccessCallback = (decodedText, decodedResult) => {
    /* handle success */
    console.log(decodedText, decodedResult);
  };
  const config = { fps: 10, qrbox: { width: 250, height: 250 } };
  // Select back camera or fail with `OverconstrainedError`.
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
};
