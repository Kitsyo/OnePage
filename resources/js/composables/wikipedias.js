import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useWikipedias() {
    const wikipedias = ref({})
    const wikipedia = ref({
        title: '',
        content: '',
        categoria_id: ''
    })
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getWikipedias = async (
        page = 1,
        search_categoria = '',
        search_id = '',
        search_title = '',
        search_content = '',
        search_global = '',
        order_column = 'created_at',
        order_direction = 'desc'
    ) => {
        axios.get('/api/wiki?page=' + page +
            '&search_categoria=' + search_categoria +
            '&search_id=' + search_id +
            '&search_title=' + search_title +
            '&search_content=' + search_content +
            '&search_global=' + search_global +
            '&order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                wikipedias.value = response.data;
            })
    }

    const getWikipedia = async (id) => {
        axios.get('/api/wiki/' + id)
            .then(response => {
                wikipedia.value = response.data.data;
            })
    }

    const storeWikipedia = async (wikipedia) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        let serializedWikipedia = new FormData()
        for (let item in wikipedia) {
            if (wikipedia.hasOwnProperty(item)) {
                serializedWikipedia.append(item, wikipedia[item])
            }
        }

        axios.post('/api/wiki', serializedWikipedia, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
            .then(response => {
                router.push({ nombre: 'wikipedias.index' })
                swal({
                    icon: 'success',
                    title: 'Wikipedia saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const updateWikipedia = async (wikipedia) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/wiki/update/' + wikipedia.id, wikipedia, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
        .then(response => {
            router.push({ nombre: 'wikipedias.index' })
            console.log(response);
            swal({
                icon: 'success',
                title: 'Wikipedia updated successfully'
            })
        })
        .catch(error => {
            if (error.response?.data) {
                validationErrors.value = error.response.data.errors
            }
        })
        .finally(() => isLoading.value = false)
    }

    const deleteWikipedia = async (id) => {
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
                    axios.delete('/api/wiki/' + id)
                        .then(response => {
                            getWikipedias()
                            router.push({ nombre: 'wikipedias.index' })
                            swal({
                                icon: 'success',
                                title: 'Wikipedia deleted successfully'
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

    return {
        wikipedias,
        wikipedia,
        getWikipedias,
        getWikipedia,
        storeWikipedia,
        updateWikipedia,
        deleteWikipedia,
        validationErrors,
        isLoading,
        router
    }
}
