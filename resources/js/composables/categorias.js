import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useCategorias() {
    const categorias = ref([])
    const categoriaList = ref([])
    const categoria = ref({
        nombre: ''
    })

    //const router = useRouter()
    //const validationErrors = ref({})
    //const isLoading = ref(false)
    //const swal = inject('$swal')

    const getCategorias = async (
        page = 1,
        search_id = '',
        search_title = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'desc'
    ) => {
        axios.get('/api/categorias?page=' + page +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                categorias.value = response.data;
            })
    }

    const getCategoria = async (id) => {
        axios.get('/api/categorias/' + id)
            .then(response => {
                categoria.value = response.data.data;
            })
    }

    const storeCategoria = async (categoria) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/categorias', categoria)
            .then(response => {
                router.push({nombre: 'categorias.index'})
                swal({
                    icon: 'success',
                    title: 'Categoria saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const updateCategoria = async (categoria) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/categorias/' + categoria.id, categoria)
            .then(response => {
                router.push({nombre: 'categorias.index'})
                swal({
                    icon: 'success',
                    title: 'Categoria updated successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const deleteCategoria = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/categorias/' + id)
                        .then(response => {
                            getCategorias()
                            router.push({nombre: 'categorias.index'})
                            swal({
                                icon: 'success',
                                title: 'Categoria deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })
    }

    const getCategoriaList = async () => {
        axios.get('/api/categoria-list')
            .then(response => {
                categoriaList.value = response.data.data;
            })
    }

    return {
        categoriaList,
        categorias,
        categoria,
        getCategorias,
        getCategoriaList,
        getCategoria,
        storeCategoria,
        updateCategoria,
        deleteCategoria
    }
}
