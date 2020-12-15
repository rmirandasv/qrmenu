<template>
  <v-app>
    <v-overlay z-index="7" absolute opacity="1" :value="isLoading">
      <v-progress-circular
        :size="70"
        :width="7"
        color="purple"
        indeterminate
      ></v-progress-circular>
    </v-overlay>
    <v-navigation-drawer 
      v-if="!['landingpage', 'register', 'login', 'verifyEmailPage'].includes(this.$route.name)"
      app
      color="deep-purple"
      :value="openDrawer">
      <v-container>
        <h2 class="text-h5 white--text">{{ user.company_name }}</h2>
      </v-container>
      <v-list dark>
        <v-list-item-group>
          <v-list-item :to="{ name: 'home' }">
            <v-list-item-icon><v-icon>home</v-icon></v-list-item-icon>
            <v-list-item-content>
              Home
            </v-list-item-content>
          </v-list-item>
          <v-list-item v-if="!menu.id" :to="{ name: 'createMenu'}">
            <v-list-item-icon>
              <v-icon>add</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              Crear Menu
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
        <v-subheader v-if="menu.name">{{ menu.name }}</v-subheader>
        <v-list-item-group v-if="menu.name">
          <v-list-item 
            v-for="page in pages" 
            :key="page.id" 
            :to="{ name: 'editMenuPage', params: { qrmenuId: page.qrmenu_id, pageId: page.id }}">
            <v-list-item-content>
              {{ page.name }}
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{ name: 'createMenuPage' }">
            <v-list-item-icon>
              <v-icon>add</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              Agregar pagina
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <router-view name="navigation"></router-view>
    <v-main class="deep-purple">
        <router-view name="main"></router-view>
    </v-main>
    <v-footer app color="deep-purple" padless absolute>
      <v-card color="deep-purple darken-4" dark width="100%">
        <v-container>
          <v-row>
            <v-col>
              <h1 class="text-h3 brand">QR Menus</h1>
              <p>QR Menus 2020</p>
            </v-col>
            <v-col>
              <v-btn text>Soporte</v-btn>
              <v-btn text>REgistrarse</v-btn>
              <v-btn text>Iniciar sesión</v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-footer>
  </v-app>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters({
      openDrawer: 'openDrawer',
      isLoading: 'isLoading',
      user: 'user/user',
      menu: 'menu/menu',
      pages: 'page/pages'
    })
  },
  methods: {
    ...mapActions({
      toggleDrawer: 'toggleDrawer',
      checkSession: 'auth/checkSession'
    })
  },

  created: function() {
    this.checkSession()
  }

}
</script>

<style>

</style>