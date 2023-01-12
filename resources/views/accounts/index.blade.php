@extends('master')
@section('title')
    Company Account Information
@endsection
@section('content')
    <div class="py-3 text-center">
        <h4>COMPANY ACCOUNT</h4>
    </div>
    <div class="row py-5">
        <div class="col-md-4 ">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h3 class="card-title">Remaining Balance</h3>
                    <h5 class="card-title">{{ isset($mainAccount->balance)  ? $mainAccount->balance . ' TK' : "Enter initial balance"  }} </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h3 class="card-title">Total Paid Salary</h3>
                    <h5 class="card-title">{{ $totalPaidSalary }}<span> TK</span></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Balance</h5>
                    <p class="text-center text-info">{{ Session::get('success') }}</p>
                    <form action="{{ route('company-add.balance') }}" method="POST">
                        @csrf
                        <div>
                            <label for="" class="form-label">Enter Amount</label>
                            <input type="number" name="balance" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection