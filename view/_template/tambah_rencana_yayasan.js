$('#sub_jenis').hide();
$('#masa_kerja').hide();
var kategori_gaji = ['~pilih~', 'Honor Guru Tetap', 'Honor Guru Tidak Tetap', 'Honor Guru DPK', 'Tunjangan', 'Honor Pegawai'];
var kategori_bantuan = ['~pilih~', 'Bantuan Sosial Siswa', 'Bantuan Hadiah', 'BPJS Kesehatan Kasek', 'BPJS Kesehatan Guru', 'BPJS Ketenagakerjaan', 'Seragam', 'THR'];
var kategori_mk = ['Masa Kerja 0 - 1 Tahun', 'Masa Kerja 1 - 5 Tahun', 'Masa Kerja 5 - 9 Tahun', 'Masa Kerja 9 - 13 Tahun', 'Masa Kerja 13 Tahun - Dst'];
// $('#detailisinya').hide();

function pilihjenis() {
  var j = document.getElementById('jenis').value;
  console.log(j);
  document.getElementById('isidetailnya').innerHTML = '';

  if (j === '0') {
    // $('#detailisinya').hide();
    $('#sub_jenis').show();
    var gaji = "";
    for (let i = 0; i < kategori_gaji.length; i++) {
      gaji = gaji + '<option value=' + i + '>' + kategori_gaji[i] + '</option>';
    }
    document.getElementById('pilih_sub_jenis').innerHTML = gaji;
    console.log(gaji);
  } else if (j === '1') {
    $('#masa_kerja').hide();
    $('#sub_jenis').hide();
    // $('#detailisinya').hide();
    // $('#detail_uraian').show();
    var bantuan = "";
    bantuan += '<select name="detail_uraian[]" id="" class="form-control" required><option value="">~ Pilih Biaya ~</option>';
    for (let i = 0; i < kategori_bantuan.length; i++) {
      bantuan += '<option>' + kategori_bantuan[i] + '</option>';
    }
    bantuan += '</select>';
    document.getElementById('isidetailnya').innerHTML = bantuan;
    console.log(bantuan);
  } else if (j === '2') {
    $('#masa_kerja').hide();
    $('#sub_jenis').hide();
    // $('#detailisinya').show();
    document.getElementById('isidetailnya').innerHTML = '<input type="text" name="detail_uraian[]" class="form-control" required>';
  } else {
    $('#masa_kerja').hide();
    $('#sub_jenis').hide();
  }
}

$('#pilih_sub_jenis').change(function () {
  var sj = document.getElementById('pilih_sub_jenis').value;
  var tahun = document.getElementById('tahun').value;
  console.log(sj);
  console.log(tahun);
  document.getElementById('isidetailnya').innerHTML = '';
  var data = "";
  if ((sj == 1) || (sj == 2)) {
    $('#masa_kerja').show();
    var mk = "";
    for (let i = 0; i < kategori_mk.length; i++) {
      mk = mk + '<option value=' + i + '>' + kategori_mk[i] + '</option>';
    }
    document.getElementById('pilih_masa_kerja').innerHTML = mk;
    $('#pilih_masa_kerja').change(function () {
      // document.getElementById('detail_uraian').innerHTML = null;
      document.getElementById('isidetailnya').innerHTML = null;
      var mk = document.getElementById('pilih_masa_kerja').value;
      console.log(mk);
      $.ajax({
        type: "GET",
        data: "subjenis=" + sj + "&mk=" + mk + "&tahun=" + tahun,
        url: "../../proses/json/json_pegawai.php",
        success: function (result) {
          console.log(result);
          var objResult = JSON.parse(result);
          var bantuan = "";
          bantuan += '<select name="detail_uraian[]" id="" class="form-control" required><option value="">~ Pilih Biaya ~</option>';
          $.each(objResult, function (k, v) {
            data = '<option>' + v.nama + '</option>';
            // var dataHandler = $("#detail_uraian");
            // dataHandler.append(data);
            bantuan += data;
          });
          bantuan += '</select>';
          document.getElementById('isidetailnya').innerHTML = bantuan;
        }
      })
    })
  } else {
    $('#masa_kerja').hide();
    $.ajax({
      type: "GET",
      data: "subjenis=" + sj + "&mk=0" + "&tahun=" + tahun,
      url: "../../proses/json/json_pegawai.php",
      success: function (result) {
        console.log(result);
        var objResult = JSON.parse(result);
        var bantuan = "";
        bantuan += '<select name="detail_uraian[]" id="" class="form-control" required><option value="">~ Pilih Biaya ~</option>';
        $.each(objResult, function (k, v) {
          if (sj == 4) {
            data = '<option>' + v + '</option>';
          } else {
            data = '<option>' + v.nama + '</option>';
          }
          // var dataHandler = $("#detail_uraian");
          // dataHandler.append(data);
          bantuan += data;
        });
        bantuan += '</select>';
        document.getElementById('isidetailnya').innerHTML = bantuan;
      }
    })
  }




  // document.getElementById('detail_uraian').innerHTML=null;
  // // dataHandler.append(null);
  // console.log(sj);
  // var data = "";
  // $.ajax({
  //   type:"GET",
  //   data:"subjenis="+sj,
  //   url:"../../proses/json/json_pegawai.php",
  //   success:function(result){
  //     console.log(result);
  //     var objResult = JSON.parse(result);
  //     $.each(objResult,function(k,v){
  //       if (sj==4) {
  //         data = '<option>'+v+'</option>';
  //         $('#masa_kerja').hide();
  //       } else {
  //         $('#masa_kerja').hide();
  //         data = '<option>'+v.nama+'</option>';
  //         tahun = v.tahun_masuk;
  //         document.getElementById('masa_kerja').value=tahun;
  //       }
  //       var dataHandler = $("#detail_uraian");
  //       dataHandler.append(data);
  //     })
  //   }
  // })
})

function hitung() {
  var satuan = document.getElementById('jumlah_satuan').value;
  var volume = document.getElementById('jumlah_volume').value;
  var jumlah = document.getElementById('jumlah').value;
  if (jumlah == "") {
    jumlah = 1;
  }
  if (volume == "") {
    volume = 1;
  }
  if (satuan == "") {
    satuan = 1;
  }
  var total = satuan * volume * jumlah;
  console.log(total);
  document.getElementById('total').value = total;

}


$('#tambah').click(function () {
  console.log('pencet');
  $('#datanya').append(`
    <tr>
    <td> <select name="detail_uraian[]"  id="detail_uraian" class="form-control" required>
            <option value="">~ Pilih Biaya ~</option>
          </select></td>
      <td><input type="number" name="jumlah_satuan[]" class="form-control" id=""></td>
      <td><input type="text" name="satuan[]" class="form-control" id=""></td>
      <td><input type="number" name="jumlah_volume[]" class="form-control" id=""></td>
      <td><input type="text" name="volume[]" class="form-control" id=""></td>
      <td><input type="number" name="jumlah[]" class="form-control" id=""></td>
      <td><input type="number" name="total[]" class="form-control" id=""></td>
    </tr>
  `);
});