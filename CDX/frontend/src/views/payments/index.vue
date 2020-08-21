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
                <th>#{{ item.id }}</th>
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
                    url: 'http://127.0.0.1:8000/api/payments',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                    ],
                    filterGroups: [
                        {
                            name: 'Invoices',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                            ]
                        }
                    ]
                }
            }
        },
        methods: {
            detailsPage(item) {
                this.$router.push('/payments/' + item.id)
            },
            setData(res) {
                Vue.set(this.$data, 'collection', res.data.results)
                this.page = this.model.current_page
            },
        }
    }
</script>
