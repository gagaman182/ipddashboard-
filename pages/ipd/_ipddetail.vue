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
      <!-- chartjs -->
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

      <!-- google chart
      <v-flex sm12 md12 sm12>
        <v-widget title="กราฟแสดงตามระดับอาการ" :colors="chartcolor">
          <div slot="widget-content">
            <BarChartgoogle
              v-if="loaddata_google"
              :chartData="ipdall_google"
            ></BarChartgoogle>
          </div>
        </v-widget>
      </v-flex> -->

      <v-flex sm12 md6 sm6>
        <v-widget title="กราฟแสดงตามสิทธิการรักษา" :colors="chartcolor">
          <div slot="widget-content">
            <PieChartHorizon
              :chartData="ipdall_google_pie"
              v-if="loaddata_google"
            ></PieChartHorizon>
          </div>
        </v-widget>
      </v-flex>
      <!-- apex chart -->
      <!-- <v-flex sm12 md12 sm12>
        <v-widget title="กราฟแสดงตามระดับอาการ" :colors="chartcolor">
          <div slot="widget-content">
            <apexChartBar
              v-if="loaddata_apex"
              :categories="ipdall_apex_bar_name"
              :data="ipdall_apex_bar_sum"
            ></apexChartBar>
          </div>
        </v-widget>
      </v-flex> -->
    </v-layout>
  </v-container>
</template>

<script>
import VWidget from "@/components/VWidget";
import axios from "axios";
import LineChart from "@/components/chart/chartjs/LineChart";
import BarChart from "@/components/chart/chartjs/BarChart";
import DoughnutChart from "@/components/chart/chartjs/DoughnutChart";
// import BarChartgoogle from "@/components/chart/google/BarChartgoogle";
import PieChartHorizon from "@/components/chart/google/PieChartHorizon";

// import apexChartBar from "@/components/chart/apex/apexChartBar";
export default {
  components: {
    VWidget,
    LineChart,
    BarChart,
    DoughnutChart,
    // BarChartgoogle,
    PieChartHorizon,

    // apexChartBar,
  },
  data() {
    return {
      loaddata_bar: false,
      loaddata_donut: false,
      loaddata_google: false,
      loaddata_apex: false,
      chartcolor: null,
      iconmain: null,
      titlemain: null,
      ipdall_chart_bar: null,
      ipdall_chart_bar_name: null,
      ipdall_chart_bar_sum: null,
      ipdall_chart_donut: null,
      ipdall_chart_donut_name: null,
      ipdall_chart_donut_sum: null,
      ipdall_google_pie: null,
      ipdall_apex: null,
      ipdall_apex_bar_name: null,
      ipdall_apex_bar_sum: null,
      ipddetail: this.$route.params.ipddetail,
    };
  },
  computed: {},
  beforeMount() {
    this.feathipd_all_chart_bar();
    this.feathipd_all_donut_bar();
    this.feathgoogle_pie();
    // this.feathapex();
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
    //แสดง chart bar chartjs
    async feathipd_all_chart_bar() {
      await axios
        .get(`${this.$axios.defaults.baseURL}chartjs/ipd_all_chart_bar.php`, {
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
    //แสดง doughnut bar chartjs
    async feathipd_all_donut_bar() {
      await axios
        .get(
          `${this.$axios.defaults.baseURL}chartjs/ipd_all_chart_doughnut.php`,
          {
            params: {
              ipddetail: this.$route.params.ipddetail,
            },
          }
        )
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
    // //fresh bar google chart
    // async feathgoogle() {
    //   await axios
    //     .get(`${this.$axios.defaults.baseURL}google/ipd_all_google_2.php`)
    //     .then((response) => {
    //       this.loaddata_google = true;
    //       this.ipdall_google = response.data;
    //     });
    // },

    //fresh bar google chart
    async feathgoogle_pie() {
      await axios
        .get(`${this.$axios.defaults.baseURL}google/ipd_pie_chart.php`, {
          params: {
            ipddetail: this.$route.params.ipddetail,
          },
        })
        .then((response) => {
          this.loaddata_google = true;
          this.ipdall_google_pie = response.data;
          console.log(this.ipdall_google_pie);
        });
    },

    //fresh bar apex chart
    // async feathapex() {
    //   await axios
    //     .get(`${this.$axios.defaults.baseURL}apex/ipd_all_apex_bar.php`)
    //     .then((response) => {
    //       this.loaddata_apex = true;
    //       this.ipdall_apex = response.data;

    //       //เอาข้อความไปใส่ labels
    //       this.ipdall_apex_bar_name = this.ipdall_apex.map(
    //         (item) => item.halfplace
    //       );

    //       //เอาผลรวมไปใส่ใน data
    //       this.ipdall_apex_bar_sum = this.ipdall_apex.map(
    //         (item) => item.ipdall
    //       );
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
