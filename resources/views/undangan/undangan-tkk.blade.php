<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

  <style>
    p{
      font-size:20px;
    }

    .undangan{
      font-size:20px;
    }

    .informasi{
      font-size:20px;
    }

    .pembungkusttd {
      display: flex;
      justify-content: center; /* Horizontally center the content */
      align-items: center; /* Vertically center the content */
      font-weight:bold;

}

.ttd {
  width: 350px;
  max-width: 800px; /* Set a maximum width for the container */
  margin: 0 auto; /* Center the container horizontally using margin */
}

.ttd p {
  text-align: center; /* Center the text horizontally */
  font-size: 24px; /* Adjust the font size as needed */
}

.image-container {
  display: flex;
  justify-content: center; /* Horizontally center the image */
}


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

  <table width="100%" class="undangan">
    <tr>
      <td width="20px">No</td>
      <td width="2px">:</td>
      <td>{{$undangan->no_surat}}</td>
      <td style="padding-left:300px">Bogor, {{$undangan->tanggal}}</td>
    </tr>
    <tr>
      <td>Lampiran</td>
      <td>:</td>
      <td>{{$undangan->lampiran}}</td>
      <td></td>
    </tr>
  </table>

  <p>Kepada Yth</p>
  <p>{{$undangan->nama}}</p>
  <p style="font-weight:bold;">di <br> Tempat</p>
  <p style="font-weight:bold;">Hal: Undangan Uji Kompetensi</p>

  <p>Dengan Hormat,</p>

  <p>Dengan ini LSP Mitra Sertifindo Konstruksi menungundang Saudara untuk mengikuti Uji Kompetensi Skema {{ $undangan->skema }} yang di laksanakan pada :</p>



  <table class="informasi">

  <tr>
    <td>Hari/Tanggal</td>
    <td>:</td>
    <td>{{$undangan->tanggal}}</td>
  </tr>
  <tr>
    <td>Jam</td>
    <td>:</td>
    <td>{{$undangan->pukul}}</td>
  </tr>
  <tr>
    <td>Tempat</td>
    <td>:</td>
    <td>{{$undangan->tempat}}</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td>{{$undangan->alamat}}</td>
  </tr>

  </table>

  <p>Demikianlah Surat undangan ini kami sampaikan atas perhatian dan kerjasamanya kami ucapkan terima kasih</p>


  </div>

  <div class="pembungkusttd">
  <div class="ttd">
    <p>LEMBAGA SERTIFIKASI PROFESI MITRA SERTIFINDO KONSTRUKSI <br> (LSP MSK)</p>
  </div>
</div>

  <div class="image-container">
    <img src="{{asset('assets/images/naruto signature.png')}}" alt="Signature">
  </div>

  <p class="namaTTD">(Ny. Neneng Rusana)</p>
  <p class="jabatan">Ketua LSP</p>


  
</body>
<script>
  window.print()
</script>
</html>
