<template>
  <v-container>
      <h4 class="text-h4 white--text">Crear Menu</h4>
      <v-sheet elevation="2">
          <v-container>
            <v-row>
                <v-col>
                    <v-text-field
                        outlined
                        filled
                        label="Nombre"
                        v-on:input="setName"
                        placeholder="Menu en restaurante"></v-text-field>
                    <h5 v-if="menu" class="text-h5">{{ menu.name }}</h5>
                </v-col>
            </v-row>
            <v-row justify="end" v-if="cover">
                <v-col cols="auto">
                    <v-btn text color="deep-purple" @click.prevent="cleanCover">Cambiar portada</v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-img :src="cover" v-if="cover" />
                    <v-file-input
                    v-else
                    label="Cover"
                    outlined
                    filled
                    persistent-hint
                    v-on:change="uploadCover"
                    :loading="isUploadingCover"
                    hint="Una imagen de portada para tu menu"></v-file-input>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-btn color="deep-purple white--text" 
                        @click.prevent="createMenu"
                        :disabled="isCreateMenuButtonDisabled"
                        :loading="isCreatingMenu">Crear</v-btn>
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
            cover: 'menu/cover',
            menu: 'menu/menu',
            isUploadingCover: 'menu/isUploadingCover',
            isCreateMenuButtonDisabled: 'menu/isCreateMenuButtonDisabled',
            isCreatingMenu: 'menu/isLoading'
        })
    },

    methods: {
        ...mapActions({
            setName: 'menu/setMenuName',
            uploadCover: 'menu/setMenuCover',
            cleanCover: 'menu/cleanCover',
            createMenu: 'menu/createMenu'
        })
    }


}
</script>

<style>

</style>