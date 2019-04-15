@extends('layouts.master')

@section('header','Tambah Data Peminjamannnnn')

@section('content')

	<div class="col-12 col-md-6 col-lg-6">
	<form action="{{route('storePinjam')}}" method="POST" id="peminjaman-form">
                <div id="form-input-section">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Peminjam</label>
                        <select id="nama" name="id_petugas" class="form-control">
                            @foreach($petugas as $Datapetugas)
                                <option value="{{$Datapetugas->id_petugas}}">{{$Datapetugas->nama_petugas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="barang[0]">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="barang0">Nama Barang</label><input class="add-button" type="button" value="+" onclick="addInput();">
                                <select id="barang0" name="barang[]" class="form-control" onchange="changeMax(0)">
                                    @foreach($inven as $barang)
                                        <option value="{{$barang->id_inventaris}}|{{$barang->bagus}}">{{$barang->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah0">Jumlah <span style="font-size: 75%; color: #777">(Max : <span id="max0">{{$first_total}}</span>)</span></label>
                                <input type="number" class="form-control" name="jumlah[]" id="jumlah0" min="1" max="{{$first_total}}">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="checkBarang()" class="btn btn-success col-md-12 mt10 mb10">Tambah Data</button>
            </form>
	</div>
<script>
var counter = 1;
        var max = <?php echo $inventaris_total ?>;
        var barang = [];

        function addInput() {
            if(counter == max) {
                alert('Saat ini hanya tersedia ' + max + ' barang yang dapat dipinjam');
            } else {
                var newdiv = document.createElement('div');
                newdiv.id = "barang["+counter+"]";
                newdiv.className = "form-group";
                newdiv.innerHTML = '<div class="row"><div class="col-md-8"><label for="barang'+counter+'">Nama Barang:</label><input class="add-button" type="button" value="-" onclick="removeInput('+counter+');"><select id="barang'+counter+'" name="barang[]" class="form-control" onchange="changeMax('+counter+')">@foreach($inven as $barang)<option value="{{$barang->id_inventaris}}|{{$barang->jumlah}}">{{$barang->nama}}</option>@endforeach</select></div><div class="col-md-4"><label for="jumlah'+counter+'">Jumlah <span style="font-size: 75%; color: #777">(max : <span id="max'+counter+'">{{$first_total}}</span>)</span></label><input type="number" class="form-control" name="jumlah[]" id="jumlah'+counter+'" min="1" max="{{$first_total}}"></div></div>';
                document.getElementById('form-input-section').appendChild(newdiv);
                counter++;
            }
        }

        function changeMax(id) {
            var data = document.getElementById('barang'+id).value;
            var split = data.split('|');
            var id_barang = split[0];
            var max = split[1];
            var max1 = document.getElementById('max'+id);
            max1.innerHTML = max;
            document.getElementById('jumlah'+id).max = max;
        }

        function checkBarang() {
            var duplicate = false;
            var id = [];
            for(var i = 0; i < counter; i++) {
                var selectBox = document.getElementById('barang'+i);
                var data = selectBox.value;
                var split = data.split('|');
                id.push(split[0]);
            }
            var duplicate = checkArray(id);
            if(duplicate) {
                alert("Warning! Terdapat data barang yang sama dipilih lebih dari satu kali");
            } else {
                document.getElementById('peminjaman-form').submit();
            }
        }

        function checkArray(id) {
            for(var j = 0; j < id.length; j++) {
                for(var k = 0; k < id.length; k++) {
                    if(k!=j) {
                        if(id[k]==id[j]) {
                            return true;
                        }
                    }
                }
            }
            return false;
        }

        function removeInput(id) {
            counter--;
            var elem = document.getElementById("barang["+id+"]");
            return elem.parentNode.removeChild(elem);
        }
</script>
@endsection