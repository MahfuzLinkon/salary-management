@extends('master')
@section('title')
    Salary Sheet
@endsection

@section('content')
    <div class="row py-5">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Salary Sheet</h4>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Salary Amount</th>
                                <th>Paid Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salaries as $salary)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $salary->employee->name }}</td>
                                <td>
                                    @if ($salary->rank ==1)
                                        First
                                    @elseif ($salary->rank ==2)
                                        Second
                                    @elseif ($salary->rank ==3)
                                        Third
                                    @elseif ($salary->rank ==4)
                                        Fourth
                                    @elseif ($salary->rank ==5)
                                        Fifth
                                    @elseif ($salary->rank ==6)
                                        Sixth
                                    @endif
                                </td>
                                <td>{{ $salary->amount }}</td>
                                <td>{{ $salary->created_at }}</td>
                            </tr>
                            @empty
                            <p class="text-info text-center">No salary is paid yet. </p>
                            @endforelse
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection