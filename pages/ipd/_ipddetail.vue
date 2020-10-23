<template>
  <v-container grid-list-xl fluid>
    <v-layout row wrap>
      <v-flex sm12>
        <div class="headline grey--text text--darken-1 mainhead">
          <h3>
            <v-icon large>{{ iconmain }}</v-icon> {{ titlemain }}
          </h3>
        </div>
      </v-flex>

      <v-flex sm12 md9 sm9>
        <v-widget title="กราฟแสดงจำนวนแยกตามหอผู้ป่วย" :colors="chartcolor">
          <div slot="widget-content">
            <bar-chart
              v-if="loaddata_bar"
              :ipddetail="ipddetail"
              :ipdall_chart_bar_name="ipdall_chart_bar_name"
              :ipdall_chart_bar_sum="ipdall_chart_bar_sum"
            ></bar-chart>
          </div>
        </v-widget>
      </v-flex>
      <v-flex sm12 md3 sm3>
        <v-widget title="กราฟแสดงตามระดับอาการ" :colors="chartcolor">
          <div slot="widget-content">
            <doughnut-chart
              v-if="loaddata_donut"
              :ipddetail="ipddetail"
              :ipdall_chart_donut_name="ipdall_chart_donut_name"
              :ipdall_chart_donut_sum="ipdall_chart_donut_sum"
            ></doughnut-chart>
          </div>
        </v-widget>
      </v-flex>
      <!-- <v-flex sm12 md12 sm12>
        <v-widget title="กราฟแสดงตามระดับอาการ" :colors="chartcolor">
          <div slot="widget-content">
            <GChart
              v-if="loaddata_google"
              type="ColumnChart"
              :data="chartData"
              :options="Options"
            ></GChart>
        
          </div>
        </v-widget>
      </v-flex> -->
    </v-layout>
  </v-container>
</template>

<script>
import VWidget from "@/components/VWidget";
import axios from "axios";
import LineChart from "@/components/LineChart";
import BarChart from "@/components/BarChart";
import DoughnutChart from "@/components/DoughnutChart";
import { GChart } from "vue-google-charts";
export default {
  components: {
    VWidget,
    LineChart,
    BarChart,
    DoughnutChart,
    GChart,
  },
  data() {
    return {
      loaddata_bar: false,
      loaddata_donut: false,
      loaddata_google: false,
      chartcolor: null,
      iconmain: null,
      titlemain: null,
      ipdall_chart_bar: null,
      ipdall_chart_bar_name: null,
      ipdall_chart_bar_sum: null,
      ipdall_chart_donut: null,
      ipdall_chart_donut_name: null,
      ipdall_chart_donut_sum: null,
      ipddetail: this.$route.params.ipddetail,

      // google chart
      // chartData: [
      //   // ["Year", "ward"],
      //   // ["2014", 1000],
      //   // ["2015", 1170],
      //   // ["2016", 660],
      //   // ["2017", 1030],
      // ],
      // Options: {
      //   title: "Company Performance",

      //   hAxis: {
      //     title: "Time of Day",
      //   },
      //   vAxis: {
      //     title: "Rating (scale of 1-10)",
      //   },
      // },
    };
  },
  computed: {},
  beforeMount() {
    this.feathipd_all_chart_bar();
    this.feathipd_all_donut_bar();
    // this.feathgoogle();
  },
  mounted() {
    this.changetitlecolor();
  },

  methods: {
    changetitlecolor() {
      if (this.$route.params.ipddetail == "ipdall") {
        this.chartcolor = "#FF6E40";
        this.iconmain = "groups";
        this.titlemain = "จำนวนคนไข้ ณ ปัจจุบัน";
      } else if (this.$route.params.ipddetail == "ipdnew") {
        this.chartcolor = "#FFCC80";
        this.iconmain = "group_add";
        this.titlemain = "จำนวนคนไข้รับใหม่";
      } else if (this.$route.params.ipddetail == "ipdold") {
        this.chartcolor = "#F06292";
        this.iconmain = "transfer_within_a_station";
        this.titlemain = "จำนวนยอดยกมา";
      } else if (this.$route.params.ipddetail == "ipdout") {
        this.chartcolor = "#880E4F";
        this.iconmain = "wc";
        this.titlemain = "จำนวนคนไข้จำหน่าย";
      }
    },
    //แสดง chart bar
    async feathipd_all_chart_bar() {
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_all_chart_bar.php`, {
          params: {
            ipddetail: this.$route.params.ipddetail,
          },
        })
        .then((response) => {
          this.ipdall_chart_bar = response.data;
          this.loaddata_bar = true;

          //เอาข้อความไปใส่ labels
          this.ipdall_chart_bar_name = this.ipdall_chart_bar.map(
            (item) => item.halfplace
          );

          //เอาผลรวมไปใส่ใน data
          this.ipdall_chart_bar_sum = this.ipdall_chart_bar.map(
            (item) => item.ipdall
          );
        });
    },
    //แสดง doughnut bar
    async feathipd_all_donut_bar() {
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_all_chart_doughnut.php`, {
          params: {
            ipddetail: this.$route.params.ipddetail,
          },
        })
        .then((response) => {
          this.ipdall_chart_donut = response.data;

          this.loaddata_donut = true;

          //เอาข้อความไปใส่ labels
          this.ipdall_chart_donut_name = this.ipdall_chart_donut.map(
            (item) => item.halfplace
          );

          //เอาผลรวมไปใส่ใน data
          this.ipdall_chart_donut_sum = this.ipdall_chart_donut.map(
            (item) => item.ipdall
          );
        });
    },
    // async feathgoogle() {
    //   await axios
    //     .get(`${this.$axios.defaults.baseURL}ipd_all copy.php`)
    //     .then((response) => {
    //       this.loaddata_google = true;
    //       this.chartData = response.data;

    //       console.log(this.chartData);
    //     });
    // },
  },
};
</script>
<style>
.columnChart {
  height: 300px;
}
h2,
h3 {
  font-family: "Kanit", sans-serif;
}
</style>
