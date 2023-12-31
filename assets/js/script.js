$(function () {
  // $('#empId').on('keyup', function(e){

  // 	if(e.keyCode == 13)
  // 	{
  // 		let empId = $('#empId').val();
  // 		let url = $(this).data('url')+'/'+empId;
  // 		getEmpData(url);
  // 	}
  // })

  $("#empId").on("change", function (e) {
    let empId = $("#empId").val();
    let url = $(this).data("url") + "/angket/" + empId + "/json";
    getEmpData(url);
  });

  $("#btn-register").on("click", function () {
    var t = document.getElementById("detpId");
    var selectedText = t.options[t.selectedIndex].text;

    $("#msg-info").html("");

    if ($("#empId").val() == "") {
      setMessage("danger", "Input Employee ID");
    } else if ($("#detpId").val() == "") {
      setMessage("danger", "Select Department!");
    } else {
      $.ajax({
        url: $(this).data("url"),
        type: "POST",
        dataType: "json",
        data: {
          empId: $("#empId").val(),
          deptId: $("#detpId").val(),
          active: "1",
        },
        success: function (result) {
          if (result === 1) {
            let msg =
              "Employee Successfully Assigned to " +
              selectedText +
              " Department";
            setMessage("success", msg);

            $("#empId").val("");
            $("#empName").val("");
            $("#detpId").val("");
          } else if (result === "X") {
            let msg =
              "Employee Already Assigned to " + selectedText + " Department";
            setMessage("danger", msg);
          }
        },
      });
    }
  });

  //Create Asset
  $("#btn-create-asset").on("click", function () {
    $("#msg-info").html("");
    $.ajax({
      url: $(this).data("url"),
      type: "POST",
      dataType: "json",
      data: {
        assetKat: $("#assetKat").val(),
        desc: $("#desc").val(),
        empId: $("#empId").val(),
        createdBy: $(this).data("user"),
        createdDate: "2019-02-12",
        quantity: $("#qty").val(),
        unit: $("#unit").val(),
        assetStat: $("#assetStatus").val(),
        location: $("#location").val(),
      },
      success: function (result) {
        if (result === 1) {
          let msg = "Asset Created";
          setMessage("success", msg);
        } else if (result === "X") {
          let msg = "Create Asset Error";
          setMessage("danger", msg);
        }
      },
    });
  });

  //Display Asset Details
  $("#btn-asset-display").on("click", function () {
    if ($("#src-asset-num").val() === "") {
    } else {
      let url = $(this).data("url") + "/" + $("#src-asset-num").val();
      getAssetDetails(url);
    }
  });

  $("#btn-dtl-clsd").on("click", function () {
    $("#src-asset-num").val("");
  });

  $(".input-radio").change(function () {
    const no = $(this).data("no");
    const sort = $(this).data("sort");

    if (no == 1) {
      if ($(this).val() === "a") {
        // $(".form-khusus-karyawan").slideDown();
        $(".input-radio-karyawan").attr("disabled", false);
      } else {
        // $(".form-khusus-karyawan").slideUp();
        $(".input-radio-karyawan").attr("disabled", true);
      }
    }

    $(".input-" + no).slideUp();
    $(".input-" + no).attr("required", false);
    $("#alasan" + no + "-" + sort).slideDown();
    $("#alasan" + no + "-" + sort).attr("required", true);
  });

  $(".input-radio.kepala-afdeling").change(function () {
    console.log("tesss");
  });

  $(".nik-select2").change(function () {
    getEmployeeDetails();
  });

  $("#btnLoad").click(function () {
    getEmployeeDetails();
  });

  $("#formID").submit(function (event) {
    event.preventDefault();
    const isLoaded = $("#isLoaded").val();

    if (!isLoaded) {
      alert("NIK Belum di load");
      return;
    }

    $(this)[0].submit();
  });
});

// getEmployeeDetails();

