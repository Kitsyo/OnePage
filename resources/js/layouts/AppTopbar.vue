<template>
    <div class="layout-topbar">

        <button class="p-link layout-menu-button layout-topbar-button" @click="onMenuToggle()">
            <i class="pi pi-list"></i>
        </button>
        <router-link to="/" class="layout-topbar-logo d-flex justify-content-center ajustar">
            <!--<img src="/images/logo.svg" alt="logo" /> -->
            <span>Logo</span>
        </router-link>
        <nav class="layout-topbar-menu">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control s-bar me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit"><i class="pi pi-search"></i></button>
                </form>
            </div>
        </nav>
        <button class="p-link layout-topbar-menu-button layout-topbar-button" @click="onTopBarMenuButton()">
            <i class="pi pi-ellipsis-v"></i>
        </button>

        <div class="layout-topbar-menu" :class="topbarMenuClasses">

            <button class="p-link layout-topbar-button layout-topbar-button-c nav-item dropdown " role="button"
                data-bs-toggle="dropdown">

                <i class="pi pi-user"></i>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                    <li>
                        <router-link :to="{ name: 'profile.index' }" class="dropdown-item">Perfil</router-link>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Preferencias</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" :class="{ 'opacity-25': processing }" :disabled="processing"
                            href="javascript:void(0)" @click="logout">Cerrar sessión</a>
                    </li>
                </ul>

                <span class="nav-link dropdown-toggle ms-3 me-2" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hola, {{ user.name }}
                </span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import { useLayout } from '../composables/layout';
import { useStore } from 'vuex';
import useAuth from "@/composables/auth";

const { onMenuToggle } = useLayout();
const store = useStore();
const user = computed(() => store.state.auth.user)
const { processing, logout } = useAuth();

const topbarMenuActive = ref(false);

const onTopBarMenuButton = () => {
    topbarMenuActive.value = !topbarMenuActive.value;
};

const topbarMenuClasses = computed(() => {
    return {
        'layout-topbar-menu-mobile-active': topbarMenuActive.value
    };
});


</script>

<style lang="scss" scoped>
.layout-topbar-button-c,
.layout-topbar-button-c:hover {
    width: auto;
    background-color: rgb(255, 255, 255, 0);
    border: 0;
    border-radius: 0%;
    padding: 1em;
}
.s-bar{
    width:600px;
}
.ajustar{
    width:100px;
    margin-left:100px
}
</style>
