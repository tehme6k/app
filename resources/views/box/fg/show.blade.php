
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Ingredient Retention <b></b>


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
                                <th scope="col">Lot Number</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Production Date</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($retentions as $ret)
                                <tr>
                                    <td>{{$ret->lot}}</td>
                                    <td>{{$ret->product->name}}</td>
                                    <td>{{$ret->prod_date}}</td>
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

