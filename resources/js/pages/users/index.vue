<template>
    <div class="card">
        <div class="card-body">
            <template>
                <v-toolbar flat>
                    <v-toolbar-title>Data Users</v-toolbar-title>
                    <v-divider class="mx-4" inset vertical></v-divider>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click.prevent="createRoute()" dark class="mb-2">
                        Create User
                    </v-btn>
                </v-toolbar>
            </template>
            <!-- header -->
            <v-card-title>
                <v-spacer></v-spacer>
                <!-- search engine -->
                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details>
                </v-text-field>
            </v-card-title>
            <!-- end header -->
            <v-data-table :headers="headers" :items="data" :search="search" :items-per-page="10" class="elevation-2">
                <template v-slot:item.profile_photo_path="{ item }">
                    <img :src="img_base_url+item.profile_photo_path" width="50" height="50">
                </template>
                <template v-slot:item.action="{ item }">
                    <v-icon @click="editItem(item)">mdi-pencil</v-icon>
                    <v-icon color="error" @click="deleteItem(item)"> mdi-delete</v-icon>
                </template>
            </v-data-table>
            </v-data-table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                headers: [
                    { text: 'First Name', value: 'first_name' },
                    { text: 'Last Name', value: 'last_name' },
                    { text: 'Email', value: 'email' },
                    { text: 'DOB', value: 'dob' },
                    { text: 'Image', value: 'profile_photo_path' },
                    { text: 'Phone', value: 'mobile_phone' },
                    { text: 'Address', value: 'street_address' },
                    { text: 'City', value: 'city' },
                    { text: 'State', value: 'state' },
                    { text: 'Zip Code', value: 'zip_code' },
                    { text: 'Actions', value: 'action', sortable: false, align: 'center' },
                ],
                data: [],
                search: '',
                modelDelete: false,
                img_base_url: this.$base_url+'/uploads/'
            }
        },
        methods: {
            getData() {
                axios.get('/api/users').then((response) => {
                    this.data = response.data
                }).catch((eror) => {
                    console.log(eror);
                })
            },
            createRoute() {
                this.$router.push('/users/create')
            },
            deleteItem(item) {
                Swal.fire({
                    title: 'Are you sure ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/api/users/' + item.id).then((response) => {
                            const idx = this.data.indexOf(item)
                            this.data.splice(idx, 1)
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
                                'success'
                            )
                        })
                    }
                })
            },
            editItem(item) {
                this.$router.push('/users/' + item.id);
            }
        },
        mounted() {
            this.getData()
        },
    }

</script>