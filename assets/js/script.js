$(document).ready(function() {
	var base_url = "http://localhost/projek-belanjaBajuOnline";

	$('#laporanTransaksiTiapUser').hide();
	$('#laporanSeluruhTransaksi').hide();
	$("#rbCariUser").hide();
	$("#namaUser").hide();
	
	$('#selectPilihLaporan').on('change', function() {
		if($("#selectPilihLaporan")[0].selectedIndex == 0) {
			$('#laporanSeluruhTransaksi').hide();
			$('#laporanTransaksiTiapUser').hide();
			$('#namaUser').val("");
			$('#namaUser').hide("");
			$("#cbCariUser").prop('checked', false);
			$('#inputTglAwal').val("");
			$('#inputTglAkhir').val("");
			$("#cbTotPemTertinggi1").prop('checked', false);
			$("#cbTotPemTertinggi2").prop('checked', false);
		} else if($("#selectPilihLaporan")[0].selectedIndex == 1) {
			$('#laporanSeluruhTransaksi').show();
			$('#laporanTransaksiTiapUser').hide();
			$('#namaUser').val("");
			$('#namaUser').hide("");
			$("#cbCariUser").prop('checked', false);
			$("#cbTotPemTertinggi1").prop('checked', false);
		} else {
			$('#laporanSeluruhTransaksi').hide();
			$('#laporanTransaksiTiapUser').show();
			$("#cbTotPemTertinggi1").prop('checked', false);
			$('#inputTglAwal').val("");
			$('#inputTglAkhir').val("");
		}
	})
	
	$('#cbCariUser').on('click', function() {
		if($(this).is(":checked")) {
			$("#namaUser").show();
		} else {
			$("#namaUser").hide();
		}
	})

	$('.tambahKeranjang').on('click', function() {
		jumlahKeranjang = parseInt($('#jumlahKeranjang').text());
		$('#jumlahKeranjang').text(jumlahKeranjang+1);
	})

	$('.tambahKeranjang').on('click', function() {
		// console.log($(this).data('id'));
		$(this).html('Telah Masuk Keranjang');
		$(this).removeClass('btn btn-primary tambahKeranjang mb-1');
		$(this).addClass('btn btn-success tambahKeranjang mb-1');
	})

	$('.simpanBaju').on('click', function() {
		// console.log($(this).data('id'));
		$(this).html('<i class="fa fa-heart" aria-hidden="true"></i> Tersimpan');
		$(this).removeClass('btn btn-light border-dark simpanBaju');
		$(this).addClass('btn btn-danger batalSimpanBaju');
	})

	// $('.batalSimpanBaju').on('click', function() {
	// 	$(this).removeClass('btn btn-danger batalSimpanBaju');
	// 	$(this).addClass('btn btn-light border-dark simpanBaju');
	// })

	$('#btnEditProfil').on('click', function() {
		$('#btnUpdate').show();
		$("#formEditProfil input").attr('disabled', false);
	})

	$("#formEditProfil input").attr('disabled', true);

	$('#btnCheckout').on('click', function() {
		var idUser = $('#idUser').val();
		var jumlahKeranjang = $('.keranjang').length;
		var arrayIdTransaksi = [];
		var arrayIdBaju = [];
		var arrayJumlahBaju = [];
		for(let i=0; i<jumlahKeranjang; i++) {
			arrayIdTransaksi.push($($('.idTransaksi')[i]).val());
			arrayIdBaju.push($($('.idBaju')[i]).val());
			arrayJumlahBaju.push($($('.jumlahBaju')[i]).val());
		}
		$.ajax({
            url: base_url + '/index.php?page=transaksi&aksi=checkoutKeranjang',
            type: 'post',
            data: { idTransaksi: arrayIdTransaksi, idBaju: arrayIdBaju, jumlahPembelian: arrayJumlahBaju},
			success: function(data) {
				window.location.href = base_url + '/index.php?page=transaksi&aksi=view&idUser=' + idUser;
            }
        });
	})

	$('#inputGambar').change(function(){
        const file = this.files[0];
        if (file){
			let reader = new FileReader();
			reader.onload = function(event){
			console.log(event.target.result);
			$('#imagePreview').attr('src', event.target.result);
			}
			reader.readAsDataURL(file);
        }
    });

	$('#jasaPengiriman').on('change', function() {
		var jarak = parseInt($('#txtJarak').val());
		if($('#txtJarak').val() != '' && $(this)[0].selectedIndex != 0) {
			var totalHargaCheckout = parseInt($('#totalHargaCheckout').text());
			var biayaKurir = $( "#jasaPengiriman option:selected" ).text().split(" | ");
			var intBiayaKurir = parseInt(biayaKurir[1]);
			$('#totalPengiriman').html(jarak * intBiayaKurir);
			var totalPegiriman = parseInt($('#totalPengiriman').text());
			$('#totalHarga').html(totalHargaCheckout + totalPegiriman);
		} else {
			$('#totalPengiriman').html(0);
			$('#totalHarga').html(0);
		}
	});

	$('#txtJarak').on('input', function() {
		var jarak = parseInt($(this).val());
		if($(this).val() != '' && $('#jasaPengiriman')[0].selectedIndex != 0) {
			var totalHargaCheckout = parseInt($('#totalHargaCheckout').text());
			var biayaKurir = $( "#jasaPengiriman option:selected" ).text().split(" | ");
			var intBiayaKurir = parseInt(biayaKurir[1]);
			$('#totalPengiriman').html(jarak * intBiayaKurir);
			var totalPegiriman = parseInt($('#totalPengiriman').text());
			$('#totalHarga').html(totalHargaCheckout + totalPegiriman);
		} else {
			$('#totalPengiriman').html(0);
			$('#totalHarga').html(0);
		}
	})
})

