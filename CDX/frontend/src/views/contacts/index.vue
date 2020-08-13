<template>
    <div id="dataTables">
        <filterable v-bind="filterable">
            <thead slot="thead">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone No.</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tr slot-scope="{ item }" @click="detailsPage(item)">
                <th>#{{ item.id }}</th>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.phone }}</td>
                <td> {{ item.notes }}</td>
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
                    url: 'http://127.0.0.1:8000/api/contacts',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Name', name: 'name', type: 'string'},
                        {title: 'Email', name: 'email', type: 'string'},
                        {title: 'Address', name: 'address', type: 'string'},
                        {title: 'Phone', name: 'phone', type: 'string'},
                        {title: 'Notes', name: 'notes', type: 'string'},
                    ],
                    filterGroups: [
                        {
                            name: 'Invoices',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Name', name: 'name', type: 'string'},
                                {title: 'Email', name: 'email', type: 'string'},
                                {title: 'Address', name: 'address', type: 'string'},
                                {title: 'Phone', name: 'phone', type: 'string'},
                                {title: 'Notes', name: 'notes', type: 'string'},
                            ]
                        }
                    ]
                }
            }
        },
        methods: {
            detailsPage(item) {
                this.$router.push('/contacts/' + item.id)
            },
            setData(res) {
                Vue.set(this.$data, 'collection', res.data.results)
                this.page = this.model.current_page
            },
        }
    }
</script>
