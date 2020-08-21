<template>
    <div id="dataTables">
        <filterable v-bind="filterable" title="Customer">
            <thead slot="thead">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>CIF</th>
                <th>Reg. Com.</th>
                <th>Client Code</th>
                <th>Country</th>
                <th>Email</th>
                <th>Website</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tr slot-scope="{ item }" @click="detailsPage(item)">
                <th class="hidden-xs">
                    {{ item.number }}
                </th>
                <td>{{ item.name }}</td>
                <td>{{ item.cif }}</td>
                <td>{{ item.reg_com }}</td>
                <td>{{ item.client_code }}</td>
                <td>{{ item.country }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.website }}</td>
                <td v-if="!item.phone.length" class="hidden-xs">N/A</td>
                <td v-if="item.phone.length" class="hidden-xs">{{ item.phone }}</td>
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
                    url: 'http://127.0.0.1:8000/api/customers',
                    orderables: [
                        {title: 'Id', name: 'id'},
                        {title: 'Number', name: 'string'},
                        {title: 'Date', name: 'date'},
                        {title: 'Due Date', name: 'due_date'},
                        {title: 'Discount', name: 'discount'},
                        {title: 'Total', name: 'total'},
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
                this.$router.push('/customers/' + item.id)
            },
            setData(res) {
                Vue.set(this.$data, 'collection', res.data.results)
                this.page = this.model.current_page
            },
        }
    }
</script>
