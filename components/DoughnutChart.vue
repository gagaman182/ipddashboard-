<script>
import { Doughnut } from "vue-chartjs";
import axios from "axios";

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
        labels: ["Babol", "Cabanatuan", "Daegu", "Jerusalem"],
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
          text: "ระดับอาการ",
          fontSize: "20",
          fontFamily: "Kanit, sans-serif",
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
      this.chartData.labels = this.ipdall_chart_donut_name;
      this.chartData.datasets[0].data = this.ipdall_chart_donut_sum;
      this.options.animateRotate = true;
      console.log(this.ipdall_chart_bar_name);
    },
  },
};
</script>
