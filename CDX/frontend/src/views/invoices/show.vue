<template>
	<div class="invoice-wrapper">

		<div class="panel panel-margin">
				<div class="panel-heading">
						<div class="panel-title">
								<div>
										<a href="/invoices" class="router-link-active">Invoices</a> / {{ model.number }}
								</div>
						</div>
						<div class="panel-extra">
								<div>
										<router-link to="/invoices" class="btn btn-default btn-sm">
												<i class="fas fa-arrow-left"></i>
										</router-link>

										<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#emailModal">
												<i class="fas fa-envelope"></i>
										</button>

										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#receivePayment">
												<span class="btn-text">Receive Payment</span>
										</button>

										<div class="dropdown">
												<button type="button" class="btn btn-default btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-h"></i>
												</button>

												<div class="dropdown-inner dropdown-right" style="width: 200px;">
														<div class="dropdown-menu">
																<a target="_blank" href="/api/downloads/invoices/10?mode=preview" class="dropdown-link">
																		<div class="dropdown-team-item">
																				<span class="dropdown-team-name">View PDF</span>
																		</div>
																</a>

																<a @click="onClick(model.id)" class="dropdown-link">
																		<div class="dropdown-team-item">
																				<span class="dropdown-team-name">Download PDF</span>
																		</div>
																</a>

																<a target="_blank" href="/api/downloads/delivery-notes/10?mode=preview" class="dropdown-link">
																		<div class="dropdown-team-item">
																				<span class="dropdown-team-name">View Delivery Note</span>
																		</div>
																</a>

																<div>
																		<div class="dropdown-divide"></div>
																		<a href="/invoices/10/edit" class="dropdown-link">
																				Edit
																		</a>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>

				<div class="panel-form">
						<div class="row row-line">
								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Number</span>
												</label>
												<p>{{ model.number }}</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Customer</span>
												</label>
												<p>
														<strong>{{ model.customer.name }}</strong>
												</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Reference</span>
												</label>
												<p>
														{{ model.reference }}
												</p>
										</div>
								</div>
						</div>

						<div class="row row-line">
								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Issued Date</span>
												</label>
												<p>{{ model.date | formatMiniDate }}</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Due Date</span>
												</label>
												<p>{{ model.due_date | formatMiniDate }}</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Status</span>
												</label>
												<p>
														<span v-if="model.status == 'Paid'" class="status status-blue">
																<span class="status-text">{{ model.status }}</span>
														</span>

														<span v-else="model.status == 'Sent'" class="status status-light_green">
																<span class="status-text">{{ model.status }}</span>
														</span>
												</p>
										</div>
								</div>
						</div>

						<div class="row row-line">
								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Sub Total</span>
												</label>
												<p>
													<strong v-if="model.currency == 'RON'">
														{{ model.sub_total | formatMoney }} RON
													</strong>
													<strong v-else>
														{{ model.sub_total | formatMoney }} €
													</strong>
												</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Discount</span>
												</label>
												<p>{{ model.discount }}</p>
										</div>
								</div>

								<div class="col-12 col-md-4">
										<div class="info-group">
												<label class="info-label">
														<span>Total</span>
												</label>
												<p>
													<strong v-if="model.currency == 'RON'">
														{{ model.total | formatMoney }} RON
													</strong>
													<strong v-else>
														{{ model.total | formatMoney }} €
													</strong>
												</p>
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

		<!-- Receive payment modal -->
		<div class="modal fade" id="receivePayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
								<div class="modal-heading">
										<div class="modal-title">
												<div>
														<div>
																<span class="f-z-16">Receive Payment</span>
														</div>
												</div>
										</div>
										<!---->
										<div class="modal-close">
												<span class="icon icon-close"></span>
										</div>
								</div>
								<div class="modal-body">
										<div>
												<div class="row">
														<div class="col-12 col-md-6">
																<div class="form-group">
																		<label class="form-label">
																				<span>Payment Date</span>
																		</label>

																		<input type="date" class="form-input" source="input" label="Payment Date" col="12">
																</div>
														</div>

														<div class="col-12 col-md-6">
																<div class="form-group">
																		<label class="form-label">
																				<span>Payment Method</span>
																				<!---->
																		</label>

																		<select class="form-input">
																				<option value="cheque">
																						Cheque
																				</option>

																				<option value="cash">
																						Cash
																				</option>

																				<option value="bank_transfer">
																						Bank Transfer
																				</option>
																		</select>
																</div>
														</div>
												</div>

												<div class="row">
														<div class="col-12 col-md-6">
																<div class="form-group">
																		<label class="form-label">
																				<span>Amount Received</span>
																		</label>

																		<input type="text" class="form-input" source="input" label="Amount Received" col="12">
																</div>
														</div>

														<div class="col-12 col-md-6">
																<div class="form-group">
																		<label class="form-label">
																				<span>Transaction Fees</span>
																		</label>
																		<input type="text" class="form-input" source="input" label="Transaction Fees" col="12">
																</div>
														</div>
												</div>

												<div class="row">
														<div class="col-12">
																<div class="form-group">
																		<label class="form-label">
																				<span>Note</span>
																				<small class="form-optional">(Optional)</small>
																		</label>
																		<textarea class="form-input" type="text" optional="true" source="textarea" label="Note" col="24" style="height: 99px;"></textarea>
																</div>
														</div>
												</div>
										</div>
								</div>
								<div class="modal-footer">
										<div>

										</div>
										<div>
												<button type="button" class="btn btn-default" data-dismiss="modal">
														<span class="btn-text">Cancel</span>
												</button>

												<router-link type="button" class="btn btn-primary" to="/invoices">
														<span class="btn-text">
																Sent
														</span>
												</router-link>
										</div>
								</div>
						</div>
				</div>
		</div>

		<!-- Email modal -->
		<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
								<form @submit.prevent="sendEmail(mode.id)">
										<div class="modal-heading">
												<div class="modal-title">
														<div>
																<div>
																		<span class="f-z-16">Sent Email</span>
																</div>
														</div>
												</div>
												<!---->
												<div class="modal-close">
														<span class="icon icon-close"></span>
												</div>
										</div>
										<div class="modal-body">
												<div>
														<div class="row">
																<div class="col-12 col-md-6">
																		<div class="form-group">
																				<label class="form-label">
																						<span>Email To</span>
																						<!---->
																				</label>
																				<input type="text" class="form-input" source="input" label="Email To" col="12">
																		</div>
																</div>
																<div class="col-12 col-md-6">
																		<div class="form-group">
																				<label class="form-label">
																						<span>BCC</span>
																						<!---->
																				</label>
																				<input type="text" class="form-input" source="input" label="BCC" col="12">
																				<!---->
																		</div>
																</div>
														</div>

														<div class="form-group">
																<label class="form-label">
																		<span>Subject</span>
																</label>

																<input type="text" class="form-input" source="input" label="Subject">
														</div>
												</div>
										</div>
										<div class="modal-footer">
												<div>

												</div>
												<div>
														<button type="button" class="btn btn-default" data-dismiss="modal">
																<span class="btn-text">Cancel</span>
														</button>

														<router-link type="button" class="btn btn-primary" to="/invoices">
																<span class="btn-text">
																		Sent
																</span>
														</router-link>
												</div>
										</div>
								</form>
						</div>
				</div>
		</div>

		<div class="panel">
				<div class="panel-heading">
						<div class="panel-title">
								<div>
										<a class="router-link-active">PDF Viewer</a>
								</div>
						</div>
				</div>

				<div class="panel-body">
						<object data="http://127.0.0.1:8000/storage/invoices/CDX0058.pdf" type="application/pdf" width="100%" height="750px">
						    <embed src="http://127.0.0.1:8000/storage/invoices/CDX0058.pdf" type="application/pdf" width="100%">
						        <p>This browser does not support PDFs. Please download the PDF to view it: <a href="http://127.0.0.1:8000/storage/invoices/CDX0058.pdf">Download PDF</a>.</p>
						    </embed>
						</object>
				</div>
		</div>
	</div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import { get, byMethod } from '../../lib/api'
    import axios from 'axios';
		import pdf from 'pdfvuer'

    export default {
				components: {
					pdf
				},
        data () {
            return {
                show: false,
								customerPayments: {},
                model: {
                    items: [],
                    customer: {}
                }
            }
        },
        beforeRouteEnter(to, from, next) {
            get('http://127.0.0.1:8000/api/invoices/'+to.params.id)
                .then((res) => {
                    next(vm => vm.setData(res))
                })
        },
        beforeRouteUpdate(to, from, next) {
            this.show = false
            get('http://127.0.0.1:8000/api/invoices/'+to.params.id)
                .then((res) => {
                    this.setData(res)
                    next()
                })
        },
        methods: {
            setData(res) {
                Vue.set(this.$data, 'model', res.data.model)
                this.show = true
            },
            deleteItem() {
                byMethod('delete', 'http://127.0.0.1:8000/api/invoices/'+this.model.id)
                    .then((res) => {
                        if(res.data.deleted) {
                            this.$router.push('/invoices')
                        }
                    })
            },
            sendEmail(id) {
                axios.post('http://127.0.0.1:8000/invoices/sendEmail/' + id)
                    .then(response => {

                    });
            },
						loadCustomerPayments() {
                axios.get('http://127.0.0.1:8000/api/customer/1/payments').then(({ data }) => (this.customerPayments = data.collection));
            },
        },
				created() {
						this.loadCustomerPayments();
        }
    }
</script>
