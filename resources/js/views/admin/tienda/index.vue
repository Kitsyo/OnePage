<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las tareas</h5>
                        <div></div>
                    </div>

                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                        <tr>
                            <th width="50" class="text-center">#</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>date_open</th>
                            <th>date_close</th>
                            <th class="text-center" width="200">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">s</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th></th>
                            <td class="text-center"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- Primera vista de prueba, aqui finaliza la plantilla html -->
<script setup>

import {ref, onMounted, inject} from "vue"
const productos = ref();
const swal = inject('$swal');
onMounted(()=>{
    console.log('Mi vista esta montada');
    axios.get('/api/tienda')
        .then(response => {
            productos.value = response.data;
        })
});

</script>

<style scoped>

</style>
