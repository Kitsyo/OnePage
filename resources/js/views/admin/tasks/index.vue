<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las tareas</h5>
                        <div>
                            <button class="btn btn-success" type="button">Nueva Tarea</button>
                        </div>
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
                            <tr v-for="(task,index) in tasks">
                                <td class="text-center">{{ task.id }}</td>
                                <td>{{task.name}}</td>                                
                                <td>{{task.description}}</td>
                                <td>{{task.date_open}}</td>
                                <th>{{task.date_close}}</th>
                                <td class="text-center">
                                    <a class="btn btn-warning mr-1">Edit</a>
                                    <button class="btn btn-danger" @click="deleteTask(task.id, index)">Delete</button>
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
import {ref, onMounted} from "vue"
const tasks = ref();

    onMounted(()=>{
        // console.log('Mi vista esta montada');
        axios.get('/api/tasks')
        .then(response => {
            tasks.value = response.data;
            console.log(response.data);
        })  
    });

    const deleteTask = (id,index) => {
        axios.delete('/api/tasks/'+id)
        .then(response => {
            tasks.value.splice(index,1);
        }).catch(error =>{
            console.log(error)
        })
    }

</script>


<style>


</style>
