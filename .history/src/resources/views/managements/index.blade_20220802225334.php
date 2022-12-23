@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
              <div class="header">
                <h1>管理</h1>
              </div>
              <form action="{{ route('managements.index') }}"method="GET">
                <input type="month" name="month" value="{{$month}}">
                <input type="submit" value="検索" >
              </form>
              @if(!empty($presses))
              <form action="{{ route('managements.export') }}"method="GET">
              <!-- <input type="hidden" name="month" value="$month"> -->
                <input type="submit" value="ダウンロード" >
              <table class='table'>
                <tr>
                  <th>H/No</th>
                  <th>表面肌</th>
                  <th>メーカー</th>     
                  <th>材質</th>     
                  <th>板厚</th>         
                  <th>機種</th>         
                  <th>完成枚数</th>             
                  <th>補足</th>     
                </tr>
                @foreach($managements as $management)
                <tr>
                  <td>{{ $management->h_no }}</td>
                  <td>{{ $management->surface }}</td>
                  <td>{{ $management->maker }}</td>
                  <td>{{ $management->material }}</td>
                  <td>{{ $management->plate_thickness }}</td>
                  <td>{{ $management->model }}</td>
                  <td>{{ $management->good}}</td>
                  <td>{{ $management->supplement }}</td>
                </tr>
                
                  @endforeach
                </table>
              </form>
              @endif
        </div>
    </div>
</div>
@endsection