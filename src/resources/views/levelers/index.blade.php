@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
              <div class="header">
                <h1>レベラー</h1>
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
                  <form class="form-inline" action="{{route('levelers.index')}}" method="GET">
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
                        <th>補足</th>     
                    </tr>
                    <tr>
                    @foreach($coils as $coil)
                        <td>{{ $coil->h_no }}</td>
                        <td>{{ $coil->surface }}</td>
                        <td>{{ $coil->maker }}</td>
                        <td>{{ $coil->material }}</td>
                        <td>{{ $coil->plate_thickness }}</td>
                        <td>{{ $coil->supplement }}</td>
                        <td>
                          <a href="{{ route('levelers.edit',$coil->id) }}" class="btn btn-primary">納品</a>
                        </td>
                    </tr>
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