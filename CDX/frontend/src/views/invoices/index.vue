<template>
    <div id="dataTables">
        <filterable v-bind="filterable">
            <thead slot="thead">
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Customer</th>
                <th>Grand Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tr slot-scope="{ item }" @click="detailsPage(item)">
                <th>#{{item.id}}</th>
                <th>{{item.number}}</th>
                <td>{{item.date | formatMiniDate }}</td>
                <td>{{item.due_date | formatMiniDate }}</td>
                <th>{{ item.customer.name }}</th>
                <td> {{item.total | formatMoney}}</td>
                <td>
                    <span v-if="item.status == 'Paid'" class="status status-blue">
                        <span class="status-text">{{ item.status }}</span>
                    </span>

                    <span v-else="item.status == 'Sent'" class="status status-light_green">
                        <span class="status-text">{{ item.status }}</span>
                    </span>
                </td>
            </tr>
        </filterable>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import { get } from '../../lib/api'
    import Filterable from '../../components/Filterable'

    export default {
        components: { Filterable },
        data () {
            return {
                filterable: {
                    url: 'http://127.0.0.1:8000/api/invoices',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Number', name: 'number', type: 'string'},
                        {title: 'Date', name: 'date', type: 'datetime'},
                        {title: 'Due Date', name: 'due_date', type: 'datetime'},
                        {title: 'Discount', name: 'discount', type: 'numeric'},
                        {title: 'Total', name: 'total', type: 'string'},
                    ],
                    filterGroups: [
                        {
                            name: 'Invoices',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Number', name: 'number', type: 'string'},
                                {title: 'Date', name: 'date', type: 'datetime'},
                                {title: 'Due Date', name: 'due_date', type: 'datetime'},
                                {title: 'Discount', name: 'discount', type: 'numeric'},
                                {title: 'Total', name: 'total', type: 'string'},
                            ]
                        }
                    ]
                }
            }
        },
        methods: {
            detailsPage(item) {
                this.$router.push('/invoices/' + item.id)
            },
            setData(res) {
                Vue.set(this.$data, 'collection', res.data.results)
                this.page = this.model.current_page
            },
        }
    }
</script>
