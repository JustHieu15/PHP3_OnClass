@extends('admin.layout.default')


@section('content')
<div class="p-4" style="min-height: 800px">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{ route('admin.products.addProduct') }}" class="btn btn-info">Thêm mới</a>
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }} vnđ</td>
            <td >{{ $product->description }}</td>
            <td><img src="{{ asset($product->image) }}" style="width: 100px; height: 100px" alt=""></td>
            <td>
                <a class="btn btn-warning">
                    Sửa
                </a>
                <a href="{{ route('admin.products.deleteProduct', $product->product_id) }}" class="btn btn-danger" onclick="return confirm('U sure?')">
                    Xóa
                </a>
            </td>
        </tr>
        @endforeach
{{--        <tr>--}}
{{--            <th scope="row">1</th>--}}
{{--            <td>Nokia 520</td>--}}
{{--            <td>15000000 vnđ</td>--}}
{{--            <td>Điện thoại mới giá ổn</td>--}}
{{--            <td>--}}
{{--                <button class="btn btn-warning">--}}
{{--                    Sửa--}}
{{--                </button>--}}
{{--                <button class="btn btn-danger">--}}
{{--                    Xóa--}}
{{--                </button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">1</th>--}}
{{--            <td>Nokia 520</td>--}}
{{--            <td>15000000 vnđ</td>--}}
{{--            <td>Điện thoại mới giá ổn</td>--}}
{{--            <td>--}}
{{--                <button class="btn btn-warning">--}}
{{--                    Sửa--}}
{{--                </button>--}}
{{--                <button class="btn btn-danger">--}}
{{--                    Xóa--}}
{{--                </button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">1</th>--}}
{{--            <td>Nokia 520</td>--}}
{{--            <td>15000000 vnđ</td>--}}
{{--            <td>Điện thoại mới giá ổn</td>--}}
{{--            <td>--}}
{{--                <button class="btn btn-warning">--}}
{{--                    Sửa--}}
{{--                </button>--}}
{{--                <button class="btn btn-danger">--}}
{{--                    Xóa--}}
{{--                </button>--}}
{{--            </td>--}}
{{--        </tr>--}}
        </tbody>
    </table>
</div>
@endsection
