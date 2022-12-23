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