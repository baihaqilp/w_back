<div class="small-box bg-warning">
  <div class="inner">
  <table>
    <th colspan="2">TRANSAKSI</th>
      <tr>
        <td>Bulan</td>
        <td>{{count($bulan)}}</td>
        <td>@currency($bulan_nilai)</td>
      </tr>
      <tr>
        <td>Minggu</td>
        <td>{{count($minggu)}}</td>
        <td>@currency($minggu_nilai)</td>
      </tr>
      <tr>
        <td>Hari</td>
        <td>{{count($hari)}}</td>
        <td>@currency($hari_nilai)</td>
      </tr>
    </table>
  </div>
</div>