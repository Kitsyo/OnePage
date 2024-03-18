<template>
    <div class="container">
        <h2 class="text-center my-4">Categoria producto</h2>
        <div class="row mb-2">
            <div v-for="producto in productos?.data" :key="producto.id" class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h3 class="mb-0">{{ producto.nombre }}</h3>
                        <div class="mb-1 text-muted">{{ producto.categoria_id }}</div>                                
                        <div class="card-text mb-auto" v-html="producto.descripcion.substring(0, 50) + '...'"></div>
                        <div class="card-text mb-auto" v-html="producto.precio + '€'"></div>
                        <router-link :to="{ name: 'public-productos.details', params: { id: producto.id } }"
                                     class="stretched-link">Ves al producto
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
const productos = ref();

onMounted(() => {
    axios.get('/api/get-categoria-productos/' + route.params.id).then(({data}) => {
        productos.value = data;
    })
})
</script>
