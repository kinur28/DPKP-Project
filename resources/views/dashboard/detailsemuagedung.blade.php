@extends('layouts.de-master')
@section('title', 'Detail Gedung')
@section('content')
	<div class="container">
		  <div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
			  	<div class="me-5 p-2">
				  	
				  	<a class="text-decoration-none" href="{{ url('/Dashboard/lihat-semua-gedung') }}">
				  		<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
				  	</a>
				  	
			  	</div>
			  
			  
			 	<h1 class="h3 mb-0 text-dark ms-5 me-5">Detail Gedung</h1>
			  
			
		  </div>
		 <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	<div class="col-md-7 mx-auto col-lg-8 mb-3">
		  		<div class="row g-3 mt-3">
		  		<img src="{{$data_gedung->getFotoProfile()}}" class="mx-auto" style="width: 350px; height: 250px; object-fit: cover;">
			 	
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Wilayah</label>  
					<input type="text" class="form-control" id="wilayah" name="wilayah" value="{{$data_gedung->wilayah}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama Gedung</label>  
					<input type="text" class="form-control" id="namagedung" name="nama_gedung" value="{{$data_gedung->nama_gedung}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Alamat</label>  
					<input type="text" class="form-control" id="alamat" name="alamat" value="{{$data_gedung->alamat}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Klasifikasi</label>  
					<input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="{{$data_gedung->klasifikasi}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama FSM</label>  
					<input type="text" class="form-control" id="namafsm" name="nama_fsm" value="{{$data_gedung->nama_fsm}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Tahun Pelatihan</label>  
					<input type="text" class="form-control" id="tahunpelatihansimulasiterakhir" name="tahun_pelatihan" value="{{$data_gedung->tahun_pelatihan}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Struktur MKKG</label>
					<div class="input-group">
						<input type="text" class="form-control col-8" id="struktruMKKG" name="struktur_mkkg" value="{{$data_gedung->struktur_mkkg}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_gedung->id}}/strukturmkkg" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_gedung->struktur_mkkg}}/strukturmkkg" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>  
						
					
			  </div>
			  @if($data_gedung->keterangan == 'sudah')
			  <div class="col-12 ">
					<label class="form-label" for="inlineFormInputGroupUsername">Keterangan</label>  
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$data_gedung->keterangan}}" style="background-color: white;" readonly>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Surat Keterangan Pelatihan</label>
					<div class="input-group">
						<input type="text" class="form-control" id="suratketeranganpelatihan" name="surat_keterangan_pelatihan" value="{{$data_gedung->surat_keterangan_pelatihan}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_gedung->id}}/suratketeranganpelatihan" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_gedung->surat_keterangan_pelatihan}}/suratketeranganpelatihan" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
			  </div>
			  @else
			  <div class="col-12 ">
					<label class="form-label" for="inlineFormInputGroupUsername">Keterangan</label>  
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$data_gedung->keterangan}}" style="background-color: white;" readonly>
			  </div>
			  @endif
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Foto Dokumentasi                                                    </label>
					<div class="input-group">
						<input type="text" class="form-control" id="fotodokumentasi" name="foto_dokumentasi" value="{{$data_gedung->foto_dokumentasi}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_gedung->id}}/fotodokumentasi" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_gedung->foto_dokumentasi}}/fotodokumentasi" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  </div>
			  
			</div>
		</div>
	</div>
	<div class="d-flex align-items-center p-3 my-3 text-dark bg-success rounded shadow-sm">
		<h1 class="h3 mb-0 text-dark ms-5 me-5">Pelaksanaan Mkkg Gedung</h1>

	</div>
	<div class="my-3 p-3 bg-body rounded shadow-sm">
		<div class="col-md-7 mx-auto col-lg-8 mb-3">
			@if(session('suksesmkkg'))
			<div class="mx-5 alert alert-success" role="alert">
				{{session('suksesmkkg')}}
			</div>
			@endif
			
		  	<div class="row mt-2 g-3">
		  		<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Tahapan Program Kerja</label>
					<div class="input-group">
						<input type="text" class="form-control" id="tahapanprogramkerja" name="tahapan_program_kerja" placeholder="Belum ada file yang dimasukkan" value="{{$data_pelaksanaan->tahapan_program_kerja}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/tahapanprogramkerja" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->tahapan_program_kerja}}/tahapanprogramkerja" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
		  		<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Struktur Organisasi</label>
					<div class="input-group">
						<input type="text" class="form-control" id="strukturorganisasi" placeholder="Belum ada file yang dimasukkan" name="struktur_organisasi" value="{{$data_pelaksanaan->struktur_organisasi}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/strukturorganisasi" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->struktur_organisasi}}/strukturorganisasi" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
			
			
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Tugas dan Fungsi</label>
					<div class="input-group">
						<input type="text" class="form-control" id="tugasdanfungsi" placeholder="Belum ada file yang dimasukkan" name="tugas_dan_fungsi" value="{{$data_pelaksanaan->tugas_dan_fungsi}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/tugasdanfungsi" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->tugas_dan_fungsi}}/tugasdanfungsi" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>

				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Koordinasi</label>
					<div class="input-group">
						<input type="text" class="form-control" id="koordinasi" name="koordinasi" placeholder="Belum ada file yang dimasukkan" value="{{$data_pelaksanaan->koordinasi}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/koordinasi" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->koordinasi}}/koordinasi" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
			
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Sarana Prasarana</label>
					<div class="input-group">
						<input type="text" class="form-control" id="saranaprasarana" name="sarana_prasarana" placeholder="Belum ada file yang dimasukkan" value="{{$data_pelaksanaan->sarana_prasarana}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/saranaprasarana" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->sarana_prasarana}}/saranaprasarana" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
			
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Standar Operasional prosedur dan RTDK</label>
					<div class="input-group">
						<input type="text" class="form-control" id="standaroperasionalprosedurdanRTDK" name="standar_operasional_prosedur_dan_RTDK" placeholder="Belum ada file yang dimasukkan" value="{{$data_pelaksanaan->standar_operasional_prosedur_dan_RTDK}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/standaroperasionaldanRTDK" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->standar_operasional_prosedur_dan_RTDK}}/standaroperasionaldanRTDK" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
			
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Pelatihan dan Simulasi Evakuasi Kebakaran</label>
					<div class="input-group">
						<input type="text" class="form-control" id="pelatihandansimulasievaluasikebakaran" name="Pelatihan_dan_simulasi_evakuasi_kebakaran" placeholder="Belum ada file yang dimasukkan" value="{{$data_pelaksanaan->Pelatihan_dan_simulasi_evakuasi_kebakaran}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/pelatihandansimulasievaluasikebakaran" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->Pelatihan_dan_simulasi_evakuasi_kebakaran}}/pelatihandansimulasievaluasikebakaran" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
			
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Pengesahan</label>
					<div class="input-group">
						<input type="text" class="form-control" id="pengesahan" name="pengesahan" placeholder="Belum ada file yang dimasukkan"  value="{{$data_pelaksanaan->pengesahan}}" style="background-color: white;" readonly>
						<a href="/Dashboard/data-laporan-gedung/view/{{$data_pelaksanaan->id}}/pengesahan" class="btn  btn-outline-primary" type="button"><i class="fas fa-eye"></i> View</a>
						<a href="/Dashboard/data-laporan-gedung/download/{{$data_pelaksanaan->pengesahan}}/pengesahan" class="btn btn-outline-primary" type="button"><i class="fas fa-file-download"></i> Download</a>	
					</div>    
					
			  	</div>
		  	</div>
		</div>
		
	</div>
</div>
@stop