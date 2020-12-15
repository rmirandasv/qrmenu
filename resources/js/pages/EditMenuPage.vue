<template>
  <v-container>
    {{ name }}
  </v-container>
</template>

<script>

import { mapActions, mapGetters } from 'vuex'

export default {

  computed: {
    ...mapGetters({
      name: 'page/name'
    })
  },

  methods: {
    ...mapActions({
      getPage: 'page/getPage'
    })
  },

  created: function() {
    this.getPage()
  }

}
</script>

<style>

</style>