<template>
    <div>
        <v-parallax src="http://localhost:8000/img/qrbgblue.png">
            <v-container>
                <v-row>
                    <v-col>
                        <v-img 
                            lazy-src="http://localhost:8000/img/qrmenucode_thumb.png"
                            src="http://localhost:8000/img/qrmenucode.png" max-width="400" />
                    </v-col>
                    <v-col>
                        <h1 class="text-h1 brand">
                            QR Menus
                        </h1>
                        <h1 class="text-h4">
                            Crea un menú digital para tu restaurante, obten tu código QR
                            y comparte el menú con tus clientes.
                        </h1>
                        <v-btn class="mt-8 deep-purple" dark block x-large elevation="8" rounded>
                            Comenzar ahora
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-parallax>
        <v-container>
            <v-row>
                <v-col>
                    <v-sheet color="deep-purple lighten-5" elevation="8">
                        <v-container>
                            <h1 class="text-h4">¿Como funciona?</h1>
                            <v-divider></v-divider>
                            <p class="text-justify subtitle-1 pt-2">
                            QR Menus es un servicio que permite a sus clientes crear un menú digital para su
                            restaurante y luego generar un código QR único y personalizado el cual puedes 
                            imprimir y pegar en las mesas de tu resturante o en publicidad. Cuando un cliente 
                            escenee el código QR será dirigido a tu menú digital. Deja de depender de los menús 
                            en papel aora mismo y crea tu menú digital!
                            </p>
                        </v-container>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>