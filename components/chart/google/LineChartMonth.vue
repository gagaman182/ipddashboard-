<template>
  <div>
    <GChart type="LineChart" :data="chartData" :options="chartOptions" />
  </div>
</template>
<script>
import { GChart } from "vue-google-charts";

export default {
  props: {
    chartData: [],
  },
  components: {
    GChart,
  },
  data: function() {
    return {
      chartData: [],
      chartOptions: {
        title: "จำนวนผู้รับบริการ/เดือน",
        titleTextStyle: { fontName: "Kanit", fontSize: "20" },

        hAxis: {
          title: "เดือน",
          textStyle: { fontName: "Kanit ", fontSize: "18" },
        },
        vAxis: {
          title: "จำนวน",
          textStyle: { fontName: "Kanit ", fontSize: "18" },
        },

        height: 500,

        colors: ["#848ccf"],
        pointsVisible: true,
        chartArea: {
          left: "5%",
          top: "10%",
          height: "70%",
          width: "85%",
        },
      },
    };
  },
  mounted() {
    console.log(this.chartData);
  },
};
</script>
