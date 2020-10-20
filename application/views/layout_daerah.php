<!doctype html>
<html>
  <head>
    <title>Data Daerah</title>
    <style>
      #map-canvas {width:100%;height:400px;border:solid #999 1px;}
      select {width:240px;}
      #kab_box,#kec_box,#kel_box,#lat_box,#lng_box{display:none;}
     </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript" src="ajax_daerah.js"></script>
  </head>
  <body>
    <table>
      <tr>
      <td>Pilih Kabupaten</td>
      <td>
        <select name="prop" id="prop" onchange="ajaxkec(this.value)">
          <option value="">Pilih Kabupaten</option>
          <?php 
          include 'koneksi.php';
          $query=$db->prepare("SELECT id_kab,nama FROM kabupaten ORDER BY nama");
          $query->execute();
          while ($data=$query->fetchObject()){
          echo '<option value="'.$data->id_kab.'">'.$data->nama.'</option>';
          }
          ?>
        <select>
      </td>
    </tr>
    <!-- <tr id='kab_box'>
      <td>Pilih Kota/Kab</td>
      <td>
        <select name="kota" id="kota" onchange="ajaxkec(this.value)">
          <option value="">Pilih Kota</option>
        </select>
      </td>
    </tr> -->
    <tr>
      <td>Pilih Kec</td>
      <td>
        <select name="kec" id="kec" onchange="ajaxkel(this.value)">
          <option value="">Pilih Kecamatan</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Pilih Kelurahan/Desa</td>
      <td>
        <select name="kel" id="kel" onchange="showCoordinate();">
          <option value="">Pilih Kelurahan/Desa</option>
        </select>
      </td>
    </tr>
    </table>
    <div id="map-canvas"></div>
  </body>
</html>