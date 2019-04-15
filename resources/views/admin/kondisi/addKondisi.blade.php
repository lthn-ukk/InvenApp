@extends('layouts.master')

@section('header','Tambah Kondisi')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <form action="">
                <div class="form-group">
                    <label for="">Inventaris</label>
                    <select name="id_inventaris" id="" class="form-control">
                        <option value="">Pilih Inventaris</option>
                        @foreach($inven as $dataInven)
                            <option value="{{$dataInven->id_inventaris}}">{{$dataInven->nama}}</option>
                            <input type="hidden" id="jmlh" value="{{$dataInven->jumlah}}">
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Bagus (max:<span id="jml_bagus"></span>)</label>
                    <input type="number" class="form-control" min="0" max="5">
                </div>

                <div class="form-group">
                    <label for="">Rusak</label>
                    <input type="number" min="0" max="5" class="form-control">
                </div>
            </form>
        </div>
    </div>
        

@endsection