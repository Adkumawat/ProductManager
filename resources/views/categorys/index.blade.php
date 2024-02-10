@include('layouts.index')

{{-- @section('content') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>product</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @foreach ($category->products as $product)
                                            {{ $product->name }},
                                        @endforeach
                                    </td>
                                    <td>{{ $category->products_count }}</td>
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
