@extends('layout.master')
@section('css')
<style>
    .zoom:hover {
        transform: scale(3);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="row">

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Data pendaftaran</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @foreach ($pendaftaran as $pendaftaran)
                                        <form method="post" id="form-edit" action="{{ url('/pendaftaran_update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $pendaftaran->id }}">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                                {{-- <div class="form-group">
                                                    <label for="nik" style="color: white">NIK</label>
                                                    <input type="text" name="nik" class="form-control" maxlength="16"
                                                        onkeypress="return hanyaAngka(event)" placeholder="NIK"
                                                        data-rule="minlen:4" required />
                                                </div> --}}

                                                <div class="form-group col-lg-12">
                                                    <select name="merk_id" class="form-control" required>
                                                        @foreach ($merk2 as $merk2)
                                                        <option value="{{ $merk2->id }}">{{ $merk2->merk }}</option>
                                                        @endforeach
                                                        @foreach ($merk as $merk)
                                                        <option value="{{ $merk->id }}">{{ $merk->merk }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <select name="type_id" class="form-control" required>
                                                        @foreach ($type2 as $type2)
                                                        <option value="{{ $type2->id }}">{{ $type2->type }}</option>
                                                        @endforeach
                                                        @foreach ($type as $type)
                                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>




                                                <div class="form-group col-lg-12">
                                                    <select name="jenis_id" class="form-control" required>
                                                        @foreach ($jenis2 as $jenis2)
                                                        <option value="{{ $jenis2->id }}">{{ $jenis2->jenis }}</option>
                                                        @endforeach
                                                        @foreach ($jenis as $jenis)
                                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="warna"
                                                        placeholder="Warna" value="{{ $pendaftaran->warna }}"
                                                        data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="tahun"
                                                        placeholder="Tahun Pembuatan " data-rule="minlen:4"
                                                        onkeypress="return hanyaAngka(event)"
                                                        value="{{ $pendaftaran->tahun }}" maxlength="4" required />
                                                </div>





                                                {{-- <div class="form-group col-lg-12">
                                                    <input placeholder="Tanggal Pengajuan" type="text"
                                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                                        class="form-control textbox-n" name="tanggal"
                                                        placeholder="Subject" required />
                                                </div> --}}



                                                <div class="btn-group col-lg-12 justify-content-center">
                                                    <div class="text-center">
                                                        <button class="btn btn-lg btn-success mr-3"
                                                            type="submit">Simpan</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                        @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>


</section>



@endsection
@section('js')


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp2").change(function(){
        readURL2(this);
    });


function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endsection
