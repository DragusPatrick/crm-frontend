<template>
    <div id="invoice-form" class="panel" v-if="show">
        <div class="panel-heading">
            <span class="panel-title">{{ title }} Invoice</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Customer</label>
                        <typeahead :url="customerURL" :initialize="form.customer"
                                   @input="onCustomer" />
                        <small class="error-control" v-if="errors.customer_id">
                            {{ errors.customer_id[0] }}
                        </small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  class="form-label">
                            Number
                            <small>Auto Generated</small>
                        </label>
                        <span class="form-input disabled" disabled="disabled">{{form.number}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  class="form-label">
                            Reference
                            <small>(Optional)</small>
                        </label>
                        <input type="text" class="form-input" v-model="form.reference">
                        <small class="error-control" v-if="errors.reference">
                            {{errors.reference[0]}}
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  class="form-label">Date</label>
                        <input type="date" class="form-input" v-model="form.date">
<!--                        <vue-datepicker-local v-model="form.date" inputClass="form-input" format="YYYY-MM-DD" />-->
                        <small class="error-control" v-if="errors.date">
                            {{errors.date[0]}}
                        </small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label  class="form-label">Due Date</label>
                        <input type="date" class="form-input" v-model="form.due_date">
                        <small class="error-control" v-if="errors.due_date">
                            {{errors.due_date[0]}}
                        </small>
                    </div>
                </div>
            </div>
            <hr>
            <table class="form-table">
                <thead>
                <tr>
                    <th>Item Description</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in form.items">
                    <td class="w-14">
                        <typeahead :url="productURL" :initialize="item.product"
                                   @input="onProduct(index, $event)" />
                        <small class="error-control" v-if="errors[`items.${index}.product_id`]">
                            {{errors[`items.${index}.product_id`][0]}}
                        </small>
                    </td>
                    <td class="w-4">
                        <input type="text" class="form-input" v-model="item.unit_price">
                        <small class="error-control" v-if="errors[`items.${index}.unit_price`]">
                            {{errors[`items.${index}.unit_price`][0]}}
                        </small>
                    </td>
                    <td class="w-2">
                        <input type="text" class="form-input" v-model="item.qty">
                        <small class="error-control" v-if="errors[`items.${index}.qty`]">
                            {{errors[`items.${index}.qty`][0]}}
                        </small>
                    </td>
                    <td class="w-4">
                            <span class="form-input">
                                {{Number(item.qty) * Number(item.unit_price) | formatMoney}}
                            </span>
                    </td>
                    <td>
                        <span class="form-remove" @click="removeItem(index)">&times;</span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-default btn-sm" @click="addNewLine">
                            <i class="fas fa-plus"></i>
                            <span class="btn-text">
                                  Add new line
                              </span>
                        </button>
                    </td>
                    <td class="form-summary">Sub Total</td>
                    <td>{{ subTotal | formatMoney }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="form-summary">Discount</td>
                    <td>
                        <input type="text" class="form-input" v-model="form.discount">
                        <small class="form-control" v-if="errors.discount">
                            {{ errors.discount[0] }}
                        </small>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="form-summary">Grand Total</td>
                    <td>{{ total | formatMoney }}</td>
                </tr>
                </tfoot>
            </table>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Terms and Conditions</label>
                        <textarea class="form-input" v-model="form.terms_and_conditions" style="height:99px;"></textarea>
                        <small class="error-control" v-if="errors.terms_and_conditions">
                            {{ errors.terms_and_conditions[0] }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer flex-end">
            <div>
                <button class="btn btn-primary" :disabled="isProcessing" @click="onSave">Save</button>
                <button class="btn btn-default" :disabled="isProcessing" @click="onCancel">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import { get, byMethod } from '../../lib/api'
    import { Typeahead } from '../../components/typeahead'
    import VueDatepickerLocal from 'vue-datepicker-local'

    function initialize(to) {
        let urls = {
            'create': 'http://127.0.0.1:8000/api/invoices/create',
            'edit': 'http://127.0.0.1:8000/api/invoices/${to.params.id}/edit'
        }
        return (urls[to.meta.mode] || urls['create'])
    }
    export default {
        components: { Typeahead, VueDatepickerLocal },
        data () {
            return {
                time: new Date(),
                form: {},
                errors: {},
                isProcessing: false,
                show: false,
                resource: 'http://127.0.0.1:8000/api/invoices',
                store: 'http://127.0.0.1:8000/api/invoices',
                method: 'POST',
                title: 'Create',
                productURL: 'http://127.0.0.1:8000/api/products',
                customerURL: 'http://127.0.0.1:8000/api/customers'
            }
        },
        beforeRouteEnter(to, from, next) {
            get(initialize(to))
                .then((res) => {
                    next(vm => vm.setData(res))
                })
        },
        beforeRouteUpdate(to, from, next) {
            this.show = false
            get(initialize(to))
                .then((res) => {
                    this.setData(res)
                    next()
                })
        },
        computed: {
            subTotal() {
                return this.form.items.reduce((carry, item) => {
                    return carry + (Number(item.unit_price) * Number(item.qty))
                }, 0)
            },
            total() {
                return this.subTotal - Number(this.form.discount)
            }
        },
        methods: {
            setData(res) {
                Vue.set(this.$data, 'form', res.data.form)
                if(this.$route.meta.mode === 'edit') {
                    this.store = 'http://127.0.0.1:8000/api/invoices/${this.$route.params.id}'
                    this.method = 'PUT'
                    this.title = 'Edit'
                }
                this.show = true
            },
            addNewLine() {
                this.form.items.push({
                    product_id: null,
                    product: null,
                    unit_price: 0,
                    qty: 1
                })
            },
            onCustomer(e) {
                const customer = e.target.value
                Vue.set(this.$data.form, 'customer', customer)
                Vue.set(this.$data.form, 'customer_id', customer.id)
            },
            onProduct(index, e) {
                const product = e.target.value
                Vue.set(this.form.items[index], 'product', product)
                Vue.set(this.form.items[index], 'product_id', product.id)
                Vue.set(this.form.items[index], 'unit_price', product.unit_price)
            },
            removeItem(index) {
                this.form.items.splice(index, 1)
            },
            onCancel() {
                if(this.$route.meta.mode === 'edit') {
                    this.$router.push('${this.resource}/${this.form.id}')
                } else {
                    this.$router.push(`${this.resource}`)
                }
            },
            autoComplete(){
                this.results = [];
                if(this.query.length > 0){
                    axios.get('http://127.0.0.1:8000/api/customers', { params: { query: this.query } }).then(response => {
                        this.results = response.data;
                    });
                }
            },
            onSave() {
                this.errors = {}
                this.isProcessing = true
                byMethod(this.method, this.store, this.form)
                    .then((res) => {
                        if(res.data && res.data.saved) {
                            this.success(res)
                        }
                    })
                    .catch((error) => {
                        if(error.response.status === 422) {
                            this.errors = error.response.data.errors
                        }
                        this.isProcessing = false
                    })
            },
            success(res) {
                this.$router.push('/invoices/'+$res.data.id)
            }
        }
    }
</script>
