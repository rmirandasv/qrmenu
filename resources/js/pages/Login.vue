<template>
  <v-container>
    <v-sheet elevation="4">
      <v-container>
        <v-row>
          <v-col>
            <h1 class="text-h4">Iniciar sesión</h1>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
              autofocus
              outlined
              filled
              v-on:keyup.enter="login"
              v-on:input="setEmail"
              label="Correo electrónico"></v-text-field>
            <v-text-field
              outlined
              filled
              type="password"
              v-on:keyup.enter="login"
              v-on:input="setPassword"
              label="Contraseña"></v-text-field>
            <v-btn color="deep-purple white--text" 
              :disabled="isLoginButtonDisabled" @click.prevent="login"
              :loading="isLoading">
              Entrar
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-sheet>
  </v-container>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {

  computed: {
    ...mapGetters({
      isLoginButtonDisabled: 'auth/isLoginButtonDisabled',
      isLoading: 'auth/isLoading'
    })
  },

  methods: {
    ...mapActions({
      setEmail: 'auth/setEmail',
      setPassword: 'auth/setPassword',
      login: 'auth/login'
    })
  }

}
</script>

<style>

</style>