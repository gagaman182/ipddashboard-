<template>
  <div id="app">
    <GChart type="PieChart" :data="chartData" :options="chartOptions" />
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
    ipddetail: null,
  },
  data() {
    return {
      chartData: [],
      chartOptions: {
        title: "สิทธิการรักษา",
        titleTextStyle: { fontName: "Kanit ", fontSize: "20" },
        height: 350,

        legend: {
          position: "labeled",
          textStyle: { fontName: "Kanit ,font-weight: bold", fontSize: "20" },
        },
        pieSliceTextStyle: { fontSize: 16 },
        // sliceVisibilityThreshold: 0.05,
        // pieResidueSliceLabel: "อื่นๆ",
        pieSliceText: "value",

        slices: {
          1: { offset: 0.2 },
          3: { offset: 0.3 },
        },
        chartArea: {
          left: "3%",
          top: "13%",
          height: "100%",
          width: "100%",
        },

        // is3D: true,
        colors: [
          "#007ea7",
          "#d264b6",
          "#a480cf",
          "#779be7",
          "#49b6ff",
          "#ffc09f",
        ],
      },
    };
  },
};
</script>
