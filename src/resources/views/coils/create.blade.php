@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="header">
                <h1>納品</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('flash_message'))
            <div class="flash_message">
                <h2>
                    {{ session('flash_message') }}
                </h2>
            </div>
            @endif
            <form action="{{route('coils.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>H/No</label>
                    <input type="text" name="h_no" id="">
                </div>
                <div class="form-group">
                <label>表面肌</label>
                <select  name="surface" id="">
                    <option value="no4">No.4</option>
                    <option value="ap_d">AP-D</option>
                    <option value="アルミ">アルミ</option>
                </select>
                </div>
                <div class="form-group">
                <label>メーカー</label>
                <select  name="maker" id="">
                    <option value="nssc">NSSC</option>
                    <option value="pos">POSCO</option>
                    <option value="nas">NAS</option>
                    <option value="nss">304A</option>
                    <option value="アルミ">アルミ</option>
                </select>
                </div>
                <div class="form-group">
                <label>材質</label>
                <select  name="material" id="">
                    <option value="444">444</option>
                    <option value="329J4L">329J4L</option>
                    <option value="304">304</option>
                    <option value="304A">304A</option>
                    <option value="アルミ">アルミ</option>
                </select>
                </div>
                <div class="form-group">
                    <label>板厚</label>
                    <select  name="plate_thickness" id="">
                        <option value="0.8t">0.8t   </option>
                        <option value="1.5t">1.5t   </option>
                        <option value="2.0t">2.0t   </option>
                        <option value="2.5t">2.5t   </option>
                        <option value="3.0t">3.0t    </option>
                        <option value="4.0t">4.0t</option>
                    </select>
                </div>
                <div class="form-group">
                <label>補足</label>
                <textarea name="supplement" id="" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
        </div>
    </div>
</div>
@endsection