<template>
    <div id="dashboard">
        <div class="row">
            <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="card-box">
                    <div class="metric-card-inner">
                        <div class="metric-card-title">
                            <span>fasdfsaf</span>
                            <hr>
                        </div>
                        <!-- <p class="metric-card-value">{{ card.value }}</p> -->
                        <div  class="metric-card-body">
                            <h6 class="metric--card--title">fdasfasdfghfj</h6>
                            <div class="nowrap">
                                <span class="number">2</span>
                                <span class="unit ">€</span>
                            </div>
                        </div>

                        <div class="metric-card-body" style="display: -webkit-inline-box;">
                            <div class="pieContainer">
                                fadsf
                            </div>
                            <div>
                                <h6 class="miniGraphContainer">Total</h6>
                                <div class="nowrap">
                                    <span class="number">0</span>
                                    <span class="unit">quotes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="card-box panel dashboard-panel m-t-10">
                    <div class="metric-card-title">
                        <span>Latest Projects</span>
                    </div>

                    <table class="table col-md-12" style="width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col" class="d-none d-sm-block">No.</th>
                            <th scope="col">Client | Project</th>
                            <th scope="col">Total</th>
                            <th scope="col" class="d-none d-sm-block">Deadline</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="d-none d-sm-block">#22</th>
                            <th>
                                Blacksoft
                                <div>
                                    <a class="btn-show" href="/projects/view/2">Project for CODIXITAL LABS SRL</a>
                                </div>
                            </th>
                            <td>€ 22</td>
                            <td class="d-none d-sm-block">20.02.2020</td>
                            <td>
                              <span class="status status-blue">
                                <span class="status-text">End</span>
                              </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="card-box panel dashboard-panel">
                    <div class="metric-card-title">
                        <span>Latest Quotes</span>
                    </div>

                    <table class="table col-md-12" style="width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col">Issue date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Sum RON</th>
                            <th scope="col">PDF</th>
                            <th scope="col">
                                <i class="fas fa-envelope-open-text"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>20.02</td>
                            <th>
                                fadsfas
                            </th>
                            <td>
                                € 22
                            </td>
                            <td>
                                <i class="far fa-file-pdf"></i>
                            </td>
                            <td>
                                <i class="far fa-check-square"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xs-12 col-md-6 col-xl-4">
                <div class="card-box">
                    <h4 class="header-title">Monthly Sales</h4>
                    <p class="text-muted f-s-13">March 01 - April 01</p>

                    <div class="mb-3 mt-4">
                        <div class="float-right d-none d-xl-block">
                            <img src="https://coderthemes.com/greeva/horizontal/default/assets/images/cards/visa.png" alt="user-card" height="28">
                            <img src="https://coderthemes.com/greeva/horizontal/default/assets/images/cards/master.png" alt="user-card" height="28">
                            <img src="https://coderthemes.com/greeva/horizontal/default/assets/images/cards/american-express.png" alt="user-card" height="28">
                        </div>
                        <h2 class="font-weight-light">€ 700.00</h2>
                    </div>

                </div>
            </div>

            <div class="col-12 col-xs-12 col-md-6 col-xl-4">
                <div class="card-box">
                    <h4 class="header-title mb-3">Statistics</h4>

                    <div class="row text-center">
                        <div class="col-sm-4 mb-3">
                            <h3 class="font-weight-light">4,335</h3>
                            <p class="text-muted text-overflow f-s-13">Total Sales</p>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <h3 class="font-weight-light">874</h3>
                            <p class="text-muted text-overflow f-s-13">Total Sales</p>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <h3 class="font-weight-light">2,548</h3>
                            <p class="text-muted text-overflow f-s-13">Total Sales</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>
