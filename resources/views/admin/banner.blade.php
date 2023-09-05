@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <a  href="{{ url('admin/top') }}" class="text-decoration-none text-dark lead">←戻る</a>
            <h3 class="my-3">バナー管理</h3>
            <div class="d-flex align-items-center ms-lg-5 ps-5">
                <img class="w-25 mx-4" src="../storage/img/test.jpg">
                <label class="border border-dark my-5 mx-4 px-2"><input class="d-none" type="file" >ファイルを選択</label>
                <button class="fw-bold fs-3 mx-4 bg-danger text-white rounded-circle  border border-white">ー</button>
            </div>
            <div class="mx-5 my-4">
                <button class="fw-bold fs-3 bg-success text-white rounded-circle  border border-white">＋</button>
            </div>
            <div class="m-3 text-center ">
                <button class="btn btn-secondary px-5 py-0 fs-4">登録</button>
            </div>
        </div>
    </div>
</div>
@endsection