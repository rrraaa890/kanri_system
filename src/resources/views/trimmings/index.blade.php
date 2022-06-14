@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
              <div class="header">
                <h1>トリミング</h1>
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
                  <form class="form-inline" action="{{route('trimmings.index')}}" method="GET">
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
                        <th>サイズ</th>         
                        <th>枚数</th>         
                        <th>補足</th>     
                    </tr>
                    <tr>
                    @foreach($levelers as $leveler)
                    @if($leveler['number_of_sheets']>0)
                        <td>{{ $leveler->h_no }}</td>
                        <td>{{ $leveler->surface }}</td>
                        <td>{{ $leveler->maker }}</td>
                        <td>{{ $leveler->material }}</td>
                        <td>{{ $leveler->plate_thickness }}</td>
                        <td>{{ $leveler->size }}</td>
                        <td>{{ $leveler->number_of_sheets }}</td>
                        <td>{{ $leveler->supplement }}</td>
                        <td>
                          <a href="{{ route('trimmings.edit',$leveler->id) }}" class="btn btn-primary">納品</a>
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