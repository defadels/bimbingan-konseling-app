@extends('layout.siswa_layout')

@section('title','Siswa Dashboard')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Konseling Kelompok</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">B&K Kelompok</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Konseling Kelompok</h5>
                    <hr>

                    <div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Daftar Nama Siswa</h4>
								
							</div>
                            <a onclick="tambah_baris(produk)" class="text-end btn btn-icon btn-outline-warning btn-sm" href="javascript:void(0)"><i class="fadeIn animated fas fa-plus"></i></a>
							<hr>
							<div class="table-respnsive">
								<table class="table" id="tabel_pesanan">
									<thead class="thead-dark">
										<tr>
											<th scope="col" width="30%">Nama</th>
											<th scope="col" width="10%" class="text-center">Kelas</th>
											<th width="1%"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

                    <form action="">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul bimbingan">
                        </div>
                        <div class="form-group">
                            <label for="judul">Pokok Pembahasan</label>
                            <textarea name="judul" cols="30" rows="10" id="judul" placeholder="Tuliskan pokok pembahasan" class="form-control"></textarea>
                        </div>

                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                    <input type="submit" value="{{$button}}" class="btn btn-md btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection

@section('page_script')
    <script>		
		$('.select2').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
			
		});

		$('#cari-pelanggan').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
			
			ajax: {
			url: '{{route("siswa.bimbingan.kelompok.cari.siswa")}}',
			dataType: 'json',
			delay: 250,
			data: function (params) {
				return {
					cari: params.term,
					page: params.page || 1
				};
				},
			processResults: function (data) {
				return {
				results:  $.map(data.results, function (item) {
					return {
					text: item.nama +" ["+item.email+"]",
					id: item.id,
					}
				}),
          pagination: data.pagination
        };
      },
      cache: true
    },

    templateSelection: formatRepoSelection

		});

		function formatRepoSelection (repo) {

		return repo.text;
		}

		$("#cari-pelanggan").change(function(){
       		var id_pelanggan = $(this).val(); 
	   		var $el = $("#label_alamat");
			var $kepada = $('#tujuan_nama');
			var $alamat_tujuan = $('#tujuan_alamat');
			var $tujuan_nomor_hp = $('#tujuan_nomor_hp');

			$el.empty(); // remove old options
			$kepada.val('');
			$alamat_tujuan.empty();
			$tujuan_nomor_hp.val('');

       $.ajax({
          type: "GET",
          dataType: "json",
          url: '{{ route("siswa.bimbingan.kelompok.kelas")}}?kelas_id='+id_kelas,
          success: function(msg){

			console.log(msg);

			data_global = msg;

				var status = ["ya"];
				var filteredArray = msg.result.filter(function(df){

				return status.indexOf(df.is_default) > -1;
				});

				filteredArray = filteredArray[0];

				console.log(filteredArray[0]);


				$kepada.val(filteredArray.nama_penerima);
				$alamat_tujuan.html(filteredArray.alamat_penerima);
				$tujuan_nomor_hp.val(filteredArray.nomor_hp_penerima);

				// $el.empty(); // remove old options
				$.each(msg.result, function(key, value) {
					$el.append($("<option></option>")
     				.attr("value", value.id).text(value.label));
					 console.log(value.id);
					 console.log(value.label);
				
				});                                                     
          }
       });
	   
	   
     }); 
	

	 function get_alamat(id_alamat) {
		 var hasil = 0;
		 if(isNaN(id_alamat)){
			 return 0;
		 }
		 $.ajax({
			url: '{{route("siswa.bimbingan.kelompok.kelas")}}?id='+id_alamat,
			success : function (msg) {
				hasil = msg;
			},
			async : false
		 });
		 return hasil;
	 }

	 $("#label_alamat").change(function() {
		 
		 var id = $('#label_alamat').val();

		 var filteredArray = msg.result.filter(function(df){

		return status.indexOf(df.is_default) > -1;
		});

		filteredArray = filteredArray[0];

		console.log(filteredArray[0]);

		 var alamat = get_alamat(id);

		 console.log(alamat);

		 if (alamat.is_default === "ya") {
			$('#tujuan_nama').val(alamat.result.nama_penerima);
			$('#tujuan_nomor_hp').val(alamat.result.nomor_hp_penerima);
			$('#alamat_tujuan').html(alamat.result.alamat_penerima);
		 } else {
			$('#tujuan_nama').val();
			$('#tujuan_nomor_hp').val("");
			$('#alamat_tujuan').html("");
		 }
	 });

// funciton cari produk
function cari(){

$('.cariproduk').select2({
  placeholder: 'Cari Nama Siswa...',
  ajax: {
	url: '{{route("siswa.bimbingan.kelompok.cari.siswa")}}',
	dataType: 'json',
	delay: 250,
	data: function (params) {
	  var selainx = $(".cariproduk").map(function(){return $(this).val();}).get().join(',');
		return {
		  selain: selainx,
		  cari: params.term,
		  page: params.page || 1
		};
	  },
	processResults: function (data) {
	  return {
		results:  $.map(data.results, function (item) {

		  return {
			text: item.nama,
			id: item.id
		  }
		}),
		pagination: data.pagination
	  };
	},
	cache: true
  }
});


}

// function tabel pesanan

	function hitung(){
		// var x = $(".cariproduk")
		//            .map(function(){return $(this).val();}).get().join(',');
		//  console.log(x);
			var total_belanja = 0;

		$('#tabel_pesanan > tbody  > tr').each(function(index) {
		var siswa_id = $('.cariproduk').eq(index).val();
		var qty = $('.kuantitas').eq(index).val();
		var harga = get_harga(produk_id,pelanggan_id);
		$('.harga_satuan').eq(index).html(numeral(harga).format('0,0'));
		var sub_total = qty*harga;
		$('.sub_total').eq(index).html(numeral(sub_total).format('0,0'));

		if(!isNaN(sub_total)){
			total_belanja += sub_total;
		}

		});

		$('#total_belanja').html(numeral(total_belanja).format('0,0'));

		var ongkir = $('#ongkos_kirim').cleanVal();
		var biaya_tambahan = $('#biaya_tambahan').cleanVal();
		var biaya_packing = $('#biaya_packing').cleanVal();
		var diskon = $('#diskon').cleanVal();
		var grand_total =  parseInt(ongkir) + parseInt(biaya_tambahan)+ parseInt(biaya_packing) - parseInt(diskon) + parseInt(total_belanja);

		$('#grand_total').val(numeral(grand_total).format('0,0'));

	}

	var produk = {
      nama : "Minyak goreng",
      kelas_id : 2,
  };


  function hapus_baris(e){
		$(e).closest('tr').remove();
	}

	 function tambah_baris(produk){

		var baris = "<tr>"
				+"<td><select class='form-control cariproduk' name='siswa_id[]'></select></td>"
				+"<td class='sub_total text-right'>"+produk.kelas_id+"</td>"
				+"<td><a onclick='hapus_baris(this)' class='btn btn-icon btn-outline-warning btn-sm waves-effect waves-light' href='javascript:void(0)'><i class='fadeIn animated fas fa-trash-alt'></i></a></td>"

				+"</tr>";
		$('#tabel_pesanan > tbody > tr').eq(-1).before(baris);
		cari();
	}
    </script>
@endsection