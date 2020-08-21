<template>
    <div class="card-box page-content">
        <div class="">
            <form class="form" @submit.prevent="createCustomer()" @keydown="form.onKeydown($event)">
                <div class="">

										<!-- Alert -->
							      <div v-if="form.errors.any()" class="validation-text">
							        There were some problems with your input.
							      </div>

                    <div>
                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Name</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.name" type="text" class="form-input" name="name" placeholder="Enter Customer name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" :class="{ 'is-invalid': form.errors.has('cif') }" >
                                        <span>CUI / CIF</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.cif" type="text" class="form-input" name="cif" placeholder="Enter customer CIF or CUI">

																		<div v-if="form.errors.has('cif')" class="input-error-class">
														          {{ form.errors.get('cif') }}
														        </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Reg. Com.</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.reg_com" type="text" class="form-input" name="reg_com" placeholder="Enter customer Reg. Com.">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Client Code</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.client_code" type="text" class="form-input" name="client_code" placeholder="Enter Client Code">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Website</span>
                                        <small class="form-optional">(Optional)</small>
                                        <!---->
                                    </label>
                                    <input v-model="form.website" type="text" class="form-input" name="website" placeholder="Enter customer website">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Country</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.country" type="text" class="form-input" name="country" placeholder="Enter country">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>City</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.city" type="text" class="form-input" name="city" placeholder="Enter City">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>BANK</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.bank" type="text" class="form-input" name="country" placeholder="Enter customer bank">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Bank IBAN</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.iban" type="text" class="form-input" name="iban" placeholder="Enter customer IBAN">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Email</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.email" type="text" class="form-input" name="email" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Assigned Contact</span>
                                        <small class="form-optional">(Optional)</small>
                                        <!---->
                                    </label>
                                    <select v-model="form.contact_id" class="form-control select-input">
                                        <option value="" disabled>Select ..</option>
                                        <option v-for="contact in contacts.data" v-bind:value="contact.id">{{ contact.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Phone</span>
                                        <!---->
                                    </label>
                                    <input v-model="form.phone" type="text" class="form-input" name="phone" placeholder="Enter customer phone">
                                </div>
                            </div>
                        </div>

                        <div class="row row-link">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Notes</span>
                                    </label>
                                    <textarea v-model="form.address" class="form-input" type="text" optional="true" source="textarea" label="Note" col="24" style="height: 60px;"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <router-link to="/customers" class="btn btn-default">
                                <span class="btn-text">Cancel</span>
                            </router-link>
                            <button type="submit" class="btn btn-primary">
                                <span class="btn-text">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)

    import axios from 'axios'

    export default {
        data() {
            return {
                contacts: {},
                form: new Form({
                    cif:            '',
                    name:           '',
                    reg_com:        '',
                    client_code:    '',
                    address:        '',
                    country:        '',
                    city:           '',
                    bank:           '',
                    iban:           '',
                    email:          '',
                    contact_id:     '',
                    phone:          '',
                    website:        '',
                }),
								allerros: [],
           			success : false,
            }
        },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/api/customers?page=' + page)
                    .then(response => {
                        this.contacts = response.data;
                    });
            },
            createCustomer() {
                this.form.post('http://127.0.0.1:8000/api/customers/')
                    .then(function (response) {
												this.$router.push('/');
                    }).catch((error) => {
                        this.allerros = error.response.data.errors;
                        this.success = false;
                   });
            },
            loadContacts() {
                axios.get('http://127.0.0.1:8000/api/contacts/').then(({ data }) => (this.contacts = data.collection));
            },
        },
        created() {
            this.loadContacts();
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
