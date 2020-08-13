<template>
    <div class="panel panel-margin">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <a href="/invoices" class="router-link-active">Invoices</a> / QT-4929610
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

        <div class="panel-body">
            <div>
                <div ref="content" class="document">
                    <div class="card-box">
                        <!-- Logo & title -->
                        <div class="inv-header clearfix">
                            <div class="float-left">
                                <span>INVOICE</span>
                            </div>
                            <div class="float-right">
                                <div>
                                    <img src="https://coderthemes.com/greeva/layouts/horizontal/assets/images/logo-dark.png" alt="" height="20">
                                </div>
                                <div>
                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                </div>
                            </div>
                        </div>

                        <div class="inv-subheader row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b>Hello, Stanley Jones</b></p>
                                    <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                        promises to provide high quality products for you as well as outstanding
                                        customer service for every transaction. </p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mt-3 float-right" style="width: 60%;">
                                    <p class="total_title">Total Due  <span class="float-right"> : {{ model.total | formatMoney }}</span></p>
                                    <p><strong>Date </strong> : <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{ model.date | formatMiniDate }}</span></p>
                                    <p><strong>Due Date </strong> : <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{ model.due_date | formatMiniDate }}</span></p>
                                    <p><strong>Order Status </strong>
                                        <span class="float-right">
                                            <span class="badge badge-danger">{{ model.status }}</span>
                                        </span>
                                    </p>
                                    <p><strong>Order No. </strong> : <span class="float-right">{{ model.number }} </span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h6>Billing Address</h6>
                                <address class="line-h-24">
                                    Stanley Jones<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="text-md-right">
                                    <h6>Shipping Address</h6>
                                    <address class="line-h-24">
                                        {{ model.customer.name }}<br>
                                        {{ model.customer.country }} {{ model.customer.city }}<br>
                                        {{ model.customer.address }}<br>
                                        <abbr title="Phone">P:</abbr> {{ model.customer.phone }}
                                    </address>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                        <tr><th># Item Code</th>
                                            <th>Item</th>
                                            <th style="width: 10%">Quantity</th>
                                            <th style="width: 10%">Unit Price</th>
                                            <th style="width: 10%" class="text-right">Total</th>
                                        </tr></thead>
                                        <tbody>
                                        <tr v-for="item in model.items" :key="item.id">
                                            <td>{{ item.product.item_code }}</td>
                                            <td>
                                                <b>{{ item.product.description }}</b> <br>
                                                {{ item.product.description }}
                                            </td>
                                            <td>{{ item.qty }}</td>
                                            <td>{{ item.unit_price | formatMoney }}</td>
                                            <td class="text-right">$ {{ item.qty * item.unit_price | formatMoney }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="clearfix pt-5">
                                    <h6>Notes:</h6>

                                    <small class="text-muted">
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-6">
                                <div class="float-right pt-4">
                                    <p><b>Sub-total:</b> <span class="float-right">{{ model.sub_total | formatMoney }}</span></p>
                                    <p><b>Discount:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; {{ model.discount | formatMoney }}</span></p>
                                    <h3>{{ model.total | formatMoney }}</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!--                <div class="mt-4 mb-1">-->
                        <!--                    <div class="text-right d-print-none">-->
                        <!--                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>-->
                        <!--                        <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                    </div>
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
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import {get, byMethod} from '../../lib/api'
    import axios from 'axios';

    export default {
        data () {
            return {
                show: false,
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
            }
        }
    }
</script>
