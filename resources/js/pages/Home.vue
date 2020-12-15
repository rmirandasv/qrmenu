<template>
  <v-container>
    <v-alert type="info" border="left" elevation="1" v-if="menu.name === null">
        <p>
          Hola {{ user.name }}, bienvenido a QR Menus. Aún no has creado y personalizado el menú 
          de tu restaurante. Creaglo ahora mismo.
        </p>
    </v-alert>
    <v-sheet elevation="2">
      <v-overlay v-show="isLoading">
        <v-progress-circular color="deep-purple"></v-progress-circular>
      </v-overlay>
      <v-container>
        <v-row v-if="menu.name === null">
          <v-col>
            <p>
              Aún no has creado y presonalizado tu menú.
            </p>
            <v-btn color="deep-purple white--text" :to="{ name: 'createMenu' }">Comenzar ahora</v-btn>
          </v-col>
        </v-row>
        <v-row v-else>
          <v-col>
            <v-parallax :src="menu.cover">
              <v-container>
                <v-row justify="center">
                  <v-col cols="auto" class="black">
                    <h5 class="text-h5"> {{ menu.name }}</h5>
                  </v-col>
                </v-row>
              </v-container>
            </v-parallax>
          </v-col>
        </v-row>
      </v-container>
    </v-sheet>
  </v-container>
</template>

<script>

import { mapActions, mapGetters } from 'vuex'

export default {

  computed: {
    ...mapGetters({
      user: 'user/user',
      menu: 'menu/menu',
      isLoading: 'menu/isLoading'
    })
  },

  methods: {
    ...mapActions({
    })
  },

}
</script>

<style>

</style>