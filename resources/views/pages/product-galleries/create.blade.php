@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">                        
                        <option selected disabled>Pilih Barang</option>
                        @foreach ($products as $product)                            
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" /> --}}
                    @error('products_id')
                     <div class="text-muted">{{ $message }}</div>   
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input 
                        type="file" 
                        name="photo" 
                        class="form-control @error('photo') is-invalid @enderror"  
                        value="{{ old('photo') }}"
                        {{-- untuk membuat hanya upload foto --}}
                        accept="image/*"
                    />
                    @error('photo')
                     <div class="text-muted">{{ $message }}</div>   
                    @enderror
                </div>                
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Set Default Gambar</label>
                    <br>
                    <label>
                        <input 
                            type="radio" 
                            name="is_default" 
                            class="form-control @error('is_default') is-invalid @enderror" 
                            value="1" 
                        />Yes
                    </label>
                    &nbsp;
                    <label>
                        <input 
                            type="radio" 
                            name="is_default" 
                            class="form-control @error('is_default') is-invalid @enderror" 
                            value="0" 
                        />No
                    </label>
                    @error('is_default')
                     <div class="text-muted">{{ $message }}</div>  
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Foto Barang</button>
                </div>
            </form>
        </div>
    </div>     
@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '.ck-editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush