<template>
    <div class="grid m-5">
        <div class="col-12 xl:col-12">
            <div class="col-12 xl:col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Banner Principal *Aqui cotenido tienda*</h3>
                    </div>

                    <div id="carouselExample" class="carousel slide">
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
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 xl:col-12">
            <div class="card mt-5 text-center">
                <h3>Ultimas Noticias</h3>
            </div>
        </div>
        <!-- Inicio modulo noticia -->
        <div class="col-12 xl:col-6">
            <div class="card text-center">
                <div class="card-header color-fondo-blanco">
                    <h4>Titulo Noticia</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Publicante (nombre)</h5>
                    <p class="card-text">Contenido de la noticia, un resumen de las 5 o 6 primeras lineas</p>
                    <a href="#" class="btn btn-primary">Noticia Completa</a>
                </div>
                <div class="card-footer color-fondo-blanco text-body-secondary">
                    Fecha publicacion
                </div>
            </div>
        </div>
        <!-- Fin modulo noticia -->
        <!-- Inicio modulo noticia -->
        <div class="col-12 xl:col-6">
            <div class="card text-center">
                <div class="card-header color-fondo-blanco">
                    <h4>Titulo Noticia</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Publicante (nombre)</h5>
                    <p class="card-text">Contenido de la noticia, un resumen de las 5 o 6 primeras lineas</p>
                    <a href="#" class="btn btn-primary">Noticia Completa</a>
                </div>
                <div class="card-footer color-fondo-blanco text-body-secondary">
                    Fecha publicacion
                </div>
            </div>
        </div>
        <!-- Fin modulo noticia -->
        <div class="col-12 xl:col-12">
            <div class="mt-5 card text-center">
                <i></i>
                <h3>Multimedia</h3>
            </div>
        </div>
        <div class="col-6 xl:col-6">
            <div class="card">
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
            <div class="card">
                <h5 class="text-center">Videos</h5>
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

        <div class="col-12 xl:col-12">
            <div class="card text-center mt-5">
                <h4>Wikipedia</h4>
            </div>
        </div>
    </div>
</template>

<script setup>
</script>

<style scoped>
.color-fondo-blanco{
    background-color:#ffffff;
}

</style>
