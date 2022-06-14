@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @auth
            <ul>
                <li class="list-unstyled">
                    <a href="{{ route('managements.index') }}" class="btn btn-primary">管理</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ url('/boards') }}" class="btn btn-primary">報告</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ route('coils.create') }}" class="btn btn-primary">コイル</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ route('levelers.index') }}" class="btn btn-primary">レベラー</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ route('trimmings.index') }}" class="btn btn-primary">トリミング</a>
                </li>
                <li class="list-unstyled">
                    <a href="{{ route('press.index') }}" class="btn btn-primary">プレス</a>
                </li>
            </ul>
            @else
            @include('auth.login')
            @endauth
            </div>
        </div>
    </div>
</div>
@endsection
