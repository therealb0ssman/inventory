@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Item') }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('admin.inventory.update', $inventory ) }}">
                         @method('PATCH')  
                        
                        
                         @csrf  
                        <input type="hidden" name="inventory" value="{{$inventory['inventory']}}">
                         
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ ('Item Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" 
                                value="{{ $inventory->Items }} " required autocomplete="Name" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ (' Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" 
                                value="{{ $inventory->Description }}" required autocomplete="Description" autofocus>

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Brand" class="col-md-4 col-form-label text-md-right">{{ ('Brand') }}</label>

                            <div class="col-md-6">
                                <input id="Brand" type="text" class="form-control @error('Brand') is-invalid @enderror" name="Brand"
                                 value="{{ $inventory->Brand }}" required autocomplete="Brand">

                                @error('Brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Quantity" class="col-md-4 col-form-label text-md-right">{{ ('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="Quantity" type="number" class="form-control @error('Quantity') is-invalid @enderror" name="Quantity" 
                                value="{{ $inventory->Quantity }}"required autocomplete="new-Quantity">

                                @error('Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_acquired" class="col-md-4 col-form-label text-md-right">{{ ('Date Acquired') }}</label>

                            <div class="col-md-6">
                                <input id="date_acquired" type="date" class="form-control" name="date_acquired" 
                                value="{{ $inventory->Date_Acquired }}" required autocomplete="date_acquired">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Condition" class="col-md-4 col-form-label text-md-right">{{ ('Condition') }}</label>

                            <div class="col-md-6">
                                <input id="Condition" type="text" class="form-control" name="Condition" 
                                value="{{ $inventory->Condition }}" required autocomplete="Condition">
                                @error('Condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
            </div>
            <div class="modal-footer justify-content-between">
            
                <button type="button" class="btn btn-default" >Cancel</button>
                {{ method_field ('PUT')}} 
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
