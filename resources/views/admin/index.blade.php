@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 px-4">
            <div class="card card-new">
                <div class="card-header vino d-flex justify-content-between">
                    {{-- Title --}}
                    <div class="d-flex align-items-center">
                        {{ __('Manage Students') }}
                    </div>
                    
                    {{-- Button --}}
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
                <div class="card-body">
                    <manage-student-component />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
