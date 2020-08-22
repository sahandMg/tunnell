@extends('panel.master.layout')
@section('bodyContent')

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row" style="direction: rtl;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="title-1 m-b-25 text-right" style="direction: rtl;">لیست تراکنش ها
                            </h2>
                        </div>
                        <div class="col-md-6 text-left">
                            <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">شارژ کیف پول</button>
                        </div>
                    </div>

                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr class="text-center">
                                    <th>مقدار</th>
                                    <th>شرح</th>
                                    <th>وضعیت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>10000 تومان</td>
                                    <td>شارژ اکانت</td>
                                    <td style="color: green;">موفق</td>
                                </tr>
                                <tr class="text-center">
                                    <td>10000 تومان</td>
                                    <td>شارژ اکانت</td>
                                    <td style="color: red;">ناموفق</td>
                                </tr>
                                <tr class="text-center">
                                    <td>10000 تومان</td>
                                    <td>شارژ اکانت</td>
                                    <td style="color: green;">موفق</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <br />

        </div>
    </div>

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-center">شارژ کیف پول</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row mx-auto text-center" style="direction: rtl;margin: auto;">
                                <input name="chargeValue" type="number" class="form-control col-md-5" aria-required="true" aria-invalid="false" value="10000" min="10000" />
                                <span style="margin-right: 10px;">تومان</span>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer text-center">
                            <button  type="button" class="btn btn-success">شارژ کیف پول</button>
                        </div>

                    </div>
                </div>
            </div>



@endsection