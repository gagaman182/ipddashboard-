<script>
import { Line } from "vue-chartjs";
import axios from "axios";
export default {
  extends: Line,
  props: {
    borderColor: null,
    ipddetail: null,
  },
  data() {
    return {
      chartcolor: null,
      ipdall_chart_bar_name: null,
      ipdall_chart_bar_sum: null,
      chartData: {
        // labels: [],
        datasets: [
          {
            label: "Line Chart",
            // data: [],
            fill: false,
            // borderColor: this.chartcolor,
            backgroundColor: "#2554FF",
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
              gridLines: {
                display: true,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                display: false,
              },
            },
          ],
        },
        legend: {
          display: true,
        },
        responsive: true,
        maintainAspectRatio: false,
      },
    };
  },

  mounted() {
    this.changetitlecolor();
    this.feathipd_all_chart_bar();
    this.renderChart(this.chartData, this.options);
  },
  methods: {
    changetitlecolor() {
      if (this.ipddetail == "ipdall") {
        this.chartcolor = "#FF6E40";
      } else if (this.$route.params.ipddetail == "ipdnew") {
        this.chartcolor = "#FFCC80";
      } else if (this.$route.params.ipddetail == "ipdold") {
        this.chartcolor = "#F06292";
      } else if (this.$route.params.ipddetail == "ipdout") {
        this.chartcolor = "#880E4F";
      }

      this.chartData.datasets[0].borderColor = this.chartcolor;
    },
    //แสดง chart bar
    async feathipd_all_chart_bar() {
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_all_chart_bar.php`)
        .then((response) => {
          this.ipdall_chart_bar = response.data;

          //เอาข้อความไปใส่ labels
          this.ipdall_chart_bar_name = this.ipdall_chart_bar.map(
            (item) => item.halfplace
          );
          this.chartData.labels = this.ipdall_chart_bar_name;
          // console.log(this.ipdall_chart_bar_name);

          //เอาผลรวมไปใส่ใน data
          this.ipdall_chart_bar_sum = this.ipdall_chart_bar.map(
            (item) => item.ipdall
          );
          this.chartData.datasets[0].data = this.ipdall_chart_bar_sum;
          // console.log(this.ipdall_chart_bar_sum);
        });
    },
  },
};
</script>
