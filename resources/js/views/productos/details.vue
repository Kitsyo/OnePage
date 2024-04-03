<template>
    <div class="container">
        <div class="row g-5 mt-4 mb-5">
            <div class="col-md-8 bg-white text-dark">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{ producto?.nombre }}
            </h3>
            <p class="blog-producto-meta"><a href="#">{{ producto?.categorias?.nombre}}</a></p>

            <article class="blog-producto">
              <!--  <div v-for="image in producto?.media">
                    <img :src="image.original_url" alt="image" class="img-fluid">
                </div>-->
                <div class="row">
                    <div class="w-auto" v-for="categoria in producto?.categorias" :key="categoria.id">
                        <router-link :to="{ name: 'categoria-posts.index', params: { id: categoria.id } }">{{ categoria.nombre }}</router-link>        
                    </div>
                </div>
                <div class="mt-4" v-html="producto?.descripcion"></div>
                <div class="card-text mb-auto" v-html="producto?.precio + '€'"></div>
            </article>

            <nav class="blog-pagination" aria-label="Pagination">
                <router-link :to="{ name : 'public-productos.index'}" class="btn btn-outline-primary rounded-pill">Añade al carrito</router-link>
            </nav>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <!--<div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">Sobre</h4>
                    <p class="mb-0">Personaliza esta sección para dar más información sobre la publicación, escritores, descripcion o algo completamente diferente. Depende totalmente de ti.</p>
                    </div>-->

                    <div class="p-4 bg-light rounded">
                        <h4 class="fst-italic">Categorias</h4>
                        <ol v-if="categorias?.length > 0" class="list-unstyled">
                            <li v-for="categoria in categorias" :key="categoria.id">
                                <router-link :to="{ name: 'categoria-posts.index', params: { id: categoria.id } }">{{ categoria.nombre }}</router-link>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRoute } from "vue-router";


    const producto = ref();
    const categorias = ref();
    const route = useRoute()

    onMounted(() => {
        axios.get('/api/get-producto/' + route.params.id).then(({ data }) => {
            producto.value = data
        })
        axios.get('/api/categoria-list').then(({ data }) => {
            categorias.value = data.data
        })
    })
</script>
