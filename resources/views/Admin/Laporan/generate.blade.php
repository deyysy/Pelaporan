{{-- <link rel="stylesheet" href="{{ asset('css/format.css') }}"> --}}

{{-- Judul Format Laporan --}}
<h2>Laporan Pengaduan Masyarakat</h2>
<h4>Kantor Kepala Desa Rancamanyar</h4>
<h6>Jl. Raya Bojongkukun No. 160, Rancamanyar, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375</h6>

{{-- Tabel Data Laporan --}}
<table class="table-border">
 <thead>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Tanggal</th>
      <th>Isi Laporan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody
    @foreach($pengaduan as $data => $d)
    <tr>
      <td>{{ $data += 1 }}</td>
      <td>{{ $d->nik }}</td>
      <td>{{ $d->tgl_pengaduan }}</td>
      <td>{{ $d->isi_laporan }}</td>
      <td>{{ $d->status == '0' ? 'pending' : ucwords($d->status) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
