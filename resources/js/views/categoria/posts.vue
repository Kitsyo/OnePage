<template>
    <div class="container">
        <h2 class="text-center my-4">Categoria Wikipedia</h2>
        <div class="row mb-2">
            <div v-for="wikipedia in wikipedias?.data" :key="wikipedia.id" class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong v-for="categoria in wikipedia.categories" class="d-inline-block mb-2 text-primary">
                            {{ categoria.nombre }}
                        </strong>
                        <h3 class="mb-0">{{ wikipedia.titulo }}</h3>
                        <div class="mb-1 text-muted">{{ wikipedia.created_at }}</div>
                        <p class="card-text mb-auto">{{ wikipedia.contenido.substring(0, 90) + "..." }}</p>
                        <router-link :to="{ name: 'public-wikipedias.details', params: { id: wikipedia.id } }"
                                     class="stretched-link">Continue reading
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import {ref, onMounted} from 'vue'
import {useRoute} from "vue-router";

const route = useRoute();
const posts = ref();

onMounted(() => {
    axios.get('/api/get-categoria-posts/' + route.params.id).then(({data}) => {
        posts.value = data;
    })
})
</script>
