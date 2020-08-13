
<template>
    <div>
        <!-- Start header -->
        <header id="topnav">
            <app-header></app-header>
        </header>
        <!-- End header -->
        <div class="wrapper">
            <div class="container-fluid">
                <!-- Start page header -->
                <app-page-header></app-page-header>
                <!-- End page header -->
                <router-view></router-view>
								<!-- set progressbar -->
        				<vue-progress-bar></vue-progress-bar>
            </div>
        </div>
        <!-- Start footer -->
        <!-- End footer -->
    </div>
</template>


<script>
		import { mapGetters } from 'vuex'

    import Header from './components/partials/header'
    import Footer from './components/partials/footer'
    import PageHeader from './components/partials/pageHeader'

    export default {
        mounted () {
            //  [App.vue specific] When App.vue is finish loading finish the progress bar
            this.$Progress.finish()
        },
        created () {
            //  [App.vue specific] When App.vue is first loaded start the progress bar
            this.$Progress.start()
            //  hook the progress bar to start before we move router-view
            this.$router.beforeEach((to, from, next) => {
                //  does the page we want to go to have a meta.progress object
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress
                    // parse meta tags
                    this.$Progress.parseMeta(meta)
                }
                //  start the progress bar
                this.$Progress.start()
                //  continue to next page
                next()
            })
            //  hook the progress bar to finish after we've finished moving router-view
            this.$router.afterEach((to, from) => {
                //  finish the progress bar
                this.$Progress.finish()
            })
        },
        components: {
            'app-header'      : Header,
            'app-footer'      : Footer,
            'app-page-header' : PageHeader,
        },
				computed: {
					...mapGetters([
						'isLogged'
					])
				},
				methods: {
					logout () {
						this.$store.dispatch('logout')
					}
				}
    }
</script>

<style>
	@import "./../public/app.css";
	@import "./../public/style.css";
</style>
