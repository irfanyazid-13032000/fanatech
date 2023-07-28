<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <style>



/* ini potrait */
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
      font-family:arial;
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

    .yang{
      margin-left:20px;
      font-family:arial;
      font-size:18px;

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


/* end potrait */

.landscape-content {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
  }


  </style>
</head>
<body>

<div class="potrait">

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
    <p class="berita">SURAT PERINTAH TUGAS ASESOR KOMPETENSI</p>
    <p class="no">NO:{{$asesor->no_surat}}</p>

    <br>
    <br>
    <br>

    <p class="yang">Yang Bertanda tangan dibawah Ini memberikan Tugas Kepada :</p>

    <table class="skema">
      <thead>
        <tr>
          <td>No</td>
          <td width="40%">Nama</td>
          <td width="40%">Jabatan</td>
          <td width="40%">Reg Met</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($anggotas as $anggota)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$anggota->nama}}</td>
          <td>{{$anggota->jabatan}}</td>
          <td>{{$anggota->reg_met}}</td>
        </tr>
        @endforeach
      
      </tbody>
    </table>

    <br>
   

    <p class="yang">Untuk Melakukan Uji Kompetensi pada :</p>

    <br>
    

    <table class="keterangan">
      <tr>
        <td>Hari/Tanggal</td>
        <td>:</td>
        <td>{{$asesor->tanggal}}</td>
      </tr>
      
     
      <tr>
        <td>Tempat</td>
        <td>:</td>
        <td>{{$asesor->tempat}}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$asesor->alamat}}</td>
      </tr>
      <tr>
        <td>Jumlah Asesi</td>
        <td>:</td>
        <td>{{$asesor->jumlah_asesi}}</td>
      </tr>
    </table>

    <br>

    <p class="yang">Demikian Surat Tugas Ini Dibuat untuk dilaksanakan Sebaik baiknya</p>

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
                <td>{{ $asesor->tempat }}</td>
              </tr>
              <tr>
                <td style="border-bottom: 1px solid black;">Pada Tanggal</td>
                <td style="border-bottom: 1px solid black;">:</td>
                <td style="border-bottom: 1px solid black;">{{$asesor->tanggal}}</td>
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


</div>

  
</body>
<script>
  window.print()
</script>
</html>
