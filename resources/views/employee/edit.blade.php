@extends('master')
@section('title')
    Edit employee information
@endsection
@section('content')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Edit employee information</h4>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">
                    <p class="text-center text-info">{{ Session::get('success') }}</p>
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" value="{{ $employee->name }}" name="name" class="form-control">
                                    <div class="mt-2">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Employee Rank</label>
                                    <select name="rank" id="" class="form-control">
                                        <option disabled selected>Select Employee Rank</option>
                                        <option value="1" {{ $employee->rank == 1 ? 'selected' : '' }}>First</option>
                                        <option value="2" {{ $employee->rank == 2 ? 'selected' : '' }}>Second</option>
                                        <option value="3" {{ $employee->rank == 3 ? 'selected' : '' }}>Third</option>
                                        <option value="4" {{ $employee->rank == 4 ? 'selected' : '' }}>Fourth</option>
                                        <option value="5" {{ $employee->rank == 5 ? 'selected' : '' }}>Fifth</option>
                                        <option value="6" {{ $employee->rank == 6 ? 'selected' : '' }}>Sixth</option>
                                    </select>
                                    <div class="mt-2">
                                        @error('rank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Mobile Number</label>
                                    <input type="text" value="{{ $employee->mobile }}" name="mobile" class="form-control">
                                    <div class="mt-2">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="2" class="form-control">{{ $employee->address }}</textarea>
                                <div class="mt-2">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="float-end btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection