@extends('master')
@section('title')
    Calculate salary 
@endsection

@section('content')
    <div class="row py-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Salary Scale</h4>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Rank</th>
                                <th>Basic</th>
                                <th>House Rent</th>
                                <th>Medical allowance</th>
                                <th>Total Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salaryScales as $salaryScale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($salaryScale->rank ==1)
                                        First
                                    @elseif ($salaryScale->rank ==2)
                                        Second
                                    @elseif ($salaryScale->rank ==3)
                                        Third
                                    @elseif ($salaryScale->rank ==4)
                                        Fourth
                                    @elseif ($salaryScale->rank ==5)
                                        Fifth
                                    @elseif ($salaryScale->rank ==6)
                                        Sixth
                                    @endif
                                </td>
                                <td>{{ $salaryScale->basic }}</td>
                                <td>{{ $salaryScale->house_rent }}</td>
                                <td>{{ $salaryScale->medical_allowance }}</td>
                                <td>{{ $salaryScale->total }}</td>
                            </tr>
                            @empty
                            <p class="text-info text-center">Please inter initial basic salary.</p>
                            @endforelse
                        </tbody>
                   </table>
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
                            <label for="form-label">Initial basic salary</label>
                            <input type="number" name="low_basic_salary" class="form-control">
                            <div>
                                @error('low_basic_salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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