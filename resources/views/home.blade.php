@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 px-4">
            <div class="card card-new">
                <div class="card-header vino d-flex justify-content-between">
                    {{-- Title --}}
                    <div class="d-flex align-items-center">
                        {{ __('Dashboard') }}
                    </div>
                    
                    {{-- Button --}}
                    <div>
                        <a href="{{ route('student') }}" class="btn btn-info text-white bold">ASSOCIATE (STUDENT - LESSON)</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Lists --}}
                    <div class="row justify-content-center">
                        <div class="col-md-6 py-2">
                            <div class="card card-new">
                                <div class="card-header vino">{{ __('Estudents') }}</div>
                                <list-student-component
                                    :students="{{ $students }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="card card-new">
                                <div class="card-header vino">{{ __('Lessons') }}</div>
                                <list-lesson-component 
                                    :lessons="{{ $lessons }}"
                                />
                            </div>
                        </div>

                        {{-- Modal --}}
                        <modal-component ref="modal" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
