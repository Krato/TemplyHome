<template>
    <div class="flex justify-center items-centers">

        <div class="flex justify-center flex-wrap w-full max-w-xl" v-if="completed">
            <h3 class="w-full text-center">{{ __('Activating website') }}</h3>
            <img src="/assets/temply/svgs/loader.svg">
        </div>

        <div class="w-full max-w-xl" v-if="!completed">
            <heading class="flex justify-center mb-3 text-center">{{ __('Welcome to your dashboard') }}</heading>
            <p class="text-90 leading-tight mb-8 text-center">
                {{ __('Before you start you need to activate some things in your control panel. Follow the steps') }}.
            </p>
            <div v-if="step == 1" class="flex justify-center">
                <step>
                    <template slot="title">
                        {{ __('Set your theme') }}
                    </template>
                
                    <template slot="icon">
                       <img src="/assets/temply/svgs/theme.svg">
                    </template>
                    <template slot="content">
                        <h2 class="text-2xl">{{ __('Set your theme') }}</h2>
                        <p class="text-grey-dark text-xl mt-2 mb-4">
                            {{ __('RCustomize your workspace with a theme.') }}
                        </p>

                        <router-link class="btn btn-default btn-primary"
                            :to="{ name: 'temply-theme-manager'}"
                        >
                        {{ __('Set now') }}
                        </router-link>
                        <!-- <a href="/nova/temply-theme-manager" class=""></a> -->
                    </template>
                </step>
            </div>

            <div v-if="step == 2" class="flex justify-center">
                <step>
                    <template slot="title">
                        {{ __('Three steps left') }}
                    </template>
                
                    <template slot="icon">
                       <img src="/assets/temply/svgs/settings.svg">
                    </template>
                    <template slot="content">
                        <h2 class="text-2xl">{{ __('Update settings') }}</h2>
                        <p class="text-grey-dark text-xl mt-2 mb-4">
                            {{ __('Review and update your settings.') }}
                        </p>

                        <router-link class="btn btn-default btn-primary"
                            :to="{ name: 'temply-settings'}"
                        >
                        {{ __('Change now') }}
                        </router-link>
                        <!-- <a href="/nova/temply-theme-manager" class=""></a> -->
                    </template>
                </step>
            </div>

            <div v-if="step == 3" class="flex justify-center">
                <step>
                    <template slot="title">
                        {{ __('Two more steps!') }}
                    </template>
                
                    <template slot="icon">
                       <img src="/assets/temply/svgs/pages.svg">
                    </template>
                    <template slot="content">
                        <h2 class="text-2xl">{{ __('Edit your pages') }}</h2>
                        <p class="text-grey-dark text-xl mt-2 mb-4">
                            {{ __('Nobody likes an empty website, add a new page.') }}
                        </p>

                        <router-link class="btn btn-default btn-primary"
                            :to="{ name: 'temply-pages.pages'}"
                        >
                        {{ __('Edit pages') }}
                        </router-link>
                        <!-- <a href="/nova/temply-theme-manager" class=""></a> -->
                    </template>
                </step>
            </div>

            <div v-if="step == 4" class="flex justify-center">

                <step>
                    <template slot="title">
                        {{ __('Last step') }}
                    </template>
                
                    <template slot="icon">
                       <img src="/assets/temply/svgs/activate.svg">
                    </template>
                    <template slot="content">
                        <h2 class="text-2xl">{{ __('Activate your website') }}</h2>
                        <p class="text-grey-dark text-xl mt-2 mb-4">
                            {{ __('Now your website is ready for the public, activate your website now.') }}
                        </p>

                        <button class="btn btn-default btn-primary" @click="activateWebsite">
                            {{ __('Activate') }}
                        </button>
                        <!-- <a href="/nova/temply-theme-manager" class=""></a> -->
                    </template>
                </step>
            </div>
        </div>
    </div>
</template>

<script>
function link(path) {
    return Nova.config.base + `/${path}`;
}

import Step from './Step';

export default {
    name: 'Help',

    components: {
        'step':Step
    },

    props: {
        card: Object,
    },

    data: () => ({
        step: 1,
        completed: false
    }),

    computed: {
        theme: () =>  link('temply-theme-manager'),
        settings: () =>  link('temply-settings'),
    },

    methods: {
        activateWebsite() {
            console.log('activar')

            Nova.request().post('/infinety-es/temply-home/activate').then(() => {
                this.completed = true

                setTimeout(() => {
                    location.reload()
                }, 3000);
                
            })
        }
    },

    mounted() {
        Nova.request().get('/infinety-es/temply-home/check-status').then(response => {
            this.step = 4//response.data.step;
        })
    }
}
</script>

<style lang="scss">

.step-wrap {
  width: 600px;
  svg {
    fill: #3d4852;
  }
}
.step-header {
  &::before {
    background-color: #3d4852;
    content: '';
    width: 545px;
    height: 2px;
    position: absolute;
    left: 4%;
    top: 70px;
  }
}
</style>
