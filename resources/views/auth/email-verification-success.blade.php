<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Qrmenus</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            #app {
                background: #673AB7; 
            }
        </Style>
    </head>
    <body>
        <div id="app">
            <v-app>
                <v-container>
                    <v-row>
                        <v-col>
                            <h2 class="text-h5 white--text">
                                Tu cuenta se validó con éxito.
                            </h2>
                            <v-btn href="/#/login" color="purple" class="white--text">
                                Iniciar sesión
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-app>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>