@extends('layouts.default')

@section('content')
     <div class="orders">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="box-title">
                             Daftar Foto Barang |
                             <small>{{ $product->name }}</small>
                         </h4>
                     </div>
                     <div class="card-body">
                         <div class="table-stats order-table ov-h">
                             <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Foto Barang</th>
                                        <th>Default</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>
                                                <img src="{{ url($item->photo) }}" alt="Photo Product">
                                            </td>  
                                            <td>
                                                {{ $item->is_default == 1 ? 'Yes' : 'No' }}
                                            </td>                                                                                      
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data Tidak Tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection