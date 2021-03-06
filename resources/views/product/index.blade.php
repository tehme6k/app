<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            All Category <b></b>


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

                        <div class="card-header"> All Products</div>


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    @if($product->category_id == 0)
                                        <td style="color:red">None Set</td>
                                    @else
                                        <td>{{ $product->category->name }}</td>
                                    @endif

                                    </td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                        {{ $products->links() }}

                    </div>
                </div>





                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Product</div>
                        <div class="card-body">

                            <form action="{{ route('product.store') }}" method="POST" >
                            @csrf
                            <!-- Product Name -->
                                <div class="form-group">
                                    <label for="staticEmail2" class="visually-hidden">Product</label>
                                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Categories -->
                                <div class="form-group">
                                    <label for="Category">Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
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
