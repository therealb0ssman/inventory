@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Items List</h3>
             
                
                   <i type="button" class="far fa-plus-square fa-lg" style="margin-left: 8px;" data-toggle="modal" data-target="#modal-lg"></i>

                <div class="card-tools">
                          <form class="input-group" action="{{route('search)}}"  method="get">
                          <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search" >

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                        </form> 
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>                   
                      <th>Items</th>
                      <th>Description</th>
                      <th>Brand</th>
                      <th>Quantity</th>
                      <th>Date Acquired</th>
                      <th>Condition</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($invents as $invent)
                    <tr>
                      
                      <td>{{ $invent->Items}} </td>
                      <td>{{ $invent->Description}} </td>

                      <td>{{ $invent->Brand }}</td>
                      <td>{{ $invent->Quantity }}</td>
                      <td>{{ $invent->Date_Acquired }}</td>
                      <td>{{ $invent->Condition }}</td>
                      <td>
                        <a href="{{ route('admin.inventory.edit', $invent->id) }}">
                        <button type="button" class="btn btn-success">Edit</button>
                        </a>
                      
                      
                      </td>


                            
                    </tr>
                    @endforeach
                  </tbody>
                      
                </table>
          
                          
                      
                        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('admin.inventory.store') }}">
             
                        @csrf

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ old('Name') }}" required autocomplete="Name" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __(' Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" required autocomplete="Description" autofocus>

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-6">
                                <input id="Brand" type="text" class="form-control @error('Brand') is-invalid @enderror" name="Brand" value="{{ old('Brand') }}" required autocomplete="Brand">

                                @error('Brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="Quantity" type="number"   class="form-control @error('Quantity') is-invalid @enderror" name="Quantity" required autocomplete="new-Quantity">

                                @error('Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_acquired" class="col-md-4 col-form-label text-md-right">{{ __('Date Acquired') }}</label>

                            <div class="col-md-6">
                                <input id="date_acquired" type="date" class="form-control" name="date_acquired" required autocomplete="date_acquired">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Condition" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                            <div class="col-md-6">
                                <input id="Condition" type="text" class="form-control" name="Condition" required autocomplete="Condition">
                                @error('Condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>
@endsection
