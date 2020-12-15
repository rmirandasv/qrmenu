<template>
  <v-app-bar app dense color="deep-purple" dark>
      <v-toolbar-title>QR Menus</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu>
          <template v-slot:activator="{on}">
              <v-btn
                icon
                elevation="0"
                v-on="on">
                <v-icon class="pr-2">account_circle</v-icon>
                </v-btn>
          </template>
          <v-list>
              <v-list-item>
                  <v-list-item-title>
                      Configurción
                  </v-list-item-title>
              </v-list-item>
              <v-list-item @click.prevent="logout">
                  <v-list-item-title>
                      Salir
                  </v-list-item-title>
              </v-list-item>
          </v-list>
      </v-menu>
  </v-app-bar>
</template>

<script>

import { mapActions } from 'vuex'

export default {

    methods: {
        ...mapActions({
            logout: 'auth/logout'
        })
    }
    
}
</script>

<style>

</style>