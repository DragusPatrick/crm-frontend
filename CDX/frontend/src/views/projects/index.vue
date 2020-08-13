<template>
    <div>
        <div class="filterable-mid">
            <div>
                <router-link to="/projects/create" type="button" class="btn btn-pink">
                    <i class="fas fa-plus" style="color: #fff !important;margin-right:5px;"></i>
                    <span class="btn-text">
                        Add Project
                    </span>
                </router-link>
            </div>
        </div>

        <div class="row">

            <div v-for="project in projects.data" class="col-md-6 col-xl-4">
                <div id="project-card" class="card d-block">
                    <img class="card-img-top" src="https://coderthemes.com/hyper/saas/assets/images/projects/project-1.jpg" alt="project image cap">
                    <div class="card-body">
                        <div class="dropdown card-widgets">
                            <a class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>Edit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete mr-1"></i>Delete</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline mr-1"></i>Invite</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app mr-1"></i>Leave</a>
                            </div>
                        </div>

                        <h4 class="mt-0">
                            <router-link :to="{ path: '/project/'+project.id}" href="project/1" class="text-title">{{ project.name }}</router-link>
                        </h4>

                        <div class="badge badge-secondary mb-3">Ongoing</div>

                        <p class="text-muted font-13 mb-3">With supporting text below as a natural lead-in to additional contenposuere erat a ante... <a href="javascript:void(0);" class="font-weight-bold text-muted">view more</a></p>

                        <p class="mb-1">
                        <span class="pr-5 text-nowrap mb-2 d-inline-block">
                            <i class="fas fa-list-ol text-muted"></i>
                            <b>2</b> Tasks
                        </span>

                            <span class="text-nowrap mb-2 d-inline-block ">
                            <i class="far fa-comment-alt text-muted"></i>
                            <b>741</b> Comments
                        </span>
                        </p>

                        <div>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme" class="d-inline-block">
                                <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="friend">
                            </a>

                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty" class="d-inline-block">
                                <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="friend">
                            </a>

                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson" class="d-inline-block">
                                <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="friend">
                            </a>
                            <a href="javascript:void(0);" class="d-inline-block text-muted font-weight-bold ml-2">
                                +7 more
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script>

    import axios from 'axios'

    export default {
        data() {
            return {
                projects: {},
            }
        },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/api/projects?page=' + page)
                    .then(response => {
                        this.projects = response.data;
                    });
            },
            loadProjects() {
                axios.get('http://127.0.0.1:8000/api/projects').then(({ data }) => (this.projects = data.collection));
            },
        },
        created() {
            this.loadProjects();
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
