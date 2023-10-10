@extends('layouts.admin')
@section('title','Thương hiệu')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>brand</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
          
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <a href="{{ route('brand.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i> Thêm </a>
          <a href="{{ route('brand.trash') }}" class="btn bg-success"><i class="fa-solid fa-trash-can" style="color: #511f1f;"></i>Thùng Rác </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th class="text-center" style="width:140px;">Hình</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Created_at</th>
              <th scope="col">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_brand as $brand)
            <tr>
                <td class="text-center">
                    <input type="checkbox">
                </td>
                <td class="text-center">
                    <img class="img-fluid" src="{{ asset('image/brand/' . $brand->image) }}"
                        alt="{{ $brand->image }}">

                </td>
                <td class="text-center">{{ $brand->name }}</td>
                <td class="text-center">brand</td>
                <td class="text-center">{{ $brand->created_at }}</td>
                <td class="text-center">
                    @if ($brand->status == 1)
                        <a href="{{ route('brand.status', ['brand' => $brand->id]) }}"
                            class="btn btn-sm btn-success">

                            <i class="fa-solid fa-toggle-on"></i>
                        </a>
                    @else
                        <a href="{{ route('brand.status', ['brand' => $brand->id]) }}"
                         class="btn btn-sm btn-danger">

                            <i class="fa-solid fa-toggle-off"></i>
                        </a>
                    @endif

                    <a href="{{ route('brand.edit', ['brand' => $brand->id]) }}" {{-- đường dẫn khi nhấp vào edit có tham số truyền vào nên phải có ->id  --}}
                        class="btn btn-sm btn-info">

                        <i class="fa-solid fa-edit"></i>
                    </a>
                    <a href="{{ route('brand.show', ['brand' => $brand->id]) }}" {{-- đường dẫn khi nhấp vào edit có tham số truyền vào nên phải có ->id  --}}
                        class="btn btn-sm btn-success">
                        <i class="fa-solid fa-eye"></i>

                    </a>
                    <a href="{{ route('brand.delete', ['brand' => $brand->id]) }}"
                        class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                
                </td>
                <td class="text-center">{{ $brand->id }}</td>
            </tr>
        @endforeach
            
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>

@endsection