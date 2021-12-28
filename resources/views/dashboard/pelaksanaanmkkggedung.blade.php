@extends('layouts.de-master')
@section('title', 'Pelaksanaan Mkkg')
@section('content')
<div class="container">
	<div class="d-flex align-items-center p-3 my-3 text-dark bg-success rounded shadow-sm">
	
		<div class="me-2 p-2">
			<a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$data_gedung->id}}/detail">
					<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
				</a>
		</div>
		<h1 class="h3 mb-0 text-dark ms-5 me-5">Pelaksanaan Mkkg Gedung</h1>
		
	
	</div>
<div class="my-3 mb-3 p-3 bg-body rounded shadow-sm">
	<div class="col-md-7 mx-auto col-lg-8 mb-3">
		<form class="row g-3" action="/Dashboard/pelaksanaanmkkg/{{$data_pelaksanaan->id}}/update" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Tahapan Program Kerja</label>  
				<input type="file" class="form-control" id="tahapanprogramkerja" name="tahapan_program_kerja" value="Input File Tahapan Program Kerja" >
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->tahapan_program_kerja}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Struktur Organisasi</label>  
				<input type="file" class="form-control" id="strukturorganisasi" name="struktur_organisasi" value="Input File Struktur Organisasi">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->struktur_organisasi}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Tugas dan Fungsi</label>  
				<input type="file" class="form-control" id="tugasdanfungsi" name="tugas_dan_fungsi" value="Input File Tugas dan Fungsi">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->tugas_dan_fungsi}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Koordinasi</label>  
				<input type="file" class="form-control" id="koordinasi" name="koordinasi" value="Input File Koordinasi">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->koordinasi}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Sarana Prasarana</label>  
				<input type="file" class="form-control" id="saranaprasarana" name="sarana_prasarana" value="Input File Sarana Prasarana">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->sarana_prasarana}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Standar Operasional Prosedur dan RTDK</label>  
				<input type="file" class="form-control" id="standaroperasionalprosedurdanRTDK" name="standar_operasional_prosedur_dan_RTDK" value="Input File Standar Operasional prosedur dan RTDK">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->standar_operasional_prosedur_dan_RTDK}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Pelatihan dan Simulasi Evakuasi Kebakaran</label>  
				<input type="file" class="form-control" id="pelatihandansimulasievaluasikebakaran" name="Pelatihan_dan_simulasi_evakuasi_kebakaran" value="Input File Pelatihan dan Simulasi Evakuasi Kebakaran">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->Pelatihan_dan_simulasi_evakuasi_kebakaran}} </p>
			</div>
			<div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">Pengesahan</label>  
				<input type="file" class="form-control" id="pengesahan" name="pengesahan" value="Input File pengesahan">
				<p>File yang sudah dimasukkan : {{$data_pelaksanaan->pengesahan}} </p>
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>

@stop
