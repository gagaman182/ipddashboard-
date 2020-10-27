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
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [
        // ["Year", "Sales"],
        // ["2014", 1000],
        // ["2015", 1170],
        // ["2016", 660],
        // ["2017", 1030],
        // ["20178", 900],
      ],
      chartOptions: {
        title: "สิทธิการรักษา",
        titleTextStyle: { fontName: "Kanit", fontSize: "20" },
        height: 400,

        legend: { position: "labeled" },
        pieSliceTextStyle: { fontSize: 14 },
        // sliceVisibilityThreshold: 0.05,
        pieSliceText: "value",
        // pieResidueSliceLabel: "อื่นๆ",
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
