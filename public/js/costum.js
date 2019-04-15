setTimeout(function(){
     $(".pesan").slideUp(); 
    }, 2000)

// $.ajaxSetup({
//           headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });

function rand_kode(){
        let r = Math.random().toString(36).substring(8).toUpperCase();
		$('#kode').val(r);
		$('.kode').val(r);
       }
       rand_kode();
       setInterval(rand_kode, 10000);
    
// console.log($("#ruang-table > tr").last().prevObject.length -1);

// $("#modalExample").on('hidden.bs.modal',function (event) {
// 	$("#iniKode").attr("id","kode");
// 	$("#id_jenis").remove();
// })

// $("#tambah").on('click',function (event) {
// 	$("#button").html('Tambah');
// 	$("#button").val('tambah');
// 	// $("#buttonRuang").html('Tambah');
// 	// $("#buttonRuang").val('tambahRuang');
// 	$('#jenis-form').attr('method','POST');
// })


// $(".ubah").on('click',function (event) {
// 	var id = $(this).data("id");
// 	console.log(id);
// 	var value = $(this).val();
// 	$("#button").val("ubah");

// 	if (value == 'ubahJenis') {
// 		$.get('jenis/'+id+'/edit',function (data) {
// 			var obj = data[0];
// 			$("#modalExample").modal('show');
// 			$("#kode").attr('id','iniKode');
// 			$("#iniKode").val(obj.kode_jenis);
// 			$("#nama_jenis").val(obj.nama_jenis);
// 			$("#ket").val(obj.keterangan);
// 			$("#button").html("Ubah");
// 			$("#button").val("update");
// 			$('#jenis-form').prepend('<input type="hidden" value="'+obj.id_jenis+'" name="id_jenis" id="id_jenis">');
// 			$('#jenis-form').attr('method','PUT');
// 		})
// 	} else {
// 		console.log(value);
// 	}
// })

// $("#jenis-form").submit(function(event) {
// 	let form_data = $(this).serialize();

// 	var action = $("#button").val();
// 	var actionRuang = $("#buttonRuang").val();
// 	var route;
// 	var id = $("#id_jenis").val();
// 	if(action == 'tambah'){
// 	 	route = getUrl('tambahJenis')
// 	} else if(action == 'update'){
// 		console.log(form_data);
// 		$.ajax({
// 			type:'PUT',
// 			url:'jenis/'+id,
// 			data:form_data,
// 			dataType:'json',
// 			success:function(data){
// 				console.log($('#jenis_id_'+id).children());
// 			},
// 			error:function(data){

// 			}
// 		})
// 	}

// 	if (actionRuang == 'tambahRuang') {
// 		route = getUrl('tambahRuang');
// 	}

// 	$.ajax({
//           type: 'POST',
//           url: route,
//           data: form_data,
//           dataType: 'json',
//           success: function(data) {
//              successAjax(data);
             
//           },																												
//           error: function(data) {
//               // var errors = $.parseJSON(data.responseText);
//               // $('#add-task-errors').html('');
//               // $.each(errors.messages, function(key, value) {
//               //     $('#add-task-errors').append('<li>' + value + '</li>');
//               // });
//               // $("#add-error-bag").show();
//               console.log(data);
//           }
//       });

// 	 event.preventDefault();
// })

// $('.hapus').on('click',function (event) {
// 	var id = $(this).data('id');
// 	var url;
// 	var value = $(this).val();
// 	confirm("Are You sure want to delete !");
// 	console.log(value);
// 	if(value == 'ruangHapus'){
// 		url = 'ruang/';
// 	} else {
// 		url = 'jenis/';
// 	}

// 	$.ajax({
// 		type:'DELETE',
// 		url:url+id,
// 		success:function(data){
// 			s_delete(data);		
// 		},
// 		error:function(err){
// 			console.log(err);
// 		}
// 	})
// })

// function s_delete(param){
// 	console.log(param);
// 	if(param.p_ruang == true){
// 		$("#ruang_id_"+param.id).remove();
// 	} else if(param.p_jenis == true){
// 		$("#jenis_id_"+param.id).remove();
// 	}
// }
    
// function getUrl(param){
// 	let url;
// 	if (param == 'tambaJenis') {
// 		url = 'jenis/store'
// 	} else if(param == 'tambahRuang'){
// 		url = 'ruang/store'
// 	}

// 	return url;
// }

// function successAjax(param){
// 	//console.log(param);
// 	if (param.s_jenis == true) {
// 		 var all_tr = $("#jenis-table > tr").last().prevObject.length -1;
// 	     var tr_now = all_tr + 1;
// 	     var elm = '<tr><td>'+tr_now+'</td><td>'+param.jenis.nama_jenis+'</td><td>'+param.jenis.kode_jenis+'</td><td>'+param.jenis.keterangan+'</td>'+$("#action");
// 	     elm += '<td> <button value="ubahJenis" class="btn btn-success ubah" data-id="'+param.jenis.id_jenis+'">Ubah</button>';
// 	     elm += '<button data-id="'+param.jenis.id_jenis+'" class="btn btn-danger hapus" value="hapusJenis">Hapus</button></td></tr>';
// 	     $("#jenis-table").append(elm);
// 	     $('.formInput').find('input[type=text]').val("");	
// 	     $("#modalExample").modal('hide');
// 	} else if(param.s_ruang == true){
// 		 window.location = "localhost:8000/ruang";
// 	}
	 
// }


function checkKondisi(){
	let bagus = $("#bagus").val();
	let jmlInven = $("#jmlBarang").val();
	let rusak = $("#rusak").val();
	let all = bagus+rusak;
	console.log(bagus);
	if(bagus > jmlInven || rusak > jmlInven || all > jmlInven){
		$("#bagus").val("");
		$("#rusak").val("");
		alert('Tolong Masukan Sesuai Jumlah Inventaris');
	} else {
		$('#form-createInven').submit();
	}
}