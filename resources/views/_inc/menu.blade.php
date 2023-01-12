<nav class="navbar navbar-expand bg-light shadow">
    <div class="container">
        <a href="" class="navbar-brand">logo</a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('company-account.index') }}" class="nav-link">Company Account</a></li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Salary</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('calculate.salary') }}" class="dropdown-item">Selary Scale</a></li>
                    <li><a href="{{ route('pay.salary') }}" class="dropdown-item">Pay Selary</a></li>
                    <li><a href="" class="dropdown-item">Selary Sheet</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Bank</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('bank-accounts.create') }}" class="dropdown-item">Create Account</a></li>
                    <li><a href="{{ route('bank-accounts.index') }}" class="dropdown-item">Manage Account</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Employees</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('employees.create') }}" class="dropdown-item">Add Employee</a></li>
                    <li><a href="{{ route('employees.index') }}" class="dropdown-item">Manage Employee</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>