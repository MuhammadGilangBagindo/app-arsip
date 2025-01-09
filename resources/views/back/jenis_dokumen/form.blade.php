@extends('layouts.apps')

@section('title', 'Form Jenis Dokumen')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Jenis Dokumen</h4>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($jenisDokumen) ? route('back.jenis_dokumen.update', $jenisDokumen->id) : route('back.jenis_dokumen.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($jenisDokumen))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="jenis_dokumen">Jenis Dokumen</label>
                        <input type="text" class="form-control" id="jenis_dokumen" name="jenis_dokumen"
                            value="{{ isset($jenisDokumen) ? $jenisDokumen->jenis_dokumen : old('jenis_dokumen') }}"
                            placeholder="Enter Jenis Dokumen" required />
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('back.jenis_dokumen.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
