<script setup>
import { useLayout } from '../composables/layout';
import { computed } from 'vue';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>

    <div class="">
        <div class="surface-section px-4 md:px-6 lg:px-8">
            <div class="py-6 flex flex-column sm:flex-row sm:align-items-center justify-content-between">
                <div>
                    <img src="/images/blocks/logos/bastion-700.svg" alt="Image" height="40">
                    <div class="mt-2 line-height-3">
                        © 2024 OnePage, All rights reserved
                    </div>
                </div>
                <div class="mt-3 sm:mt-0">
                    <a class="cursor-pointer text-500 transition-colors transition-duration-150 hover:text-700" href="https://twitter.com/?lang=es"><i class="pi pi-twitter text-xl"></i></a>
                    <a class="cursor-pointer text-500 ml-3 transition-colors transition-duration-150 hover:text-700" href="https://www.facebook.com/?locale=es_ES"><i class="pi pi-facebook text-xl"></i></a>
                    <a class="cursor-pointer text-500 ml-3 transition-colors transition-duration-150 hover:text-700" href="https://github.com/Kitsyo/OnePage"><i class="pi pi-github text-xl"></i></a>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped></style>