function getEmployeeDetails() {
  $("#detailNIK").html("");
  $("#detailNAME").html("");
  $("#detailJOB").html("");
  $("#isLoaded").val("");
  $(".employee-detail").slideUp();

  const baseUrl = document.querySelector("meta[name='baseURL']").content;
  const nik = $("[name='nik']").val();

  $.ajax({
    url: baseUrl + "/angket/detail?nik=" + nik,
    type: "get",
    success: function (results) {
      const data = JSON.parse(results);
      const karyawan = data.employee;
      const jawaban = data.jawaban;
      if (karyawan.EMPCODE) {
        $("#detailNIK").html(karyawan.EMPCODE);
        $("#detailNAME").html(karyawan.EMPNAME);
        $("#detailJOB").html(karyawan.JABATAN);
        $("#isLoaded").val(karyawan.EMPCODE);

        $(".employee-detail").slideDown();
      } else {
        alert("Nik tidak terdaftar!!");
      }

      setAnswer(jawaban);
    },
  });
}

function setAnswer(jawaban) {
  jawaban.forEach((iterasi) => {
    const option = document.querySelector(
      "input[name=angket_" + iterasi.NO + "][value='" + iterasi.JAWABAN + "']"
    );

    if (option) {
      option.checked = true;
    }

    const alasan = document.querySelector(
      'textarea[name="alasan_angket_' + iterasi.NO + iterasi.JAWABAN + '"]'
    );

    if (alasan && iterasi.ALASAN) {
      alasan.value = iterasi.ALASAN;
      $(
        'textarea[name="alasan_angket_' + iterasi.NO + iterasi.JAWABAN + '"]'
      ).slideDown();
    }

    if (iterasi.NO == 1) {
      if (iterasi.JAWABAN === "a") {
        // $(".form-khusus-karyawan").slideDown();
        $(".input-radio-karyawan").attr("disabled", false);
      } else {
        // $(".form-khusus-karyawan").slideUp();
        $(".input-radio-karyawan").attr("disabled", true);
      }
    }
  });

  return;
}

function getAssetDetails(url) {
  $.ajax({
    url: url,
    type: "get",
    success: function (result) {
      $("#assetDetailModalLabel").html("");
      $("#assetDetailModalLabel").append(
        `Asset ` + result.assetNum + ` Details`
      );
      $("#asset-detail").html("");
      $("#asset-detail").append(
        `
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4 text-center">
								<br><br><br>
								<img src="https://api.qrserver.com/v1/create-qr-code/?data=` +
          result.assetNum +
          `&amp;size=200x200" class="img-fluid">
							</div>
							<div class="col-md-8">
								<ul class="list-group">
								  <li class="list-group-item">Asset Number : ` +
          result.assetNum +
          `</li>
								  <li class="list-group-item">Asset Description : ` +
          result.Description +
          `</li>
								  <li class="list-group-item">Asset Category : ` +
          result.assetkat +
          `</li>
								  <li class="list-group-item">Employee Name : ` +
          result.fullname +
          `</li>
								  <li class="list-group-item">Created By : ` +
          result.createdBy +
          `</li>
								  <li class="list-group-item">Created Date : ` +
          result.createdDate +
          ` </li>
								  <li class="list-group-item">Quantity : ` +
          result.quantity +
          ` ` +
          result.unit +
          `</li>
								  <li class="list-group-item">Location : ` +
          result.location +
          `</li>
								  <li class="list-group-item">Status : ` +
          result.assetStat +
          `</li>
								</ul>
							</div>
						</div>
					</div>	
				`
      );
    },
    error: function (xhr) {},
  });
}

function setMessage(type, msg) {
  $("#msg-info").append(
    `
		<div class="alert alert-` +
      type +
      `" role="alert">
		<strong>` +
      msg +
      ` </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		`
  );
}

function getEmpData(url) {
  $("#msg-info").html("");
  $.getJSON(url, function (data) {
    if (data === false) {
      let msg = "Employee ID : " + $("#empId").val() + " Not Found! ";
      setMessage("danger", msg);
      $("#empId").val("");
      $("#empName").val("");
    } else {
      $("#empName").val(data.fullname);
    }
  });
}
