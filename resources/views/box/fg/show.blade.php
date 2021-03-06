<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Finished Goods Retention <b></b>


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">



                <div class="col-md-9 ">
                    <div class="card">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-header">{{$fgbox->name}}</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Part Number</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Lot</th>
{{--                                <th scope="col">Test date</th>--}}
                                <th scope="col">Expiration Date</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($retentions as $ret)
                                <tr>
                                    <td>{{$ret->product_id}}</td>
                                    <td>{{$ret->product->name}}</td>
                                    <td>{{$ret->lot}}</td>
{{--                                    <td>{{$ret->lab_date}}</td>--}}
                                    @if($ret->exp_date == "0000-00-00")
                                        <td>N/A</td>
                                    @else
                                        <td>{{$ret->exp_date}}</td>
                                    @endif


                                </tr>
                            @endforeach



                            </tbody>
                        </table>






                    </div>
                </div>



{{--                Add data Form--}}

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header"> Add Retention</div>
                        <div class="card-body">

{{--                                Form here--}}

                        </div>
                    </div>
                </div>





            </div>
        </div>









    </div>
</x-app-layout>

