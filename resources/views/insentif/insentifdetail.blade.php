@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
      <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" href="/insentif"> 
        <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;padding-top:3vh;">Insentif Usahawan</h3>
            
              @foreach ($insentifs as $insentif)
              <div class="card-body bg-light">
                
                  <div class="position-relative rounded-1 border bg-white dark__bg-1100 p-3">
                  <div class="position-absolute end-0 top-0 mt-2 me-3 z-index-1">
                    <form method="POST" action="{{ route('insentif.destroy', $insentif->id) }}">
                      @csrf  
                      @method('delete')
                    <button class="btn btn-link btn-sm p-0">
                      <span class="fas fa-times-circle text-danger" data-fa-transform="shrink-1"></span>
                    </button>
                    </form>
                  </div>
                  <form class="row g-3" method="POST" action="/insentif/{{$insentif->id}}" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                    <input name="id_pengguna" style="display: none;" type="text" value="{{$id_pengguna}}"/>
                    <div class="row gx-2">
                      <div class="col-sm-6 mb-3">
                        <label class="form-label" for="field-type">Jenis Insentif</label> 
                        <select class="form-select form-select-sm" name="id_jenis_insentif" placeholder="Jenis Insentif">
                          <option value="">Jenis Insentif</option>
                          @foreach ($ddInsentif as $items)
                              <option value="{{ $items->id_jenis_insentif }}" {{ ( $items->id_jenis_insentif == $insentif->id_jenis_insentif) ? 'selected' : '' }}> 
                                  {{ $items->nama_insentif }} 
                              </option>
                          @endforeach
                        </select>

                        {{-- <select class="form-select form-select-sm" name="id_jenis_insentif" id="field-type" value="{{$insentif->id_jenis_insentif}}">
                          <option value="1">Select a type</option>
                          <option value="2">Text</option>
                          <option value="3">Checkboxes</option>
                          <option value="4">Radio Buttons</option>
                          <option value="5">Textarea</option>
                          <option value="6">Date</option>
                          <option value="7">Dropdowns</option>
                          <option value="8">File</option>
                        </select> --}}
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label class="form-label" for="field-name">Nilai Insentif</label>
                        <input class="form-control form-control-sm" name="nilai_insentif" id="field-name" type="text" value="{{$insentif->nilai_insentif}}"/>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label class="form-label" for="field-name">Tahun Terima Insentif</label>
                        <input class="form-control form-control-sm" name="tahun_terima_insentif" id="field-name" type="text" value="{{$insentif->tahun_terima_insentif}}"/>
                      </div>
                    </div>
                    <button class="btn btn-falcon-default btn-sm mt-2" style="width:fit-content;" type="submit"><span class="fas fa-plus fs--2 me-1" data-fa-transform="up-1"></span>Ubah Insentif</button>
                  </form>
                  </div>
                

              </div>
              <div style="padding-top: 1vh"></div>
              @endforeach
            <div class="card-body bg-light" style="padding-top: 1vh;">
              <form class="row g-3" method="POST" action="/insentif" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <input name="id_pengguna" style="display: none;" type="text" value="{{$id_pengguna}}"/>
                <div class="position-relative rounded-1 border bg-white dark__bg-1100 p-3">
                  <div class="row gx-2">
                    <div class="col-sm-6 mb-3">
                      <label class="form-label" for="field-type">Jenis Insentif</label>
                      <select class="form-select form-select-sm" name="id_jenis_insentif" placeholder="Jenis Insentif">
                        <option value="">Jenis Insentif</option>
                        @foreach ($ddInsentif as $items)
                            <option value="{{ $items->id_jenis_insentif }}"> 
                                {{ $items->nama_insentif }} 
                            </option>
                        @endforeach
                      </select>
                      {{-- <select class="form-select form-select-sm" name="id_jenis_insentif" id="field-type">
                        <option value="1">Select a type</option>
                        <option value="2">Text</option>
                        <option value="3">Checkboxes</option>
                        <option value="4">Radio Buttons</option>
                        <option value="5">Textarea</option>
                        <option value="6">Date</option>
                        <option value="7">Dropdowns</option>
                        <option value="8">File</option>
                      </select> --}}
                    </div>
                    <div class="col-sm-6 mb-3">
                      <label class="form-label" for="field-name">Nilai Insentif (RM)</label>
                      <input class="form-control form-control-sm" name="nilai_insentif" id="field-name" type="text"/>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <label class="form-label" for="field-name">Tahun Terima Insentif</label>
                      <input class="form-control form-control-sm" name="tahun_terima_insentif" id="field-name" type="text"/>
                    </div>
                    {{-- <div class="col-12">
                      <label class="form-label" for="field-options">Field Options</label>
                      <textarea class="form-control form-control-sm" id="field-options" rows="3"></textarea>
                      <div class="form-text fs--1 text-warning">* Separate your options with comma</div>
                    </div> --}}
                  </div>
                  <button class="btn btn-falcon-default btn-sm mt-2" type="submit"><span class="fas fa-plus fs--2 me-1" data-fa-transform="up-1"></span>Tambah Insentif</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection