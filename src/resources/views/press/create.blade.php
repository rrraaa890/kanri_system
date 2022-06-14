@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="header">
                <h1>プレス</h1>
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
            <form action="{{route('press.update',$trimming->id)}}" method="post">
                @method('PATCH')
                @csrf
                <table class="table">
                    <tr>
                        <th>H/No</th>
                        <th>表面肌</th>
                        <th>メーカー</th>     
                        <th>材質</th>     
                        <th>板厚</th>         
                        <th>機種</th>         
                        <th>枚数</th>         
                        <th>補足</th>     
                    </tr>
                    <tr>
                        <div class="form-group">
                        <td ><input type="hidden" name="h_no" value="{{ $trimming->h_no }}">{{ $trimming->h_no }}</td>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="surface" value="{{ $trimming->surface }}">{{ $trimming->surface }}</td>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="maker" value="{{ $trimming->maker }}">{{ $trimming->maker }}</td>
                        <div>                      <div class="form-group">
                        <td ><input type="hidden" name="material" value="{{ $trimming->material }}">{{ $trimming->material }}</td>
                        </div>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="plate_thickness" value="{{ $trimming->plate_thickness }}">{{ $trimming->plate_thickness }}</td>
                        </div>
                        <div>
                        <td ><input type="hidden" name="model" value="{{ $trimming->model }}">{{ $trimming->model }}</td>
                        </div>
                        <td ><input type="hidden" name="number_of_sheets" value="{{ $trimming->number_of_sheets }}">{{ $trimming->number_of_sheets }}</td>
                        </div>
                        <td>{{ $trimming->supplement }}</td>
                    </tr>
                </table>
                <div class="form-group">
                    <label>良品</label>
                   <input type="text" name="good">
                </div>
                <div class="form-group">
                    <label>不良</label>
                    <input type="text" name="bad" id="">
                </div>
                <div class="form-group">
                <label>補足</label>
                <textarea name="supplement" id="" cols="30" rows="10" >{{ $trimming->supplement }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
            <form action='{{ route('press.destroy', $trimming->id) }}' method='post'>
            @method('DELETE')
            @csrf
            <button type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？");'>消去</button>
            </form>
        </div>
    </div>
</div>
@endsection