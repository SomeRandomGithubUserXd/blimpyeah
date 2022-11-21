<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import imageUrl from '@/images/blimpman.png'
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    blimpIsRunning: Boolean
})

const handleButtonClick = () => {
    if (props.blimpIsRunning) {
        stopBlimp()
    } else {
        startBlimp()
    }
}

const startBlimp = () => {
    Inertia.post(route("blimp.start"))
}

const stopBlimp = () => {
    Inertia.post(route("blimp.stop"))
}
</script>

<template>
    <Head title="Welcome"/>

    <div
        class="relative flex flex-col items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 text-center px-5">
        <img :class="blimpIsRunning ? 'running' : ''" class="blimpman-img mx-auto" :src="imageUrl"/>
        <p class="dark:text-white text-gray-900 mt-5 text-2xl">{{ blimpIsRunning ? "Дирижопль начнется в течение минуты " : "Дирижабль неактивен(хуярь)" }}</p>
        <button
            @click="handleButtonClick"
            type="button"
            class="mt-5 inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ blimpIsRunning ? "Остановить дирижаблирование" : "Начать дирижаблирование" }}
        </button>
    </div>
</template>

<style scoped>
@media screen and (max-width: 768px) {
    .blimpman-img {
        width: 75vw !important;
    }
}

.blimpman-img {
    width: 25vw;
}

@-webkit-keyframes buzz-out-on-hover {
    10% {
        -webkit-transform: translateX(3px) rotate(2deg);
        transform: translateX(3px) rotate(2deg);
    }
    20% {
        -webkit-transform: translateX(-3px) rotate(-2deg);
        transform: translateX(-3px) rotate(-2deg);
    }
    30% {
        -webkit-transform: translateX(3px) rotate(2deg);
        transform: translateX(3px) rotate(2deg);
    }
    40% {
        -webkit-transform: translateX(-3px) rotate(-2deg);
        transform: translateX(-3px) rotate(-2deg);
    }
    50% {
        -webkit-transform: translateX(2px) rotate(1deg);
        transform: translateX(2px) rotate(1deg);
    }
    60% {
        -webkit-transform: translateX(-4px) rotate(-1deg);
        transform: translateX(-4px) rotate(-1deg);
    }
    70% {
        -webkit-transform: translateX(2px) rotate(1deg);
        transform: translateX(2px) rotate(1deg);
    }
    80% {
        -webkit-transform: translateX(-4px) rotate(-1deg);
        transform: translateX(-4px) rotate(-1deg);
    }
    90% {
        -webkit-transform: translateX(1px) rotate(0);
        transform: translateX(1px) rotate(0);
    }
    100% {
        -webkit-transform: translateX(-1px) rotate(0);
        transform: translateX(-1px) rotate(0);
    }
}
@keyframes buzz-out-on-hover {
    10% {
        -webkit-transform: translateX(3px) rotate(2deg);
        transform: translateX(3px) rotate(2deg);
    }
    20% {
        -webkit-transform: translateX(-3px) rotate(-2deg);
        transform: translateX(-3px) rotate(-2deg);
    }
    30% {
        -webkit-transform: translateX(3px) rotate(2deg);
        transform: translateX(3px) rotate(2deg);
    }
    40% {
        -webkit-transform: translateX(-3px) rotate(-2deg);
        transform: translateX(-3px) rotate(-2deg);
    }
    50% {
        -webkit-transform: translateX(2px) rotate(1deg);
        transform: translateX(2px) rotate(1deg);
    }
    60% {
        -webkit-transform: translateX(-4px) rotate(-1deg);
        transform: translateX(-4px) rotate(-1deg);
    }
    70% {
        -webkit-transform: translateX(2px) rotate(1deg);
        transform: translateX(2px) rotate(1deg);
    }
    80% {
        -webkit-transform: translateX(-4px) rotate(-1deg);
        transform: translateX(-4px) rotate(-1deg);
    }
    90% {
        -webkit-transform: translateX(1px) rotate(0);
        transform: translateX(1px) rotate(0);
    }
    100% {
        -webkit-transform: translateX(-1px) rotate(0);
        transform: translateX(-1px) rotate(0);
    }
}

.blimpman-img.running {
    -webkit-animation-name: buzz-out-on-hover;
    animation-name: buzz-out-on-hover;
    -webkit-animation-duration: 0.75s;
    animation-duration: 0.75s;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
}
</style>
