@extends('master')
@section('title')
    Manage Employees
@endsection
@section('content')
    <div class="row py-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Manage Employees</h4>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>
                                    @if ($employee->rank ==1)
                                        First
                                    @elseif ($employee->rank ==2)
                                        Second
                                    @elseif ($employee->rank ==3)
                                        Third
                                    @elseif ($employee->rank ==4)
                                    Fourth
                                    @elseif ($employee->rank ==5)
                                    Fifth
                                    @elseif ($employee->rank ==6)
                                    Sixth
                                    @endif
                                </td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->status == 1 ? 'Activated' : 'Deactivated' }}</td>
                                <td>
                                    <a href="{{ route('employees.change-status', ['id' => $employee->id]) }}"  class="btn btn-{{ $employee->status == 1 ? 'warning' : 'success' }}"><i class="fa-solid fa-arrow-{{ $employee->status == 1 ? 'down' : 'up' }}"></i></a>
                                    <a href="{{ route('employees.edit', $employee->id) }}"  class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are You sure ?')">
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