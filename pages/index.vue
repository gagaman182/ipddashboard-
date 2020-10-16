<template>
  <v-container grid-list-xl fluid>
    <!-- dashboard top -->
    <v-layout row wrap>
      <DashboardTop
        :ipd_all="ipd_all"
        :ipd_new="ipd_new"
        :ipd_old="ipd_old"
        :ipd_out="ipd_out"
        @detail-ipd-all="detail_ipd_all"
        @detail-ipd-new="detail_ipd_new"
        @detail-ipd-old="detail_ipd_old"
        @detail-ipd-out="detail_ipd_out"
        :showprogress="showprogress"
      ></DashboardTop>
    </v-layout>
    <!-- end -->
    <!-- dashboard middle -->
    <v-layout row wrap>
      <DashboardMiddle></DashboardMiddle>
    </v-layout>
    <!-- end -->
    <!-- dashboard lower -->

    <v-layout row wrap> <DashboardLower></DashboardLower> </v-layout>
  </v-container>
</template>

<script>
import DashboardTop from "@/components/dashboard/DashboardTop";
import DashboardMiddle from "@/components/dashboard/DashboardMiddle";
import DashboardLower from "@/components/dashboard/DashboardLower";
import axios from "axios";

export default {
  data() {
    return {
      show: true,
      datadashboard: { d1: "99.9%", d2: "50", d3: "4500", d4: "0.89" },
      ipd_all: null,
      ipd_new: null,

      ipd_old: null,
      ipd_out: null,
      showprogress: false,
    };
  },
  components: {
    DashboardTop,
    DashboardMiddle,
    DashboardLower,
  },
  mounted() {
    this.feathipd_all();
    this.feathipd_new();
    this.feathipd_old();
    this.feathipd_out();
  },
  methods: {
    //ผู้ป่วยipdทั้งหมด
    async feathipd_all() {
      this.showprogress = true;
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_all.php`)
        .then((response) => {
          this.ipd_all = response.data[0].ipdall;
          this.showprogress = false;
        });
    },
    //ผู้ป่วยipdใหม่
    async feathipd_new() {
      this.showprogress = true;
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_new.php`)
        .then((response) => {
          this.ipd_new = response.data[0].ipdnew;
          this.showprogress = false;
        });
    },
    //ผู้ป่วยipdเก่า
    async feathipd_old() {
      this.showprogress = true;
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_old.php`)
        .then((response) => {
          this.ipd_old = response.data[0].ipdold;
          this.showprogress = false;
        });
    },
    //ผู้ป่วยipdออก
    async feathipd_out() {
      this.showprogress = true;
      await axios
        .get(`${this.$axios.defaults.baseURL}ipd_out.php`)
        .then((response) => {
          this.ipd_out = response.data[0].ipdout;
          this.showprogress = false;
        });
    },
    //click ปุ่มไปหน้า detail
    detail_ipd_all(payload) {
      $nuxt._router.push(payload.message);
    },
    detail_ipd_new(payload) {
      $nuxt._router.push(payload.message);
    },
    detail_ipd_old(payload) {
      $nuxt._router.push(payload.message);
    },
    detail_ipd_out(payload) {
      $nuxt._router.push(payload.message);
    },
  },
};
</script>
<style scoped>
.mt-45 {
  margin-top: -45px;
}
.mt-56 {
  margin-top: -56px;
}
</style>
