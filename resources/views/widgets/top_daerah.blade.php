<div class="small-box bg-success ">
  <div class="inner">
  <table>
    <th colspan="2">TOP 5 Daerah Anggota</th>
    @foreach($top as $top5)
      <tr>
        <td>{{$top5->provinsi}}</td>
        <td>{{$top5->total}} anggota</td>
      </tr>
    @endforeach
      
    </table>
  </div>
</div>