<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Añade una tarea nueva</h5>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong></strong>
            </div><div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong></strong>
            </div>
                   
            <form>
                <div class="form-group mb-2">
                    <label>Nombre</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control" placeholder="Nombre tarea">
                </div>


                <div class="form-group mb-2">
                    <label>Descripción</label><span class="text-danger"> *</span>
                    <textarea class="form-control" rows="3" placeholder="Descripción"></textarea>
                </div>


                <div class="form-gorup mb-2">
                    <label>Fecha inicio</label><span class="text-danger">*</span>
                    <input class="form-control" type="datetime-local" name="date_open"/>
                </div>


                <div class="form-gorup mb-2">
                    <label>Fecha fin</label><span class="text-danger">*</span>
                    <input class="form-control" type="datetime-local" name="date_close"/>
                </div>


                <button type="submit" class="btn btn-primary mt-4 mb-4">Añadir Tarea</button>


            </form>


        </div>
    </div>
</template>
    
<script setup>
    import { ref, onMounted } from "vue";
</script>

<style>
</style>