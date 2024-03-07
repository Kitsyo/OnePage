<template>
    <div class="grid">
        <div class="col-12 xl:col-12">
            <div class="col-12 xl:col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Banner Principal *Aqui cotenido tienda*</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="/images/placeholder.jpg" alt="Imagen de prueba para el banner" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 xl:col-12">
            <div class="card mt-5 text-center">
                <h4>Ultimas Noticias</h4>
            </div>
        </div>
        <!-- Inicio modulo noticia -->
        <div class="col-12 xl:col-6">
            <div class="card text-center">
                <div class="card-header color-fondo-blanco">
                    <h5>Titulo Noticia</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Publicante (nombre)</h6>
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
                    <h5>Titulo Noticia</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Publicante (nombre)</h6>
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
                <h4>Multimedia</h4>
            </div>
        </div>
        <div class="col-6 xl:col-6">
            <div class="card">
                <h5 class="text-center">Manga</h5>
                <div class="accordion" id="accordionOne">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <b>"categoria1"</b>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
                            <div class="accordion-body">
                                <p>Tomo 1</p>
                                <p>Tomo 2</p>
                                <p>Tomo 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <b>"categoria2"</b>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                            <div class="accordion-body">
                                <p>Tomo 1</p>
                                <p>Tomo 2</p>
                                <p>Tomo 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <b>"categoria3"</b>
                            </button>
                        </h2>
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
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                <b>"categoria1"</b>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionTwo">
                            <div class="accordion-body">
                                <p>Cap. 1</p>
                                <p>Cap. 2</p>
                                <p>Cap. 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                                <b>"categoria2"</b>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                            <div class="accordion-body">
                                <p>Cap. 1</p>
                                <p>Cap. 2</p>
                                <p>Cap. 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                <b>"categoria3"</b>
                            </button>
                        </h2>
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
            <div class="card mt-5">

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
