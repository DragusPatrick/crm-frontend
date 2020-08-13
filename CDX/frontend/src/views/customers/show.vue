<template>
    <div class="content-inner">
        <div class="panel panel-margin" style="margin-bottom: 15px;">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <router-link to="/customers" class="router-link-active">Customer</router-link> / {{ customer.name }}
                        <small>(CT-101611)</small>
                    </div>
                </div>
                <div class="panel-extra">
                    <div>
                        <router-link to="/customers" class="btn btn-default btn-sm router-link-active">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </router-link>
                        <a href="/vendors/1/edit" class="btn btn-default btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button @click="deleteItem(customer.id)" type="button" class="btn btn-error btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-form">
                <div class="row row-line">
                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>CIF/CUI</span>
                            </label>
                            <p>{{ customer.cif }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Name</span>
                            </label>
                            <p>
                                {{ customer.name }}
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Reg. Com.</span>
                            </label>
                            <p>
                                {{ customer.reg_com }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Client Code</span>
                            </label>
                            <p>{{ customer.client_code }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Address</span>
                            </label>
                            <p>
                                {{ customer.address }}
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Country</span>
                            </label>
                            <p>
                                {{ customer.country }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>City</span>
                            </label>
                            <p>{{ customer.city }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>BANK</span>
                            </label>
                            <p>
                                {{ customer.bank }}
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>IBAN</span>
                            </label>
                            <p>
                                {{ customer.iban }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Email</span>
                            </label>
                            <p>{{ customer.email }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Assigned Contact</span>
                            </label>
                            <p>
															<strong>
                            		{{ customer.contact.name }}
															</strong>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Phone</span>
                            </label>
                            <p>
                                {{ customer.phone }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-12 col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Website</span>
                            </label>
                            <p>{{ customer.website }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="filterable">
            <div class="panel panel-margin" style="margin-bottom: 15px;">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div>
                            <div class="filters-title">
                                <span>Payment Made</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-extra">
                        <div>

                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-link">
                        <thead>
                            <tr>
                                <th class="w-3" style="text-align: left;">Number</th>
                                <th class="w-3" style="text-align: left;">Payment Date</th>
                                <th class="w-9" style="text-align: left;">Purchase Order</th>
                                <th class="w-3" style="text-align: left;">Vendor</th>
                                <th class="w-3" style="text-align: left;">Amount Received</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="payment in customerPayments">
                                <th class="" style="text-align: left;">{{ payment.number }}</th>
                                <td class="" style="text-align: left;">07-07-2019</td>
                                <td class="" style="text-align: left;">PO-42354</td>
                                <td class="" style="text-align: left;">	Domenica Boyer - Raynor Ltd</td>
                                <td class="" style="text-align: left;">	USD 42,731.70</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="filterable">
            <div class="panel panel-margin" style="margin-bottom: 15px;">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div>
                            <div class="filters-title">
                                <span>Projects</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-extra">
                        <div>

                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-link">
                        <thead>
	                        <tr>
	                            <th class="w-3" style="text-align: left;">Number</th>
	                            <th class="w-6" style="text-align: left;">Start Date</th>
	                            <th class="w-6" style="text-align: left;">Deadline</th>
	                            <th class="w-6" style="text-align: left;">Progress</th>
	                            <th class="w-3" style="text-align: left;">Stage</th>
	                        </tr>
                        </thead>
												<tbody>
														<tr v-for="project in customerProjects">
																<th class="" style="text-align: left;">PM-{{ project.id }}</th>
																<td class="" style="text-align: left;">{{ project.start_date | formatDate }}</td>
																<td class="" style="text-align: left;">{{ project.due_date | formatDate }}</td>
																<td class="" style="text-align: left;">{{ project.status }}</td>
																<td class="" style="text-align: left;">EUR {{ project.budget | formatMoney }}</td>
														</tr>
												</tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="filterable">
            <div class="panel panel-margin" style="margin-bottom: 15px;">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div>
                            <div class="filters-title">
                                <span>Purchase Orders</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-extra">
                        <div>

                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-link">
                        <thead>
	                        <tr>
	                            <th class="w-3" style="text-align: left;">Number</th>
	                            <th class="w-3" style="text-align: left;">Issue Date</th>
	                            <th class="w-9" style="text-align: left;">Vendor</th>
	                            <th class="w-3" style="text-align: left;">Grand Total</th>
	                            <th class="w-3" style="text-align: left;">Status</th>
	                        </tr>
                        </thead>
												<tbody>
	                        <td class="" colspan="10" style="text-align: left;">
	                            <div class="table-no_results">No results found!</div>
	                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script type="text/javascript">
    import Vue from 'vue'
    import {get, byMethod} from '../../lib/api'
    import axios from 'axios';

    export default {
        data () {
            return {
                customer: {},
								customerProjects: {},
								customerPayments: {}
            }
        },
        methods: {
					  loadCustomerProjects() {
                axios.get('http://127.0.0.1:8000/api/customer/1/projects').then(({ data }) => (this.customerProjects = data.collection));
            },
						loadCustomerPayments() {
                axios.get('http://127.0.0.1:8000/api/customer/1/payments').then(({ data }) => (this.customerPayments = data.collection));
            },
						loadCustomer(id) {
                axios.get('http://127.0.0.1:8000/api/customers/'+this.$route.params.id)
								.then(res => {
	                  this.customer = res.data.customer
	              })
	              .catch(e => {
	                  this.errors.push(e)
	              });
            },
            deleteItem(id) {
                // Send request to the server
                this.form.delete('http://127.0.0.1:8000/api/customers/'+id).then(() => {
                }).catch(() => {

                });
            },
        },
        created() {
          	this.loadCustomer();
						this.loadCustomerProjects();
						this.loadCustomerPayments();
        }
    }
</script>
