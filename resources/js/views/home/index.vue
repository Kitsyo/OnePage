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
                        <img src="/images/prueba_clavo.svg" class="clavo_img" alt="cartel de se busca">
                        <h3>¿Aún no has desembarcado?</h3>
                        <h4>Regístrate gratis</h4>
                        <form @submit.prevent="submitRegister">
                            <div class="">
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ $t('name') }}</label>
                                    <input v-model="registerForm.name" id="name" type="text" class="form-control" autofocus>
                                    <!-- Validation Errors -->
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.name">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ $t('email') }}</label>
                                    <input v-model="registerForm.email" id="email" type="email" class="form-control" autocomplete="username">
                                    <!-- Validation Errors -->
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.email">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">
                                        {{ $t('password') }}
                                    </label>
                                    <input v-model="registerForm.password" id="password" type="password" class="form-control" autocomplete="current-password">
                                    <!-- Validation Errors -->
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">
                                        {{ $t('confirm_password') }}
                                    </label>
                                    <input v-model="registerForm.password_confirmation" id="password_confirmation" type="password" class="form-control" autocomplete="current-password">
                                    <!-- Validation Errors -->
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password_confirmation">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="flex items-center justify-end mt-4">
                                    <button class="btn btn-primary" :class="{ 'opacity-25': processing }" :disabled="processing">
                                        {{ $t('register') }}
                                    </button>
                                </div>
                            </div>
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
        <div class="card">
            <Carousel>
                <template>
                    <div class="border-1 surface-border border-round m-2  p-3">
                        <div class="mb-3">
                            <div class="relative mx-auto">
                            </div>
                        </div>
                        <div class="mb-3 font-medium">ASDASDASd</div>
                        <div class="flex justify-content-between align-items-center">
                            <div class="mt-0 font-semibold text-xl">12€</div>
                            <span>
                            <Button icon="pi pi-heart" severity="secondary" outlined />
                            <Button icon="pi pi-shopping-cart" class="ml-2"/>
                        </span>
                        </div>
                    </div>
                </template>
            </Carousel>
        </div>
    </section>

</template>

<script setup>
import axios from 'axios';
import {ref, onMounted} from 'vue'
import useAuth from '@/composables/auth'

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

const posts = ref();

onMounted(() => {
    axios.get('/api/get-posts').then(({data}) => {
        posts.value = data;
    })
})

//Carrousel script
</script>

<style scoped>
.section-bg {
    background-image: url('/images/prueba_fondo2.jpg');
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
    transform: rotate(5deg);
}
.clavo_img{
    width:32px;
    height:32px;
}
</style>
