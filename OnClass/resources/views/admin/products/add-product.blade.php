@extends('admin.layout.default')

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Thêm mới sản phẩm</h4>

        <form action="{{ route('admin.products.createProduct') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group mb-3">
                <label for="price">Giá sản phẩm</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>

            <div class="form-group mb-3">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
@endsection




