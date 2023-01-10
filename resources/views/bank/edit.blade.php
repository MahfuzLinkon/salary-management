@extends('master')
@section('title')
    Edit Bank Account
@endsection
@section('content')
    <div class="row py-5">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Edit Account</h4>
                    <a href="{{ route('bank-accounts.index') }}" class="btn btn-primary float-end">Manage</a>
                </div>
                <div class="card-body">
                    <p class="text-center text-info">{{ Session::get('success') }}</p>
                    <form action="{{ route('bank-accounts.update',$account->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Account Name</label>
                                    <input type="text" value="{{ $account->account_name }}" name="account_name" class="form-control">
                                    <div class="mt-2">
                                        @error('account_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Account Type</label>
                                    <select name="account_type" id="" class="form-control">
                                        <option disabled selected>Select account type</option>
                                        <option value="1" {{ $account->account_type ==1 ? 'selected' : '' }}>Saving</option>
                                        <option value="2" {{ $account->account_type ==2 ? 'selected' : '' }}>Current</option>
                                    </select>
                                    <div class="mt-2">
                                        @error('account_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Account Number</label>
                                    <input type="text" value="{{ $account->account_number }}" name="account_number" class="form-control">
                                    <div class="mt-2">
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Bank Name</label>
                                    <input type="text" value="{{ $account->bank_name }}" name="bank_name" class="form-control">
                                    <div class="mt-2">
                                        @error('bank_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="form-label">Branch Name</label>
                                    <input type="text" value="{{ $account->branch_name }}" name="branch_name" class="form-control">
                                    <div class="mt-2">
                                        @error('branch_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Update" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection