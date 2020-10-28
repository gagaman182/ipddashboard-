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
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [
        // ["Year", "Austria", "Bulgaria", "Denmark", "Greece"],
        // ["2003", 1336060, 400361, 1001582, 997974],
        // ["2004", 1538156, 366849, 1119450, 941795],
        // ["2005", 1576579, 440514, 993360, 930593],
        // ["2006", 1600652, 434552, 1004163, 897127],
        // ["2007", 1968113, 393032, 979198, 1080887],
        // ["2008", 1901067, 517206, 916965, 1056036],
      ],
      chartOptions: {
        titleTextStyle: { fontName: "Kanit", fontSize: "20" },
        title: "ช่วงอายุ",
        isStacked: true,
        legend: { position: "top", maxLines: 3 },
        bar: { groupWidth: "75%" },
        height: 600,

        colors: ["#3a86ff", "#8338ec", "#ff006e", "#00afb9", "#ffbe0b"],
        hAxis: {
          title: "หอผู้ป่วย",
          slantedText: true,
          slantedTextAngle: 45,
          textStyle: { fontName: "Kanit ,font-weight: bold", fontSize: "16" },
        },
        vAxis: { title: "อายุ" },
        chartArea: {
          left: "3%",
          top: "13%",
          height: "70%",
          width: "90%",
        },
      },
    };
  },
  mounted() {
    console.log(this.chartData);
  },
};
</script>
