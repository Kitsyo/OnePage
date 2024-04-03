<template>
    <div class="m-5 d-flex justify-content-center align-items-center">
        <div class="grid-center">
            <div class="col-12 xl:col-12">
                <div class="container">
                    <div id="carouselBanner" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/prueba_banner2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/prueba_banner3.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/prueba_banner5.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 xl:col-12">
                <div class="rounded mt-5 text-center">
                    <h3>Ultimas Noticias</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide carrousel-size carousel-dark slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-primary" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-primary" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-primary" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div v-for="post in posts?.data" :key="post.id" class="carousel-item active">
                                <div class="card text-center">
                                    <div class="card-header color-fondo-blanco">
                                        <h4>{{ post.title }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text" v-html="post.content.substring(0, 150) + '...'"></p>
                                    </div>
                                    <router-link :to="{ name: 'public-posts.details', params: { id: post.id } }" class="mb-2 stretched-link">Continual leyendo
                                    </router-link>
                                    <div class="card-footer color-fondo-blanco text-body-secondary">
                                        Fecha publicacion
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container col-12 xl:col-12">
                <div class="mt-5 text-center">
                    <i></i>
                    <h3>Multimedia</h3>
                </div>
            </div>
            <div class="col-6 xl:col-6">
                <div class="container">
                    <h4 class="text-center">Manga</h4>
                    <div class="accordion" id="accordionOne">
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <b>"categoria1"</b>
                                </button>
                            </h5>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>Tomo 1</p>
                                    <p>Tomo 2</p>
                                    <p>Tomo 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <b>"categoria2"</b>
                                </button>
                            </h5>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>Tomo 1</p>
                                    <p>Tomo 2</p>
                                    <p>Tomo 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <b>"categoria3"</b>
                                </button>
                            </h5>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                <div class="accordion-body">
                                    <p>Tomo 1</p>
                                    <p>Tomo 2</p>
                                    <p>Tomo 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 xl:col-6">
                <div class="container">
                    <h4 class="text-center">Videos</h4>
                    <div class="accordion" id="accordionTwo">
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                    <b>"categoria1"</b>
                                </button>
                            </h5>
                            <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Cap. 1</p>
                                    <p>Cap. 2</p>
                                    <p>Cap. 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                                    <b>"categoria2"</b>
                                </button>
                            </h5>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Cap. 1</p>
                                    <p>Cap. 2</p>
                                    <p>Cap. 3</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                    <b>"categoria3"</b>
                                </button>
                            </h5>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Cap. 1</p>
                                    <p>Cap. 2</p>
                                    <p>Cap. 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import {ref, onMounted} from 'vue'

const posts = ref();

onMounted(() => {
    axios.get('/api/get-posts').then(({data}) => {
        posts.value = data;
    })
})
</script>

<style scoped>
.grid-center {
    display: flex;
    flex-wrap: wrap;
}
.carrousel-size{
    display: flex;
}
h3{
    color:#FAFAFA;
}
h4{
    color:#FAFAFA;
}
</style>
