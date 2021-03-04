<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Finished Goods Retention <b></b>


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">



                <div class="col-md-8 ">
                    <div class="card">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-header">Box List - Select to print</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Box ID</th>
                                <th scope="col">Box Name</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($boxes as $box)
                                <tr>
                                    <th>{{ $box->id }}</th>
                                    <td>
                                        <a href="{{route('fgbox.show', $box->id)}}">{{ $box->name }}</a>
                                    </td>



                                </tr>
                            @endforeach



                            </tbody>
                        </table>






                    </div>
                </div>





                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Retention</div>
                        <div class="card-body">

                            <form action="{{ route('fgbox.store') }}" method="POST" >
                                @csrf
                                {{--                 <div class="form-group">--}}
                                {{--                    <label for="staticEmail2" class="visually-hidden">Box</label>--}}
                                {{--                    <input type="text" name="box" class="form-control" id="staticEmail2" placeholder="Box #">--}}

                                {{--                        @error('category_name')--}}
                                {{--                            <span class="text-danger">{{ $message }}</span>--}}
                                {{--                        @enderror--}}

                                {{--                </div>--}}

                                <div class="form-group">

                                    <input type="text" name="pn" class="form-control" id="staticEmail2" placeholder="Part Number">

                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <input type="text" name="lot" class="form-control" id="staticEmail2" placeholder="Lot #">

                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="lab_date" class="visually-hidden">Lab Date</label>
                                    <input type="date" name="lab_date" class="form-control">
                                    @error('lab_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lab_date" class="visually-hidden">Exp Date</label>
                                    <input type="date" name="exp_date" class="form-control">
                                    @error('exp_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                {{--                <div class="form-group">--}}
                                {{--                <input--}}
                                {{--                    name="date"--}}
                                {{--                    id="start_date"--}}
                                {{--                    class="form-control"--}}
                                {{--                    style="width: 100%; display: inline;"--}}
                                {{--                    onchange="invoicedue(event);"--}}
                                {{--                    type="date">--}}
                                {{--                </div>--}}
                                {{--                <div class="form-group">--}}
                                {{--                <input--}}
                                {{--                    name="date"--}}
                                {{--                    id="end_date"--}}
                                {{--                    class="form-control"--}}
                                {{--                    style="width: 100%; display: inline;"--}}
                                {{--                    onchange="invoicedue(event);"--}}
                                {{--                    type="date">--}}
                                {{--                </div>--}}

                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        @foreach($listItems as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        <option value="new">New Box</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





            </div>
        </div>









    </div>
</x-app-layout>

