@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
              <div class="header">
                <h1>プレス</h1>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  @if (session('flash_message'))
                  <div class="flash_message">
                      <h2>
                          {{ session('flash_message') }}
                      </h2>
                  </div>
                  @endif
                  @auth
                  <form class="form-inline" action="{{route('press.index')}}" method="GET">
                    <div class="form-group">
                    <input type="text" name="keyword" value="{{$keyword}}"
                    placeholder="キーワードを入力">
                    <input type="submit" value="検索" >
                    </div>
                  </form>
                  @if(!empty($keyword))
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
                    @foreach($trimmings as $trimming)
                    @if($trimming['number_of_sheets']>0)
                        <td>{{ $trimming->h_no }}</td>
                        <td>{{ $trimming->surface }}</td>
                        <td>{{ $trimming->maker }}</td>
                        <td>{{ $trimming->material }}</td>
                        <td>{{ $trimming->plate_thickness }}</td>
                        <td>{{ $trimming->model }}</td>
                        <td>{{ $trimming->number_of_sheets }}</td>
                        <td>{{ $trimming->supplement }}</td>
                        <td>
                          <a href="{{ route('press.edit',$trimming->id) }}" class="btn btn-primary">納品</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </table>
                    <br>
                  @endif 
                  @endauth 
            </div>
        </div>
    </div>
</div>
@endsection