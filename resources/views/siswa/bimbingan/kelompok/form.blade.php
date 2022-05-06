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
											<th scope="col">Nama Siswa</th>
											<th scope="col" class="text-right">Kelas</th>
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

		$(document).ready(function() {
    cari();
});


// funciton cari produk
function cari(){


$("form").submit(function (event) {
		  $('.nominal').unmask();
  });

$(".touchspin").TouchSpin({
  buttondown_class: "btn btn-primary",
  buttonup_class: "btn btn-primary",
});

$('.cariproduk').select2({
  placeholder: 'Cari dan Pilih Produk...',
  ajax: {
	url: '{{route("siswa.bimbingan.kelompok.daftar_produk")}}',
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
		var produk_id = $('.cariproduk').eq(index).val();
		var pelanggan_id = 1;
		var qty = $('.kuantitas').eq(index).val();
		var harga = get_harga(produk_id,pelanggan_id);
		$('.harga_satuan').eq(index).html(numeral(harga).format('0,0'));
		var sub_total = qty*harga;
		$('.sub_total').eq(index).html(numeral(sub_total).format('0,0'));

		if(!isNaN(sub_total)){
			total_belanja += sub_total;
		}

		});

	}

	var produk = {
      nama : "Minyak goreng",
      kelas : "",
 
  };


  function hapus_baris(e){
		$(e).closest('tr').remove();
		hitung();
	}

	 function tambah_baris(produk){

		var baris = "<tr>"
				+"<td><select class='form-control cariproduk' name='produk_id[]'></select></td>"
				+"<td class='harga_satuan text-right'>"+produk.kelas+"</td>"
				+"<td><a onclick='hapus_baris(this)' class='btn btn-icon btn-outline-warning btn-sm waves-effect waves-light' href='javascript:void(0)'><i class='fadeIn animated fas fa-trash-alt'></i></a></td>"

				+"</tr>";
		$('#tabel_pesanan > tbody > tr').eq(-1).before(baris);
		cari();
	}
    </script>
@endsection