<template>
  <v-container grid-list-xl fluid>
    <v-layout row wrap>
      <v-flex sm12 md6 sm6>
        <v-widget title="ข้อมูล"> </v-widget>
      </v-flex>
      <v-flex sm12 md6 sm6>
        <v-widget title="กราฟ">
          <div slot="widget-content"></div>
        </v-widget>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import VWidget from "@/components/VWidget";
export default {
  components: {
    VWidget,
  },
  computed: {
    showReset: function() {
      return (
        (((this.alert.showSuccess === this.alert.showError) ===
          this.alert.showWarnning) ===
          this.alert.showInfo) ===
        false
      );
    },
  },
  asyncData() {
    return {
      alert: {
        showSuccess: true,
        showError: true,
        showWarnning: true,
        showInfo: true,
      },
    };
  },
  methods: {
    handleReset() {
      this.alert.showError = true;
      this.alert.showSuccess = true;
      this.alert.showWarnning = true;
      this.alert.showInfo = true;
    },
  },
};
</script>
