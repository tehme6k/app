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

                        <div class="card-header"> All Category</div>


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <!-- <th scope="col">Sub-Category Name</th> -->
                                <th scope="col">User Name</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        @if($category->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else
                                            {{ $category->created_at->diffForHumans() }}
                                        @endif

                                    </td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                        {{ $categories->links() }}

                    </div>
                </div>





                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Category</div>
                        <div class="card-body">

                            <form action="{{ route('category.store') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="staticEmail2" class="visually-hidden">Category name</label>
                                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Category Name">

                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





            </div>
        </div>









    </div>
</x-app-layout>
