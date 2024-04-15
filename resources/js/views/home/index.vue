<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card pruebita"></div>
    </div>
    <section class="section-bg">
        <div class="container">
            <div class="row d-felx justify-content-center align-items-center">
                <!-- Contenedor para la imagen -->
                <div class="col-md-6">
                    <img src="/images/prueba-cartel2.png" alt="cartel de se busca" class="img-fluid">
                </div>
                <!-- Contenedor para el formulario -->
                <div class="col-md-6">
                    <div class="text-black form-container">
                        <h3>¿Aún no has desembarcado?</h3>
                        <h4>Regístrate gratis</h4>
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" placeholder="Cotnraseña">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-black">
            <h2>Mangas a la carta</h2>
        </div>
        <div class="mt-5">
            <img src="/images/separador.svg" alt="Separador" >
        </div>
    </section>
</template>

<script setup>
import axios from 'axios';
import {ref, onMounted} from 'vue'

const posts = ref();

onMounted(() => {
    axios.get('/api/get-posts').then(({data}) => {
        posts.value = data;
    })
})
</script>

<style scoped>
.section-bg {
    background-image: url('/images/prueba_fondo2.jpg'); /* Reemplaza 'tu-imagen.jpg' con la ruta de tu imagen de fondo */
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 80px 0;
    text-align: center;
}
.form-container {
    background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
    border-radius: 10px; /* Bordes redondeados */
    padding: 20px;
    max-width: 500px; /* Ancho máximo del contenedor */
    margin: 0 auto; /* Centrado horizontal */
}
</style>
