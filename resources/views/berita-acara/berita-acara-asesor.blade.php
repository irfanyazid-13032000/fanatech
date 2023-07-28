<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <style>
    p{
      margin:0;
    }
    .berita{
      margin-top:10px;
      font-family:arial;
      font-weight:bold;
      font-size:18px;
      text-align:center;
      text-decoration:underline;
    }

    .no{
      font-size:18px;
      text-align:center;
      font-family:arial;
    }

    .keterangan{
      padding-left:20px;
    }

    .keterangan td{
      font-size:20px;
    }

    .titikDua{
      vertical-align:top;
    }
    .alamat{
      vertical-align:top;
      text-align:left;
    }



    .skema{
      margin-top:10px;
      margin-left:20px;
      font-family:arial;
      font-size:18px;
      text-align:center;
      padding-left:20px;
      border:1px solid black;
      border-collapse:collapse;

    }

    .skema thead{
      font-weight:bold;

    }

    .skema td{
      border:.3px solid black;
    }


    .ttd{
      width:100%;
    }

    .tetapkan td {
      font-family: Arial, sans-serif;
      font-weight:bold;
      font-size: 20px;
      text-align: left;
      /* border-bottom: 1px solid black; */
  }

  .tetapkan{
    border-collapse: collapse;
    /* padding:10px; */
    text-align:center;
    /* width:50% */
  }

.table-wrapper {
  display: block;
  margin-left: 60px; /* Geser tabel sebanyak 100px ke arah kanan */
}

.lsppojokkanan{
  padding-left:50px; 
  font-weight:bold;
  font-family:arial;
}

.image-container {
  display: flex;
  justify-content: center; /* Horizontally center the image */
}

/* Additional styles for the table, etc. */



.namaTTD{
  /* padding-left:100px;  */
  text-align:center;
  font-weight:bold;
  font-family:arial;
  text-decoration:underline;
}

.jabatan{
  /* padding-left:100px;  */
  text-align:center;
  font-weight:bold;

  

}


  </style>
</head>
<body>

  <table class="header">
    <tr>
      <td width="20%">
        <img src="{{asset('assets/images/lsp.png')}}" style="width:130px">
      </td>
      <td>
        <p class="lembaga">LEMBAGA SERTIFIKASI PROFESI</p>
        <p class="lsp">LSP. MITRA SERTIFINDO KONSTRUKSI</p>
        <p class="sertifikasi">Sertifikasi Sektor Konstruksi</p>
        <p class="alamat">Sekretariat Graha Aptakindo Jl. Raya Mayor Abd Rahman No. 9 Bojong Kec. Kemang Kab. Bogor - Jawa Barat Tlp : 0812-6111-5378  email : lspmsk4@gmail.com</p>
        
      </td>
    </tr>
  </table>
  <hr>


  <div class="content">
    <p class="berita">BERITA ACARA HASIL KOMPETENSI</p>
    <p class="no">NO:{{$beritaAcara->no_surat}}</p>

    <br>
    <br>
    <br>


    <table class="keterangan">
      <tr>
        <td>Nama LSP</td>
        <td>:</td>
        <td>Mitra Sertifindo Konstruksi</td>
      </tr>
      <tr>
        <td class="alamat">Alamat</td>
        <td class="titikDua">:</td>
        <td>Aptakindo Jl. Raya Mayor Abd Rahman No. 9  Bojong Kec. Kemang Kab. Bogor</td>
      </tr>
      <tr>
        <td>Tempat Uji</td>
        <td>:</td>
        <td>{{$beritaAcara->tempat_uji}}</td>
      </tr>
      <tr>
        <td>Jumlah Asesi</td>
        <td>:</td>
        <td>{{$beritaAcara->jumlah_asesi}}</td>
      </tr>
      <tr>
        <td>Kompeten</td>
        <td>:</td>
        <td>{{$beritaAcara->kompeten}}</td>
      </tr>
      <tr>
        <td>Belum Kompeten</td>
        <td>:</td>
        <td>{{$beritaAcara->belum_kompeten}}</td>
      </tr>
      <tr>
        <td>Nama Asesor</td>
        <td>:</td>
        <td>{{$beritaAcara->nama_asesor}}</td>
      </tr>
    </table>






    <table class="skema">
      <thead>
        <tr>
          <td>No</td>
          <td width="40%">Nama</td>
          <td width="40%">Skema</td>
          <td width="40%">Hasil (K/BK)</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesertaTes as $peserta )
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$peserta->nama}}</td>
          <td>{{ $peserta->skema }}</td>
          <td>{{$peserta->hasil}}</td>
        </tr>
        @endforeach
        
      </tbody>
    </table>

    <br>
    <br>
    <br>

    <table class="ttd">
      <tr>
        <td width="45%"></td>
        <td>
          <div class="table-wrapper">  
            <table class="tetapkan">
              <tr>
                <td>Ditetapkan</td>
                <td>:</td>
                <td>Bogor</td>
              </tr>
              <tr>
                <td style="border-bottom: 1px solid black;">Pada Tanggal</td>
                <td style="border-bottom: 1px solid black;">:</td>
                <td style="border-bottom: 1px solid black;">{{$beritaAcara->tanggal}}</td>
              </tr>
            </table>
          </div>

          <br>

          <p class="lsppojokkanan">LSP MITRA SERTIFINDO KONSTRUKSI</p>
          <div class="image-container">
            <img src="{{asset('assets/images/naruto signature.png')}}" alt="Signature">
          </div>
          <p class="namaTTD">(Ny. Neneng Rusana)</p>
          <p class="jabatan">Ketua LSP</p>
        </td>
      </tr>
     
    </table>


  </div>

  
</body>
<script>
  window.print()
</script>
</html>
