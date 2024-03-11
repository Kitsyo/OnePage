<template>
    {{ wikipedia }}
    <form @submit.prevent="submitForm">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <!-- titulo -->
                        <div class="mb-3">
                            <label for="wikipedia-titulo" class="form-label">
                                Titulo
                            </label>
                            <input v-model="wikipedia.titulo" id="wikipedia-titulo" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.titulo }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.titulo">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <!-- contenido -->
                        <div class="mb-3">
                            <label for="wikipedia-contenido" class="form-label">
                                Contenido
                            </label>
                            <TextEditorComponent v-model="wikipedia.contenido"/>
                            <div class="text-danger mt-1">
                                {{ errors.contenido }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.contenido">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg> Action
                        </h6>
                        <div class="mt-3 text-center">
                            <button :disabled="isLoading" class="btn btn btn-outline-primary me-2">
                                <div v-show="isLoading" class=""></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else>Save Draft</span>
                            </button>
                            <button :disabled="isLoading" class="btn btn-primary">
                                <div v-show="isLoading" class=""></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else>Publish</span>
                            </button>
                        </div>
                        <h6 class="mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg> categoria
                        </h6>

                        <div class="mb-3">
                            <v-select multiple v-model="wikipedia.categoria_id" :options="categoriaList"
                                      :reduce="categoria => categoria.id" label="nombre" class="form-control" placeholder="Select categoria"/>
                            <div class="text-danger mt-1">
                                {{ errors.categoria_id }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.categoria_id">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script setup>
import {onMounted, reactive, ref} from "vue";
import TextEditorComponent from "@/components/TextEditorComponent.vue";
import DropZone from "@/components/DropZone.vue";
import useCategoria_id from "@/composables/categorias";
import useWikipedias from "@/composables/wikipedias";
import {useForm, useField, defineRule} from "vee-validate";
import {required, min} from "@/validation/rules"

defineRule('required', required)
defineRule('min', min);

const dropZoneActive = ref(true)

const schema = {
    titulo: 'required|min:5',
    contenido: 'required',
    categoria_id: 'required'
}
const {validate, errors} = useForm({validationSchema: schema})
const {value: titulo} = useField('titulo', null, {initialValue: ''});
const {value: contenido} = useField('contenido', null, {initialValue: ''});
const {value: categoria_id} = useField('categoria_id', null, {initialValue: '', label: 'categoria'});
const {categoriaList, getCategoriaList} = useCategoria_id()
const {storeWikipedia, validationErrors, isLoading} = useWikipedias()
const wikipedia = reactive({
    titulo,
    contenido,
    categoria_id
})

const thefile = ref('')

function submitForm() {
    validate().then(form => {
        if (form.valid) storeWikipedia(wikipedia)
    })
}

onMounted(() => {
    getCategoriaList()
})

</script>
