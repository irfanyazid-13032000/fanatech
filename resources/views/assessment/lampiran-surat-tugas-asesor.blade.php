<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <style>


  /* Styling untuk halaman potret */
  @media print {
      /* Potret */
      @page {
        size: landscape;
      }

      /* Sembunyikan konten potret */
   

  }

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

    .lampiran{
      margin-left:20px;
      font-family:arial;
      font-size:18px;
      font-weight:bold;

    }

    .keterangan{
      margin-left:20px;
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
      font-size: 20px;
      text-align: left;
      padding-left:20px;
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
  margin-left: 180px; /* Geser tabel sebanyak 100px ke arah kanan */
}

.lsppojokkanan{
  padding-left:180px; 
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

    <br>

    <p class="lampiran">Lampiran Surat</p>
      <table class="tetapkan">
        <tr>
          <td>Nomor</td>
          <td>:</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
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
        <tr>
          <td>1</td>
          <td>yajid</td>
          <td>kursus</td>
          <td>890</td>
        </tr>
        <tr>
          <td>2</td>
          <td>toni</td>
          <td>kursus</td>
          <td>800</td>
        </tr>
        <tr>
          <td>3</td>
          <td>rudi</td>
          <td>bimbel</td>
          <td>200</td>
        </tr>
      </tbody>
    </table>

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
                <td style="border-bottom: 1px solid black;">30 mei 2023</td>
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
