<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF Generator</title>

        <style>
            .document {
                border-radius: 3px;
                background-color: #fff;
                box-shadow: 0 10px 35px 0 rgba(154, 161, 171, 0.1) !important;
            }

            .card-box {
                padding: 0 !important;
            }

            .inv-header {
                background-color: #32343D;
                padding: 45px 40px 25px 40px;
            }

            span {
                font-size: 32px;
                font-weight: 400;
                color: #C7C8CC;
                vertical-align: middle;
                margin-top: auto;
            }

            p.total_title {
                font-size: 16px;
                font-weight: 500;
                color: #7A797E;
                border-bottom: 3px solid #C87D48;
                padding-right: 40px;
            }

            span {
                color: #0F0F11;
                font-weight: 700;
            }
        </style>
    </head>

    <body>
        <div class="document">
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
                            <p class="total_title">Total Due  <span class="float-right"> : 22.00$</span></p>
                            <p><strong>Date </strong> <span class="float-right"> : 20.02.2020</span></p>
                            <p><strong>Due Date </strong> <span class="float-right"> : 20.02.2020</span></p>
                            <p><strong>Order Status </strong>
                                <span class="float-right">
                                        <span class="badge badge-danger">Paid</span>
                                    </span>
                            </p>
                            <p><strong>Order No. </strong> : <span class="float-right">CDX0038</span></p>
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
                                Codixital Kbs<br>
                                Romania, Galati<br>
                                gsfdgfdsgfdsgf<br>
                                <abbr title="Phone">P:</abbr> 6345643643
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
                                <tr>
                                    <td>42342</td>
                                    <td>
                                        <b>sfdgsdg</b> <br>
                                        gsdfggds
                                    </td>
                                    <td>3</td>
                                    <td>65</td>
                                    <td class="text-right">$ 65</td>
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
                            <p><b>Sub-total:</b> <span class="float-right">5346</span></p>
                            <p><b>Discount:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; 6345</span></p>
                            <h3>63456</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
    </body>
</html>
