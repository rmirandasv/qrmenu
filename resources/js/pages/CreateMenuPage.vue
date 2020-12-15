<template>
  <v-container>
      <h4 class="text-h4 white--text">Agregar página</h4>
      <v-sheet elevation="2">
          <v-container>
            <v-text-field
                outlined
                filled
                autofocus
                label="Nombre de pagina"
                placeholder="Posstres"
                persistent-hint
                hint="Por ejemplo postres, bebudas, etc."
                v-on:input="setName"></v-text-field>
            <v-file-input
                outlined
                filled
                label="Portada de pagina"
                persistent-hint
                hint="Una imagen de portada para la página del menú"
                v-on:change="uploadCover"></v-file-input>
            <v-btn color="deep-purple white--text"
                :disabled="isDisabled"
                :loading="isLoading"
                @click.prevent="createPage">Crear</v-btn>
          </v-container>
          <v-container v-if="cover">
              <v-parallax :src="cover">
                  <v-container>
                      <v-row justify="center">
                          <v-col cols="auto" class="black">
                              <h5 v-if="name" class="text-h5 white--text">{{ name }}</h5>
                          </v-col>
                      </v-row>
                  </v-container>
              </v-parallax>
          </v-container>
      </v-sheet>
  </v-container>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {

    computed: {
        ...mapGetters({
            cover: 'page/cover',
            name: 'page/name',
            isDisabled: 'page/isCreateButtonDisabled',
            isLoading: 'page/isLoading'
        })
    },

    methods:{
        ...mapActions({
            uploadCover: 'page/uploadCover',
            createPage: 'page/createPage',
            setName: 'page/setName'
        })
    }

}
</script>

<style>

</style>