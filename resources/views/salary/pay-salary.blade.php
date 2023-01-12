@extends('master')
@section('title')
    Pay salary 
@endsection

@section('content')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Pay Salary</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('transfer.salary') }}" method="POST" onsubmit="return confirm('Are sure want to pay salary ?')">
                        @csrf
                        <div class="row">
                            <label for="" class="col-md-3">Employee Rank</label>
                            <div class="col-md-9">
                                <select name="rank" id="rank" class="form-control">
                                    <option disabled selected>Select Employee Rank</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="3">Third</option>
                                    <option value="4">Fourth</option>
                                    <option value="5">Fifth</option>
                                    <option value="6">Sixth</option>
                                </select>
                                <div class="mt-2">
                                    @error('rank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Salary Amount</label>
                            <div class="col-md-9">
                              <input type="number" name="amount" id="amount" class="form-control">
                              <div class="mt-2">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Employee Name</label>
                            <div class="col-md-9">
                                <select name="employee_id" id="employeeId" class="form-control">
                                </select>
                                <div class="mt-2">
                                    @error('employee_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Account Number</label>
                            <div class="col-md-9">
                              <input type="text" name="account_number" id="accountNumber" class="form-control">
                              <div class="mt-2">
                                @error('account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                              <input type="submit" class="btn btn-success" value="Pay Salary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Get empoyee name
    $(document).on('change', '#rank', function(){
        let rank = $(this).val();
        salaryAmount(rank)
        $.ajax({
            url: "/get-employee/rank-wish",
            type: "POST",
            dataType: "JSON",
            data: {rank: rank},
            success: function(response){
                // console.log(response);
                let option = '';
                option += '<option selected disabled>-Select Employee-</option>';
                $.each(response, function (key, value){
                    option += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                $('#employeeId').empty().append(option);
                
            }
        });
    });

    // Get Account Number 
    $(document).on('change', '#employeeId', function(){
        let employeeId = $(this).val();
        // alert(employeeId);
        $.ajax({
            url: "/get-employee/account",
            type: "POST",
            dataType: "JSON",
            data: {employee_id: employeeId},
            success: function(response){
                console.log(response);
                $('#accountNumber').val(response.account_number);
            }
        });
    });

    // Rank wise salary
    function salaryAmount(rank){
        $.ajax({
            url: "/get-salary/rank-wish",
            type: "POST",
            dataType: "JSON",
            data: {rank: rank},
            success: function(response){
                console.log(response);
                $('#amount').val(response.total);
            }
        });
    }


</script>
@endsection