<template>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class="px-3 py-3 d-flex justify-content-between">
                            <h3 class="card-title"> <i data-feather="users" style="width: 30px; height: 30px"></i> Users
                            </h3>
                        </div>
                        <div class="card-right ml-3 mb-4">
                            <p>{{ data.users }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {
                    siswa: '0',
                    kelas: '0',
                    users: '0',
                }
            }
        },
        methods: {
            getAllData() {
                axios.get('/api/dashboard').then((response) => {
                    this.data = {
                        siswa: response.data.siswa,
                        kelas: response.data.kelas,
                        users: response.data.users,
                    }
                })
            }
        },
        mounted() {
            this.getAllData();
        },
    }

</script>
