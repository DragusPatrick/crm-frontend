<template>
    <div class="card-box page-content">
        <div class="header-button panel">
            <button type="button" class="btn btn-default"><!---->
                <span class="btn-text">Import</span> <!---->
            </button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                <i class="fas fa-plus"></i> Add Quote
            </button>
        </div>

        <div class="filterable-mid">
            <div>
                <div>
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="icon icon-ios-download btn-icon"></span>
                        <span class="btn-text">
                          <i class="fas fa-file-export"></i> Export
                          </span> <!---->
                    </button> <!---->
                </div>
            </div>
        </div>

        <table class="panel table col-md-12 table-responsive-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">Issue date</th>
                <th scope="col">No.</th>
                <th scope="">Client | Project</th>
                <th scope="col">Sum Total</th>
                <th scope="col">Status</th>
                <th scope="col">PDF	</th>
                <th scope="col">Invoice	</th>
                <th scope="col">	</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="quote in quotes.data" :key="quote.id" @click="detailsPage(quote.id)">
                <td>{{ quote.date | formatMiniDate }}</td>
                <th>#{{ quote.id }}</th>
                <td>
                  <span class="f-w-700">
                    INVENTIFF SRL
                  </span>
                    <div>
                        <a class="btn-show sub-span" href="/projects/view/2">Project: BlackSoft</a>
                    </div>
                </td>
                <th>€ {{ quote.unit_price | formatMoney }}</th>
                <td>
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

                    <span v-if="quote.status == 'NEW'" class="status status-light_blue">
                <span class="status-text">{{ quote.status }}</span>
              </span>
                </td>
                <td>
                    <i class="far fa-file-pdf"></i>
                </td>
                <td>
                    <i class="far fa-file-alt"></i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import axios from 'axios'

    export default {
        data() {
            return {
                editmode: true,
                quotes: {}
            }
        },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/api/quotes?page=' + page)
                    .then(response => {
                        this.quotes = response.data;
                    });
            },
            loadQuotes() {
                axios.get('http://127.0.0.1:8000/api/quotes').then(({ data }) => (this.quotes = data));
            },
            detailsPage(id) {
                this.$router.push('/quotes/' + id)
            },
        },
        created() {
            this.loadQuotes();
        }
    }
</script>
