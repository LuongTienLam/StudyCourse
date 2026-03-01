@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Registrations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        
        <div style="margin-bottom:20px;">
            <a href="/admin/registrations" class="btn btn-secondary">All</a>
            <a href="/admin/registrations?status=paid" class="btn btn-success">Paid</a>
            <a href="/admin/registrations?status=pending" class="btn btn-danger">Pending</a>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Course ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($registrations as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->course_id }}</td>
                <td>{{ number_format($item->amount) }} VND</td>

                <td>
                    @if($item->payment_status == 'paid')
                        <span class="text-success">Paid</span>
                    @else
                        <span class="text-danger">Pending</span>
                    @endif
                </td>

                <td>
                    @if($item->payment_status != 'paid')
                    <form method="POST" action="/admin/registrations/confirm/{{ $item->id }}">
                        @csrf
                        <button class="btn btn-success btn-sm">
                            Confirm
                        </button>
                    </form>
                    @else
                        <span class="text-success">Done</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection