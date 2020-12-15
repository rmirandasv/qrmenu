<template>
    <v-app-bar 
      app
      dense
      dark
      color="deep-purple">
      <v-toolbar-title>QR Menus</v-toolbar-title>
      <v-spacer />
      <v-btn :to="{ name: 'register'}" color="white" class="black--text mx-2">Registrarse</v-btn>
      <v-btn :to="{ name: 'login' }" color="white" class="black--text">Iniciar Sesión</v-btn>
    </v-app-bar>
</template>

<script>
export default {

}
</script>

<style>

</style>