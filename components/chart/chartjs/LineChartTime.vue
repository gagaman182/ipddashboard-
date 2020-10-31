<script>
import { Line } from "vue-chartjs";
//เรียกใช้ plugin labels
import ChartJSPluginDatalabels from "chartjs-plugin-datalabels";
export default {
  extends: Line,
  props: {
    ipdall_time_line_data: null,
  },
  data() {
    return {
      chartData: {
        labels: [
          "00.00",
          "01.00",
          "02.00",
          "03.00",
          "04.00",
          "05.00",
          "06.00",
          "07.00",
          "08.00",
          "09.09",
          "10.00",
          "11.00",
          "12.00",
          "13.00",
          "14.00",
          "15.00",
          "16.00",
          "17.00",
          "18.00",
          "19.00",
          "20.00",
          "21.00",
          "22.00",
          "23.00",
        ],

        datasets: [
          {
            label: "จำนวนคนไข้",
            borderWidth: 2,
            borderColor: [],
            // backgroundColor: ["#bedbbb"],
            fill: false,
            data: [],
            borderCapStyle: "butt",
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: "miter",
            backgroundColor: "#00416d",
            borderColor: "#00416d",
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "ช่วงเวลา Admit",
          fontSize: "20",
          fontFamily: "Kanit, sans-serif",
        },

        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          datalabels: {
            color: "#ffffff",

            font: {
              weight: "bold",
              size: 16,
            },

            align: "center",
            anchor: "center",
            Clamping: "center",
            backgroundColor: "#00416d",
            // borderColor: "#B0C4DE",
            borderRadius: 2,
            borderWidth: 1,
          },
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                fontSize: 20,
                fontFamily: "Kanit, sans-serif",
                fontStyle: "italic",
              },
            },
          ],
          xAxes: [
            {
              ticks: {
                beginAtZero: true,
                fontSize: 20,
                fontFamily: "Kanit, sans-serif",
                fontStyle: "italic",
              },
            },
          ],
        },
      },
    };
  },
  mounted() {
    // ขนาด font
    // Chart.defaults.global.defaultFontSize = 14;
    this.changetitlecolor();
    //เรียกใช้ plugin labels
    this.addPlugin(ChartJSPluginDatalabels);
    //renderchart
    this.renderChart(this.chartData, this.options);
  },
  methods: {
    changetitlecolor() {
      this.chartData.datasets[0].data = this.ipdall_time_line_data[0];
      this.options.animateRotate = true;
    },
  },
};
</script>
