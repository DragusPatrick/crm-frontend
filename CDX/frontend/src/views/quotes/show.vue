<template>
    <div class="content-inner">
        <div class="panel panel-margin" style="margin-bottom: 15px;">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <router-link to="/quotes" class="router-link-active">Quote</router-link> / #{{ quote.id }}
                        <small>(CT-101611)</small>
                    </div>
                </div>
                <div class="panel-extra">
                    <div>
                        <router-link to="/quotes" class="btn btn-default btn-sm router-link-active">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </router-link>
                        <a href="/vendors/1/edit" class="btn btn-default btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button @click="deleteItem(quote.id)" type="button" class="btn btn-error btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-form">

                <div class="row row-line">
                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Quote No.</span>
                            </label>
                            <p>QT-00{{ quote.id }}</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Contact Person</span>
                            </label>
                            <p>
                                Dragus Patrick
                            </p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Client</span>
                            </label>
                            <p>
                                Customer Name
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Issue Date</span>
                            </label>
                            <p>{{ quote.date }}</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Expiry Date</span>
                            </label>
                            <p>
                                {{ quote.date }}
                            </p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Status</span>
                            </label>
                            <span v-if="quote.status == 'NEGOTIATION'" class="status status-orange">
					                    <span class="status-text">{{ quote.status }}</span>
					                  </span>

                            <span v-if="quote.status == 'REJECTED'" class="status status-pink">
					                    <span class="status-text">{{ quote.status }}</span>
					                  </span>

                            <span v-if="quote.status == 'CLOSED'" class="status status-brown">
					                    <span class="status-text">{{ quote.status }}</span>
					                  </span>

                            <span v-if="quote.status == 'CONFIRMED'" class="status status-light_green">
					                    <span class="status-text">{{ quote.status }}</span>
					                  </span>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Created At</span>
                            </label>
                            <p>{{ quote.created_at }}</p>
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
                            <td class="" colspan="10" style="text-align: left;">
                                <div class="table-no_results">No results found!</div>
                            </td>
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
                        <tr>
                            <td class="" style="text-align: left;">PO-787741</td>
                            <td class="" style="text-align: left;">23-07-2019</td>
                            <td class="" style="text-align: left;">
                                <span>Domenica Boyer</span>
                                <span> - Raynor Ltd</span>
                            </td>
                            <td class="" style="text-align: left;">USD 52,107.00</td>
                            <td class="" style="text-align: left;">
                                    <span class="status status-pink">
                                        <span class="status-text">Received</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="" style="text-align: left;">PO-787741</td>
                            <td class="" style="text-align: left;">23-07-2019</td>
                            <td class="" style="text-align: left;">
                                <span>Domenica Boyer</span>
                                <span> - Raynor Ltd</span>
                            </td>
                            <td class="" style="text-align: left;">USD 52,107.00</td>
                            <td class="" style="text-align: left;">
                                    <span class="status status-pink">
                                        <span class="status-text">Received</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="" style="text-align: left;">PO-787741</td>
                            <td class="" style="text-align: left;">23-07-2019</td>
                            <td class="" style="text-align: left;">
                                <span>Domenica Boyer</span>
                                <span> - Raynor Ltd</span>
                            </td>
                            <td class="" style="text-align: left;">USD 52,107.00</td>
                            <td class="" style="text-align: left;">
                                <span class="status status-pink">
                                    <span class="status-text">Received</span>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
                editmode: true,
                quote: {}
            }
        },
        methods: {
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#projectModal').modal('show');
            },

            createProject() {
                this.form.post('http://127.0.0.1:8000/api/project/');
                Fire.$emit('AfterCreate');

                $('#projectModal').modal('hide')

                toast({
                    type: 'success',
                    title: 'Project created successfully'
                });
                this.$Progress.finish();
            }
        },

        created() {
            axios.get('http://127.0.0.1:8000/api/quotes/' + this.$route.params.id)
                .then(response => {
                    this.quote = response.data.quote
                })
        }
    }
</script>
