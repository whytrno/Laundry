@extends('layout.admin')
@section('role',  ucfirst(trans(auth()->user()->level)))
@section('title', 'Dashboard')
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-form">
                        <button type="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary btn-block mt-4 mb-1 me-3">
                            <span>Tambah +</span>
                        </button>

                        <div id="modalAdd" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" id="exampleModalPopoversLabel">
                                    <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Tambah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                    </div>
                                    <form method="post" action="{{ route('add-ongkir') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <h5 class="modal-text text-center">Tambah data ongkir</h5>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Jarak <small>/km</small>:</label>
                                                <input placeholder="Masukan jarak (kurang dari atau sama dengan)" type="number" name="jarak" class="form-control @error('jarak') is-invalid @enderror">
                                                @error('jarak')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Harga:</label>
                                                <div class="input-group"> 
                                                    <input placeholder="Masukan harga" type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"> 
                                                    @error('harga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row mr-3">
                            <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Minimum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Maximum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="max" id="max" placeholder="">
                            </div>
                        </div> --}}

                    </div>
                    <table id="range-search" class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jarak</th>
                                <th>Harga</th>
                                {{-- <th>Nama Laundry</th>
                                <th>Alamat Laundry</th>
                                <th>Status</th> --}}
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><= {{ $d->jarak }} km</td>
                                <td>Rp. {{ number_format($d->harga,2,',','.') }}</td>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#modal{{ $d->ongkir_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <div id="modal{{ $d->ongkir_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Edit</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('mitra-update', $d->ongkir_id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <h5 class="modal-text text-center">Update data mitra</h5>
                                                    <input type="hidden" value="{{ $d->ongkir_id }}" name="user_id">
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Nama lengkap:</label>
                                                        <input type="text" name="full_name" class="form-control" value="{{ $d->full_name }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Email:</label>
                                                        <div class="input-group"> 
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div>
                                                            <input type="email" name="email" class="form-control"  value="{{ $d->email }}"> 
                                                        </div> 
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">No Hp:</label>
                                                        <input type="number" name="phone" class="form-control"  value="{{ $d->phone }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Alamat:</label>
                                                        <input type="text" name="address" class="form-control"  value="{{ $d->address }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Detail alamat:</label>
                                                        <input type="text" name="address_detail" class="form-control"  value="{{ $d->address_detail }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                          </div>
                                         </div>
                                      </div>
                                    
                                      <a href="#" data-toggle="modal" data-target="#modal2{{ $d->ongkir_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                    <div id="modal2{{ $d->ongkir_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Delete</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('mitra-delete', $d->ongkir_id) }}">
                                                @csrf
                                                <div class="modal-body text-center">
                                                    <h5 class="modal-text">Delete data mitra</h5>
                                                    <h7 class="modal-text">Apakah anda yakin akan menghapus mitra <strong>{{ $d->jarak }}</strong>?</h7>
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                          </div>
                                         </div>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jarak</th>
                                <th>Harga</th>
                                {{-- <th>Nama Laundry</th>
                                <th>Alamat Laundry</th>
                                <th>Status</th> --}}
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

        </div>
<!-- <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div> -->
</div>
@endsection