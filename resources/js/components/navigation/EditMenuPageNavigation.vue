<template>
  <v-app-bar app prominent :src="cover" flat>
      <v-toolbar-title class="black white--text">{{ name }}</v-toolbar-title>
  </v-app-bar>
</template>

<script>

import { mapGetters } from 'vuex'

export default {

    computed: {
        ...mapGetters({
            cover: 'page/cover',
            name: 'page/name'
        })
    }

}
</script>

<style>

</style>