@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <a  href="{{ url('admin/top') }}" class="text-decoration-none text-dark lead">←戻る</a>
            <h3 class="my-3">バナー管理</h3>
            @if (session('flash_message'))
            <div class="flash_message ps-4 py-2">
                <h4 class="text-center">{{ session('flash_message') }}</h4>
            </div>
            @endif

            <form action="{{route('banner.update')}}" method="post" action="/upload" enctype="multipart/form-data">
                @csrf
                <div id='bannerBlock'>
                    @foreach($banners as $banner)
                        <div class="d-flex align-items-center ms-lg-5 ps-5 my-2">
                            <div class="w-25 me-5">
                                <img class="w-100 mx-4" src="../storage/{{$banner->image}}" id="image{{$loop->iteration}}">
                            </div>
                            <input class="bannerFile" type="file" name="img{{$loop->iteration}}">
                            <input class="d-none" type="text" name="{{$loop->iteration}}" value="{{$banner->id}}">
                            <button class="btn fw-bold fs-3 mx-4 bg-danger text-white rounded-circle  border border-white bannerDelete" type="button" name="{{$loop->iteration}}" id='{{$banner->id}}'>ー</button>
                            @if($loop->last)
                            <div class="d-none loop">
                                <input class="d-none" type="text" name="loop" value="{{$loop->count}}">
                                <p>{{$loop->count}}</p>
                            </div>
                            @endif
                        </div> 
                    @endforeach
                </div>

                <div class="mx-5 my-4">
                    <button class="btn fw-bold fs-3 bg-success text-white rounded-circle  border border-white" type="button" id='bannerCreate'>＋</button>
                </div>
                <div class="m-3 text-center ">
                    <button class="btn btn-secondary px-5 py-0 fs-4" type="submit" name="send">登録</button>
                </div>
            </form>         
        </div>
    </div>
</div>
@endsection