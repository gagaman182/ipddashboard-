<script>
import { Bar } from "vue-chartjs";
import axios from "axios";
import Chart from "chart.js";
//เรียกใช้ plugin labels
import ChartJSPluginDatalabels from "chartjs-plugin-datalabels";

export default {
  extends: Bar,

  data() {
    return {
      chartcolor: null,
      chartbodercolor: null,

      chartData: {
        type: "horizontalBar",
        data: {
          labels: ["ME", "SE"],
          datasets: [
            {
              label: "Test",
              data: [100, 75],
              backgroundColor: ["#669911", "#119966"],
              hoverBackgroundColor: ["#66A2EB", "#FCCE56"],
            },
          ],
        },
      },

      options: {
        scales: {
          xAxes: [
            {
              ticks: {
                min: 60,
              },
            },
          ],
          yAxes: [
            {
              stacked: true,
            },
          ],
        },
      },
    };
  },
  mounted() {
    //เรียกใช้ plugin labels
    // this.addPlugin(ChartJSPluginDatalabels);
    this.renderChart(this.chartData, this.options);
  },
  methods: {},
};
</script>
