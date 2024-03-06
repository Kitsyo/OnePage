<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las Wikipedias</h5>
                        <div>
                            <router-link :to="{titulo: 'wikipedias.create'}" class="btn btn-success" >Nueva wikipedia</router-link>
                        </div>
                    </div>

                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Titulo</th>
                                <th>contenido</th>
                                <th>usuario_id</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(wikipedia,index) in wikipedias">
                                <td class="text-center">{{ wikipedia.id }}</td>
                                <td>{{wikipedia.titulo}}</td>
                                <td>{{wikipedia.contenido}}</td>
                                <td>{{wikipedia.usuario_id}}</td>
                                <td class="text-center">
                                    <router-link :to="{titulo: 'wikipedias.update', params: {id: wikipedia.id} }" class="btn btn-warning me-2">Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteWikipedia(wikipedia.id, index)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import {ref, onMounted, inject} from "vue"
const wikipedias = ref();
const swal = inject('$swal');
    onMounted(()=>{
        // console.log('Mi vista esta montada');
        axios.get('/api/wiki')
        .then(response => {
            wikipedias.value = response.data;
        })
    });

    const deleteWikipedia = (id,index) => {
        axios.delete('/api/wiki/'+id)
        .then(response => {
            wikipedias.value.splice(index,1);
            swal({
                icon:'success',
                title:'Wikipedia eliminada correctamente'
            });
        }).catch(error =>{
            console.log(error)
            swal({
                icon:'Error',
                title:'La wikipedia no se ha eliminada correctamente'
            });

        });
    }

</script>

<style>

</style>
