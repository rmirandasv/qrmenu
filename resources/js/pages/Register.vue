<template>
  <v-container>
    <v-sheet elevation="4">
      <v-container>
        <v-row>
          <v-col>
            <h1 class="text-h4">Registro</h1>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field 
              v-on:input="setName"
              autofocus 
              filled 
              label="Nombre" 
              outlined></v-text-field>
            <v-text-field 
              v-on:input="setLastName"
              filled 
              label="Apelludo" 
              outlined></v-text-field>
            <v-text-field 
              v-on:input="setEmail"
              filled 
              label="Correo electronico" 
              outlined></v-text-field>
            <v-text-field
              v-on:input="setPassword"
              filled
              label="Password"
              type="password"
              outlined></v-text-field>
            <v-text-field 
              v-on:input="setCompanyName"
              filled 
              label="Nombre del restaurante" 
              outlined></v-text-field>
            <v-btn 
              :loading="isLoading"
              color="deep-purple white--text" 
              :disabled="submit_disabled" 
              @click.prevent="submit">
              Registrar
            </v-btn>
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
      submit_disabled: 'register/submit_disabled',
      isLoading: 'register/isLoading'
    })
  },
  methods: {
    ...mapActions({
      setName: 'register/setName',
      setLastName: 'register/setLastName',
      setEmail: 'register/setEmail',
      setCompanyName: 'register/setCompanyName',
      setPassword: 'register/setPassword',
      submit: 'register/register'
    })
  }
}
</script>

<style>

</style>