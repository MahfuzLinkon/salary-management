@extends('master')
@section('title')
    Manage Bank Account
@endsection
@section('content')
    <div class="row py-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Manage Bank Account</h4>
                    <a href="{{ route('bank-accounts.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Account Name</th>
                                <th>Account Type</th>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Branch Name</th>
                                <th>Current Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $account->employee->name }}</td>
                                <td>{{ $account->account_type == 1 ? 'Savings' : 'Current' }}</td>
                                <td>{{ $account->account_number }}</td>
                                <td>{{ $account->bank_name }}</td>
                                <td>{{ $account->branch_name }}</td>
                                <td>{{ $account->current_balance }}</td>
                                <td>{{ $account->status == 1 ? 'Activated' : 'Deactivated' }}</td>
                                <td>
                                    <a href="{{ route('bank-accounts.change-status', ['id' => $account->id]) }}"  class="btn btn-{{ $account->status == 1 ? 'warning' : 'success' }}"><i class="fa-solid fa-arrow-{{ $account->status == 1 ? 'down' : 'up' }}"></i></a>
                                    <a href="{{ route('bank-accounts.edit', $account->id) }}"  class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <form action="{{ route('bank-accounts.destroy',$account->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are You sure ?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection