@extends('panel.master.layout')
@section('bodyContent')

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row" style="direction: rtl;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2 class="title-1 m-b-25 text-right" style="direction: rtl;">لیست تونل ها</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr class="text-center">
                                    <th>توکن</th>
                                    <th>وضعیت</th>
                                    <th>آدرس</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user->tokens as $token)
                                <tr class="text-center">
                                    <td>{{$token->code}}</td>
                                    <td>{{$token->status == 1?'فعال':'خاموش'}}</td>
                                    <td>{{$token->address}}</td>
                                </tr>
                            @endforeach

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

@endsection