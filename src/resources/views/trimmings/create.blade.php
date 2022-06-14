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
            <form action="{{route('trimmings.update',$leveler->id)}}" method="post">
                @method('PATCH')
                @csrf
                <table class="table">
                    <tr>
                        <th>H/No</th>
                        <th>表面肌</th>
                        <th>メーカー</th>     
                        <th>材質</th>     
                        <th>板厚</th>         
                        <th>補足</th>     
                    </tr>
                    <tr>
                        <div class="form-group">
                        <td ><input type="hidden" name="h_no" value="{{ $leveler->h_no }}">{{ $leveler->h_no }}</td>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="surface" value="{{ $leveler->surface }}">{{ $leveler->surface }}</td>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="maker" value="{{ $leveler->maker }}">{{ $leveler->maker }}</td>
                        <div>                      <div class="form-group">
                        <td ><input type="hidden" name="material" value="{{ $leveler->material }}">{{ $leveler->material }}</td>
                        </div>
                        <div class="form-group">
                        <td ><input type="hidden" name="plate_thickness" value="{{ $leveler->plate_thickness }}">{{ $leveler->plate_thickness }}</td>
                        </div>
                        <td>{{ $leveler->supplement }}</td>
                    </tr>
                </table>
                <div class="form-group">
                    <label>機種</label>
                   <input type="text" name="model">
                </div>
                <div class="form-group">
                    <label>枚数</label>
                    <input type="text" name="number_of_sheets" id="">
                </div>
                <div class="form-group">
                <label>補足</label>
                <textarea name="supplement" id="" cols="30" rows="10">{{ $leveler->supplement }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
            <form action='{{ route('trimmings.destroy', $leveler->id) }}' method='post'>
            @method('DELETE')
            @csrf
            <button type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？");'>消去</button>
            </form>
        </div>
    </div>
</div>
@endsection