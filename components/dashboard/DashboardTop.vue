<template>
  <v-container grid-list-xl fluid>
    <v-layout row wrap>
      <v-flex sm12>
        <div class="headline grey--text text--darken-1 mainhead">
          <h3><v-icon large>web</v-icon> จำนวนบริการผู้ป่วยใน</h3>
        </div>
      </v-flex>
      <v-flex lg3 sm12>
        <v-card color="deep-orange accent-2 white--text">
          <v-card-title class="pb-0">
            <h2>จำนวนคนไข้ ณ ปัจจุบัน</h2>
          </v-card-title>

          <v-card-text>
            <div class="text-xs-center d-flex align-center">
              <v-icon large color="white lighten-3 ">groups</v-icon>

              <h3 class="display-2">{{ ipd_all }}</h3>

              <v-progress-circular
                v-if="showprogress"
                indeterminate
                color="grey lighten-5"
              ></v-progress-circular>
            </div>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn dark flat small @click="detail_ipd_all()">
              <v-icon color="white lighten-3">slideshow</v-icon></v-btn
            >
          </v-card-actions>
        </v-card>
      </v-flex>
      <v-flex lg3 sm12>
        <v-card color="orange lighten-3 white--text ">
          <v-card-title class="pb-0">
            <h2>จำนวนคนไข้รับใหม่</h2>
          </v-card-title>
          <v-card-text>
            <div class="text-xs-center d-flex align-center">
              <v-icon large color="white lighten-3">group_add</v-icon>
              <h3 class="display-2">{{ ipd_new }}</h3>
              <v-progress-circular
                v-if="showprogress"
                indeterminate
                color="grey lighten-5"
              ></v-progress-circular>
            </div>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn dark flat small @click="detail_ipd_new()">
              <v-icon color="white lighten-3">slideshow</v-icon></v-btn
            >
          </v-card-actions>
        </v-card>
      </v-flex>
      <v-flex lg3 sm12>
        <v-card color="pink lighten-2 white--text">
          <v-card-title class="pb-0">
            <h2>จำนวนยอดยกมา</h2>
          </v-card-title>
          <v-card-text class="white--text">
            <div class="text-xs-center d-flex align-center">
              <v-icon large color="white lighten-3"
                >transfer_within_a_station</v-icon
              >
              <h3 class="display-2">{{ ipd_old }}</h3>
              <v-progress-circular
                v-if="showprogress"
                indeterminate
                color="grey lighten-5"
              ></v-progress-circular>
            </div>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn dark flat small @click="detail_ipd_old()">
              <v-icon color="white lighten-3">slideshow</v-icon></v-btn
            >
          </v-card-actions>
        </v-card>
      </v-flex>
      <v-flex lg3 sm12>
        <v-card color="pink darken-4 white--text">
          <v-card-title class="pb-0">
            <h2>จำนวนคนไข้จำหน่าย</h2>
          </v-card-title>
          <v-card-text class="white--text">
            <div class="text-xs-center d-flex align-center">
              <v-icon large color="white lighten-3">wc</v-icon>
              <h3 class="display-2">{{ ipd_out }}</h3>
              <v-progress-circular
                v-if="showprogress"
                indeterminate
                color="grey lighten-5"
              ></v-progress-circular>
            </div>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <!-- <v-btn  dark flat small>คลิก</v-btn> -->
            <v-btn dark flat small @click="detail_ipd_out()">
              <v-icon color="white lighten-3">slideshow</v-icon></v-btn
            >
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
    <span>{{ today }}</span>
  </v-container>
</template>

<script>
import moment from "moment";
export default {
  name: "dashboardtop",
  data() {
    return {};
  },
  computed: {
    today: function() {
      return moment()
        .add("years", 543)
        .lang("th")
        .format("Do MMMM YYYY ");
    },
  },
  props: {
    ipd_all: null,
    ipd_new: null,
    ipd_old: null,
    ipd_out: null,
    showprogress: null,
  },
  methods: {
    detail_ipd_all() {
      this.$emit("detail-ipd-all", { message: "/ipd/ipdall" });
    },
    detail_ipd_new() {
      this.$emit("detail-ipd-new", { message: "/ipd/ipdnew" });
    },
    detail_ipd_old() {
      this.$emit("detail-ipd-old", { message: "/ipd/ipdold" });
    },
    detail_ipd_out() {
      this.$emit("detail-ipd-out", { message: "/ipd/ipdout" });
    },
  },
};
</script>
<style scoped>
h2,
h3 {
  font-family: "Kanit", sans-serif;
}
</style>
