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

      <!-- progress -->
      <v-flex sm12 md3 sm3>
        <v-widget title="กราฟแสดงตามเพศ" :colors="chartcolor">
          <div slot="widget-content">
            <v-progress-circular
              :size="350"
              :width="70"
              :rotate="360"
              :value="ipdall_progrerss_sex_m"
              color="#FDDC5C"
            >
              <h2>{{ "ชาย" }} {{ parseInt(ipdall_progrerss_sex_m) }}%</h2>
            </v-progress-circular>
          </div>
        </v-widget>
      </v-flex>
      <v-flex sm12 md3 sm3>
        <v-widget title="กราฟแสดงตามเพศ" :colors="chartcolor">
          <div slot="widget-content">
            <v-progress-circular
              :size="350"
              :width="70"
              :rotate="360"
              :value="ipdall_progrerss_sex_f"
              color="#475F94"
              :height="20"
            >
              <h2>{{ "หญิง" }} {{ parseInt(ipdall_progrerss_sex_f) }}%</h2>
            </v-progress-circular>
          </div>
        </v-widget>
      </v-flex>

      <!-- google chart -->
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
      <!-- google column chart -->
      <v-flex sm12 md12 sm12>
        <v-widget title="กราฟแสดงตามช่วงอายุ" :colors="chartcolor">
          <div slot="widget-content">
            <StackedColumn
              v-if="loaddata_age"
              :chartData="ipdall_age"
            ></StackedColumn>
          </div>
        </v-widget>
      </v-flex>
      <!-- time line chartjs -->
      <v-flex sm12 md12 sm12>
        <v-widget title="กราฟแสดงตามช่วงเวลา" :colors="chartcolor">
          <div slot="widget-content">
            <LineChartTime
              v-if="loaddata_time"
              :ipdall_time_line_data="ipdall_time_line_data"
            ></LineChartTime>
          </div>
        </v-widget>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import VWidget from "@/components/VWidget";
import axios from "axios";
import LineChartTime from "@/components/chart/chartjs/LineChartTime";
import BarChart from "@/components/chart/chartjs/BarChart";
import DoughnutChart from "@/components/chart/chartjs/DoughnutChart";
import PieChartHorizon from "@/components/chart/google/PieChartHorizon";
import StackedColumn from "@/components/chart/google/StackedColumn";

export default {
  components: {
    VWidget,
    LineChartTime,
    BarChart,
    DoughnutChart,
    PieChartHorizon,
    StackedColumn,
  },
  data() {
    return {
      loaddata_bar: false,
      loaddata_donut: false,
      loaddata_google: false,
      loaddata_apex: false,
      loaddata_sex: false,
      loaddata_age: false,
      loaddata_time: false,
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
      ipdall_age: null,
      ipdall_time_line: null,
      ipdall_time_line_data: null,
      ipdall_progrerss_sex: 0,
      ipdall_progrerss_sex_m: 0,
      ipdall_progrerss_sex_f: 0,

      ipddetail: this.$route.params.ipddetail,
    };
  },
  computed: {},
  beforeMount() {
    this.feathipd_all_chart_bar();
    this.feathipd_all_donut_bar();
    this.feathgoogle_pie();
    this.feathprogress_sex();
    this.feathage();
    this.feathline_time();
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
        });
    },

    //fresh sex progress
    async feathprogress_sex() {
      await axios
        .get(`${this.$axios.defaults.baseURL}progress_sex.php`, {
          params: {
            ipddetail: this.$route.params.ipddetail,
          },
        })
        .then((response) => {
          this.loaddata_sex = true;
          this.ipdall_progrerss_sex = response.data;
          console.log(this.ipdall_progrerss_sex);
          this.ipdall_progrerss_sex_m = this.ipdall_progrerss_sex.map(
            (item) => item.m
          );

          this.ipdall_progrerss_sex_f = this.ipdall_progrerss_sex.map(
            (item) => item.f
          );
        });
    },

    //fresh age column bar
    async feathage() {
      await axios
        .get(
          `${this.$axios.defaults.baseURL}/google/ipd_age_column_chart.php`,
          {
            params: {
              ipddetail: this.$route.params.ipddetail,
            },
          }
        )
        .then((response) => {
          this.loaddata_age = true;
          this.ipdall_age = response.data;
        });
    },

    //fresh time line chart
    async feathline_time() {
      await axios
        .get(
          `${this.$axios.defaults.baseURL}chartjs/ipd_all_chart_line_time.php`,
          {
            params: {
              ipddetail: this.$route.params.ipddetail,
            },
          }
        )
        .then((response) => {
          this.loaddata_time = true;
          this.ipdall_time_line = response.data;

          this.ipdall_time_line_data = this.ipdall_time_line.map(
            (item) => item.time
          );
        });
    },
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
