window.onload = () => {
  let masterData = {};

  const kepuasan = document.querySelectorAll(".kepuasan");
  kepuasan.forEach((element) => {
    element.addEventListener("click", function () {
      const kategori = this.dataset.key;

      deleteActiveClass(kategori);
      this.classList.add("active");
      document.querySelector("#textKepuasan" + this.dataset.id).innerHTML =
        this.dataset.text;

      masterData[kategori] = this.dataset.value;
    });
  });

  function deleteActiveClass(kategori) {
    document
      .querySelectorAll(".kepuasan[data-key='" + kategori + "']")
      .forEach((element) => {
        element.classList.remove("active");
      });
  }

  function deleteTextKepuasan() {
    document.querySelectorAll(".text-kepuasan").forEach((element) => {
      element.innerHTML = "";
    });
  }

  // const saran = document.querySelectorAll(".saran");
  // saran.forEach((elm) => {
  //   elm.addEventListener("click", function () {
  //     saran.forEach((elmSaran) => elmSaran.classList.remove("active"));
  //     this.classList.add("active");

  //     // $(".mid-section").slideUp();
  //     deleteActiveClass();
  //     // deleteTextKepuasan();

  //     if (
  //       Object.keys(masterData).length > 0 &&
  //       masterData[this.dataset.value]
  //     ) {
  //       const selectedSatisfy = document.querySelector(
  //         '.kepuasan[data-value="' + masterData[this.dataset.value] + '"]'
  //       );

  //       selectedSatisfy.classList.add("active");
  //       document.querySelector(
  //         "#textKepuasan" + selectedSatisfy.dataset.id
  //       ).innerHTML = selectedSatisfy.dataset.text;
  //     }

  //     // $(".mid-section").slideDown();
  //   });
  // });

  $("#formID").submit(function (event) {
    event.preventDefault();

    if (Object.keys(masterData).length < 4) {
      alert("Mohon berikan penilaian semua kategori!");
      return;
    }

    document.querySelector('input[name="submited_data"]').value =
      JSON.stringify(masterData);

    $(this)[0].submit();
  });

  document.querySelector("#loadbtn").addEventListener("click", function () {
    const startDate = document.querySelector("#startDate").value;
    const endDate = document.querySelector("#endDate").value;
    if (!startDate || !endDate) {
      alert("Lengkapi tanggal awal dan tanggal akhir!");
      return;
    }

    const diffStart = moment(startDate, "DD-MM-YYYY");
    const diffEnd = moment(endDate, "DD-MM-YYYY");

    if (diffStart > diffEnd) {
      alert("Tanggal awal tidak boleh lebih dari tanggal akhir!");
      return;
    }

    document.querySelector(".table-section").innerHTML = "";

    // const startDate = document.querySelector("#startDate").value;
    // const endDate = document.querySelector("#endDate").value;

    getDataByRangeDate(startDate, endDate);
  });

  function getDataByDate(date) {
    const baseUrl = document.querySelector("meta[name='baseURL']").content;

    $.ajax({
      url: baseUrl + "/tamu/report?date=" + date,
      type: "get",
      success: function (results) {
        const data = JSON.parse(results);
        const dataSurvey = data.data;
        renderResults(dataSurvey);
      },
    });
  }

  function getDataByRangeDate(startDate, endDate) {
    const baseUrl = document.querySelector("meta[name='baseURL']").content;

    $.ajax({
      url:
        baseUrl + "/tamu/report?startDate=" + startDate + "&endDate=" + endDate,
      type: "get",
      success: function (results) {
        const data = JSON.parse(results);
        const dataSurvey = data.data;
        renderAllChart(dataSurvey);
        // console.log(dataSurvey);
      },
    });
  }

  // $("#datepicker").daterangepicker({
  //   startDate: moment().subtract(1, "months"),
  //   endDate: moment(),
  //   maxDate: moment(),
  //   opens: "center",
  //   autoUpdateInput: false,
  // });

  // $("#datepicker").on("apply.daterangepicker", function (ev, picker) {
  //   $("#startDate").val(picker.startDate.format("MM/DD/YYYY"));
  //   $("#endDate").val(picker.endDate.format("MM/DD/YYYY"));
  //   $("#datepicker").val(
  //     picker.startDate.format("DD-MM-YYYY") +
  //       " - " +
  //       picker.endDate.format("DD-MM-YYYY")
  //   );
  // });

  $("#startDate").daterangepicker({
    singleDatePicker: true,
    autoApply: true,
    showDropdowns: true,
    locale: {
      format: "DD-MM-YYYY",
    },
    startDate: moment().startOf("month"),
  });
  $("#endDate").daterangepicker({
    singleDatePicker: true,
    autoApply: true,
    showDropdowns: true,
    locale: {
      format: "DD-MM-YYYY",
    },
  });

  function renderResults(data) {
    const master = {
      0: "TIDAK PUAS",
      1: "CUKUP PUAS",
      2: "SANGAT PUAS",
    };

    let parentElm = "";
    data.forEach((item) => {
      let elm = "<tr>";
      elm += "<th scope='row'>" + item.TANGGAL + "</th>";
      elm += "<td>" + master[item.PELAYANAN] + "</td>";
      elm += "<td>" + master[item.HIDANGAN] + "</td>";
      elm += "<td>" + master[item.FASILITAS] + "</td>";
      elm += "<td>" + master[item.KEBERSIHAN] + "</td>";
      elm += "</tr>";

      parentElm += elm;
    });

    document.querySelector(".body-table").innerHTML = parentElm;
  }

  function renderAllChart(data) {
    const listKeys = Object.keys(data);
    listKeys.forEach((item) => {
      renderChart(data[item]);
    });

    const tablesection = document.querySelector(".table-section");

    const legendElm = document.createElement("div");
    legendElm.classList.add("col-xs-12", "col-md-8", "col-md-offset-2");
    legendElm.style.cssText = "margin-top:30px;";
    const legendHtml = createChartLegend();

    legendElm.innerHTML = legendHtml;
    tablesection.appendChild(legendElm);
  }

  function renderChart(dataValues) {
    const parentElmChart = document.querySelector(".table-section");
    const newChartElm = document.createElement("div");
    newChartElm.classList.add(
      "col-xs-12",
      "col-md-6",
      "text-center",
      "container-chart"
    );

    newChartElm.style.cssText = "margin-top: 20px;";

    let expHtml = "<h5>" + dataValues.name + "</h5>";
    expHtml +=
      '<div class="container-chart" style="width: 300px;height: 300px">';
    expHtml +=
      '<canvas class="chart-' + dataValues.name.toLowerCase() + '"></canvas>';
    expHtml += "</div>";

    newChartElm.innerHTML = expHtml;

    parentElmChart.appendChild(newChartElm);

    const data = {
      // labels: ["Sangat Puas", "Cukup Puas", "Tidak Puas"],
      datasets: [
        {
          label: "Orang",
          data: [dataValues.PUAS, dataValues.CUKUPPUAS, dataValues.TIDAKPUAS],
          backgroundColor: [
            "rgb(51, 204, 51)",
            "rgb(255, 205, 86)",
            "rgb(255, 99, 132)",
          ],
          hoverOffset: 4,
        },
      ],
    };

    const config = {
      type: "pie",
      data: data,
      plugins: [ChartDataLabels],
      options: {
        plugins: {
          datalabels: {
            color: "white",
            labels: {
              value: {
                color: "white",
                font: {
                  weight: "bold",
                  size: 15,
                },
              },
            },
            formatter: function (value) {
              if (value > 0) {
                return value + " Org";
              } else {
                return "";
              }
            },
          },
        },
      },
    };

    var ctx = document
      .querySelector(".chart-" + dataValues.name.toLowerCase())
      .getContext("2d");

    new Chart(ctx, config);
  }

  function createChartLegend() {
    let legendHtml = `<div class="col-xs-8 col-md-4 col-xs-offset-2 col-md-offset-0 text-center">
                          <div class="col-xs-2" style="margin-top:5px; width: 20px; height: 10px; background-color: rgb(51, 204, 51);"></div>
                          <p class="col-xs-10">Sangat Puas</p>
                      </div>
                      <div class="col-xs-8 col-md-4 col-xs-offset-2 col-md-offset-0 text-center">
                          <div class="col-xs-2" style="margin-top:5px; width: 20px; height: 10px; background-color: rgb(255, 205, 86);"></div>
                          <p class="col-xs-10">Cukup Puas</p>
                      </div>
                      <div class="col-xs-8 col-md-4 col-xs-offset-2 col-md-offset-0 text-center">
                          <div class="col-xs-2" style="margin-top:5px; width: 20px; height: 10px; background-color: rgb(255, 99, 132);"></div>
                          <p class="col-xs-10">Tidak Puas</p>
                      </div>`;

    return legendHtml;
  }
};
