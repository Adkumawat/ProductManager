
@include('layouts.index')

{{-- @section('content') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="col-2 left">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="get" style="display: inline-block;">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
