<template>
  <div id="app">
    <GChart type="ColumnChart" :data="chartData" :options="chartOptions" />
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  name: "App",
  components: {
    GChart,
  },
  props: {
    chartData: null,
  },

  data() {
    return {
      chartData: [],
      chartOptions: {
        titleTextStyle: { fontName: "Kanit", fontSize: "20" },
        title: "ช่วงอายุ",
        isStacked: true,
        legend: { position: "top", maxLines: 3 },
        bar: { groupWidth: "75%" },
        height: 600,

        colors: ["#be5683", "#84a9ac", "#d9adad", "#848ccf", "#c3aed6"],
        hAxis: {
          title: "หอผู้ป่วย",
          slantedText: true,
          slantedTextAngle: 45,
          textStyle: { fontName: "Kanit ,font-weight: bold", fontSize: "18" },
        },
        vAxis: {
          title: "อายุ",
          textStyle: { fontName: "Kanit ", fontSize: "18" },
        },
        chartArea: {
          left: "5%",
          top: "10%",
          height: "70%",
          width: "90%",
        },
      },
    };
  },
  mounted() {
    // ขนาด font
    // Chart.defaults.global.defaultFontSize = 14;
  },
};
</script>
