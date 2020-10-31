<script>
import { Doughnut } from "vue-chartjs";
import axios from "axios";
//เรียกใช้ plugin labels
import ChartJSPluginDatalabels from "chartjs-plugin-datalabels";
export default {
  extends: Doughnut,
  props: {
    borderColor: null,
    ipddetail: null,
    ipdall_chart_donut_name: null,
    ipdall_chart_donut_sum: null,
  },
  data() {
    return {
      chartData: {
        labels: [],
        datasets: [
          {
            borderWidth: 2,
            borderColor: [],
            backgroundColor: [],
            data: [],
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "ระดับอาการ ",
          fontSize: "20",
          fontFamily: "Kanit, sans-serif",
        },
        titleTextStyle: { fontName: "Kanit", fontSize: "20" },
        legend: {
          display: true,
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          datalabels: {
            color: "#ffffff",
            // แปลงจากจำนวนเติม เป็น function
            formatter: (value, ctx) => {
              let sum = 0;
              let dataArr = ctx.chart.data.datasets[0].data;
              dataArr.map((data) => {
                sum += data;
              });
              let percentage = ((value * 100) / sum).toFixed(1) + "%";
              return percentage;
            },

            font: {
              weight: "bold",
              size: 16,
            },

            align: "center",
            anchor: "center",

            backgroundColor: "#706677",
            // borderColor: "#B0C4DE",
            borderRadius: 4,
            borderWidth: 1,
          },
        },
      },
    };
  },
  mounted() {
    this.changetitlecolor();
    //เรียกใช้ plugin labels
    this.addPlugin(ChartJSPluginDatalabels);
    //renderchart
    this.renderChart(this.chartData, this.options);
  },
  methods: {
    changetitlecolor() {
      this.chartbodercolor = "#B0C4DE";
      // if (this.ipddetail == "ipdall") {
      //   this.chartcolor = "#FF6E40";
      // } else if (this.$route.params.ipddetail == "ipdnew") {
      //   this.chartcolor = "#FFCC80";
      // } else if (this.$route.params.ipddetail == "ipdold") {
      //   this.chartcolor = "#F06292";
      // } else if (this.$route.params.ipddetail == "ipdout") {
      //   this.chartcolor = "#880E4F";
      // }
      //สี chart
      this.chartData.datasets[0].backgroundColor = [
        "#ffd5cd",
        "#efbbcf",
        "#c3aed6",
        "#8675a9",
      ];
      // this.chartData.datasets[0].borderColor = this.chartbodercolor;
      //ค่า+label
      this.chartData.labels = this.ipdall_chart_donut_name;
      this.chartData.datasets[0].data = this.ipdall_chart_donut_sum;
      this.options.animateRotate = true;

      //สี label
      // this.options.plugins.datalabels.backgroundColor = "#fcbf49";
      this.options.plugins.datalabels.borderColor = this.chartbodercolor;
    },
  },
};
</script>
