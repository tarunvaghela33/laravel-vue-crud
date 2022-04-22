<template>
    <div class="card"> <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form @submit.prevent="storeForm()" action="/users" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="basicInput">First Name</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter first name"
                                v-model="form.first_name" v-bind:class="{ 'is-invalid': erorr.first_name }">
                            <div v-if="erorr.first_name" class="invalid-feedback">
                                {{ erorr.first_name[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Last Name</label>
                            <input type="text" class="form-control " id="basicInput" placeholder="Enter last name"
                                v-model="form.last_name" v-bind:class="{ 'is-invalid': erorr.last_name }">
                            <div v-if="erorr.last_name" class="invalid-feedback">
                                {{ erorr.last_name[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">DOB</label>
                            <input type="date" class="form-control " id="basicInput" v-model="form.dob" v-bind:class="{ 'is-invalid': erorr.dob }">
                            <div v-if="erorr.dob" class="invalid-feedback">
                                {{ erorr.dob[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Age</label>
                            <input type="number" class="form-control " id="basicInput" placeholder="Enter age"
                                v-model="form.age" v-bind:class="{ 'is-invalid': erorr.age }">
                            <div v-if="erorr.age" class="invalid-feedback">
                                {{ erorr.age[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">Email</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Enter email"
                                v-model="form.email" v-bind:class="{ 'is-invalid': erorr.email }">
                            <div v-if="erorr.email" class="invalid-feedback">
                                {{ erorr.email[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Password</label>
                            <input type="password" id="helperText" class="form-control" placeholder="*********"
                                v-model="form.password" v-bind:class="{ 'is-invalid': erorr.password }">
                            <div v-if="erorr.password" class="invalid-feedback">
                                {{ erorr.password[0] }}
                            </div>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Profile</label>
                            <input type="file" id="helperText" class="form-control" v-on:change="upload_avatar" v-bind:class="{ 'is-invalid': erorr.profile_photo_path }">
                            <div v-if="img_src" class="avatar img-fluid img-circle" style="margin-top:10px">
                                <img v-bind:src="img_src" />
                            </div>
                            <div v-if="erorr.profile_photo_path" class="invalid-feedback">
                                {{ erorr.profile_photo_path[0] }}
                            </div>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Home Phone</label>
                            <input type="number" class="form-control " id="basicInput" placeholder="Enter home phone"
                                v-model="form.home_phone" v-bind:class="{ 'is-invalid': erorr.home_phone }">
                            <div v-if="erorr.home_phone" class="invalid-feedback">
                                {{ erorr.home_phone[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Mobile Phone</label>
                            <input type="text" class="form-control " id="basicInput" placeholder="Enter mobile phone"
                                v-model="form.mobile_phone" v-bind:class="{ 'is-invalid': erorr.mobile_phone }" @input="acceptUSNumber">
                            <div v-if="erorr.mobile_phone" class="invalid-feedback">
                                {{ erorr.mobile_phone[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Street Address</label>
                            <textarea class="form-control " id="basicInput" placeholder="Enter street address"
                                v-model="form.street_address" v-bind:class="{ 'is-invalid': erorr.street_address }"></textarea>
                            <div v-if="erorr.street_address" class="invalid-feedback">
                                {{ erorr.street_address[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">City</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Enter city"
                                v-model="form.city" v-bind:class="{ 'is-invalid': erorr.city }">
                            <div v-if="erorr.city" class="invalid-feedback">
                                {{ erorr.city[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">State</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Enter state"
                                v-model="form.state" v-bind:class="{ 'is-invalid': erorr.state }">
                            <div v-if="erorr.state" class="invalid-feedback">
                                {{ erorr.state[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">Zip Code</label>
                            <input type="text" class="form-control" id="helpInputTop" placeholder="Enter zip_code"
                                v-model="form.zip_code" v-bind:class="{ 'is-invalid': erorr.zip_code }">
                            <div v-if="erorr.zip_code" class="invalid-feedback">
                                {{ erorr.zip_code[0] }}
                            </div>
                        </div>

                        <router-link to="/users" class="btn btn-danger">Cancel</router-link>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    first_name: ' ',
                    last_name: ' ',
                    dob: ' ',
                    age: ' ',
                    email: ' ',
                    password: ' ',
                    profile_photo_path: ' ',
                    home_phone: ' ',
                    mobile_phone: ' ',
                    street_address: ' ',
                    city: ' ',
                    state: ' ',
                    zip_code: ' ',
                },
                img_src: null,
                erorr: [],
                data: {}
            }
        },
        methods: {
             upload_avatar(e) {
                let file        = e.target.files[0];
                this.img_src    =  URL.createObjectURL(file);
                let reader      = new FileReader();  

                reader.onloadend = (file) => {
                    this.form.profile_photo_path = reader.result;
                }              
                reader.readAsDataURL(file);
            },
            storeForm() {
                axios.post('/api/users', this.form).then((response) => {
                    if (response.data.status) {
                        this.$noty.success(response.data.messege);
                        this.$router.push({
                            name: 'users',
                        });
                    }
                }).catch((erorr) => {
                    this.erorr = erorr.response.data.errors
                })
            },
            acceptUSNumber() {
                var x = this.form.mobile_phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                this.form.mobile_phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
            }
        },
        mounted() {
        },
    }
</script>
