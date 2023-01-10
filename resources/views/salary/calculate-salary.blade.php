@extends('master')

@section('content')
    <div class="row py-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Salary</h4>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>

        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Calculate Salary</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('calculate.salary.result') }}" method="POST">
                        @csrf
                        <div>
                            <label for="form-label">Low Basic salary</label>
                            <input type="number" name="low_basic_salary" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="form-label">Employees Ranks</label>
                            <select name="ranks" id="" class="form-control">
                                <option selected disabled>--Select Empolyee Ranks--</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd </option>
                                <option value="4">4th </option>
                                <option value="5">5th </option>
                                <option value="6">6th </option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="form-label">Total Salary</label>
                            <input type="number" value="{{ Session::get('result') }}" disabled class="form-control">
                            {{-- <p>Total Salary: {{ Session::get('result') }}</p> --}}
                        </div>
                        <div class="mt-3">   
                            <input type="submit" value="Calculate" class="btn btn-success form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
@endsection