<template>
  <v-container grid-list-xl fluid>
    <v-layout row wrap>
      <v-flex sm12>
        <div class="headline grey--text text--darken-1">
          <h3><v-icon large>local_hospital</v-icon> ward</h3>
        </div>
      </v-flex>
      <v-flex lg4 sm12>
        <v-card color="teal lighten-4">
          <v-responsive src="/static/bg/8.jpg" height="250">
            <h2 class="white--text pa-3">
              Card with image
            </h2>
          </v-responsive>
          <v-card-text>
            <div>
              <!-- {{ cardText }} -->
            </div>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn flat small>Link</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
      <v-flex lg4 sm12>
        <v-card color="teal lighten-4">
          <v-responsive src="/static/nature/n3.jpeg" height="250">
            <h2 class="white--text pa-3">
              Card with image
            </h2>
          </v-responsive>
          <v-card-text>
            <v-avatar size="64px" class="right mt-56">
              <img src="/static/avatar/man_2.jpg" alt="" />
            </v-avatar>
            <div>
              <!-- {{ cardText }} -->
            </div>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn flat small>Link</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
      <v-flex lg4 sm12>
        <v-card color="teal lighten-4">
          <v-responsive src="/static/nature/n4.jpeg" height="250">
            <h2 class="white--text pa-3">
              Card with image
            </h2>
          </v-responsive>
          <v-card-text>
            <v-btn icon fab color="red" dark class="right mt-45">
              <v-icon>favorite</v-icon>
            </v-btn>
            <div>
              <!-- {{ cardText }} -->
            </div>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn flat small>Link</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {};
</script>
<style scoped>
h2,
h3 {
  font-family: "Kanit", sans-serif;
}
</style>
