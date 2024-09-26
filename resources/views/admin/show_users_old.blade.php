
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>

    <h1>All Users</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="GET" action="{{ route('admin.show_users') }}">
        <label for="role">Select Role:</label>
        <select name="role" id="role" onchange="this.form.submit()">
            <option value="all" {{ $selectedRole == 'all' ? 'selected' : '' }}>All Roles</option>
            @foreach ($roles as $roleId => $roleName)
                <option value="{{ $roleId }}" {{ $selectedRole == $roleId ? 'selected' : '' }}>{{ $roleName }}</option>
            @endforeach
        </select>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
