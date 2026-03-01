@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
    </div>
    <div class="course-heading-title">
        <div class="row exam-title-color-class">
            <div class="container">
                <div class="col-sm-12 " style="text-align: center" ;>
                    <a href="" class="exam-title-class">
                        <i class="fab fa-vuejs"></i>
                        Students are studying</a>
                </div>
                <div class="info-table-course">
                    <table class="table table-st">
                        <thead class="color__theme">
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Number of class</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->classes->count() }}</td>
                                <td>
                                    <a type="submit" class="btn btn-primary"
                                        href="{{ route('admin.student.show',$user->id) }}">Detail</a>
                                    <a type="submit" class="btn btn-danger"
                                        href="{{ route('admin.student.destroy',$user->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="course-heading-title">
        <div class="row exam-title-color-class">
            <div class="container">
                <div class="col-sm-12 " style="text-align: center" ;>
                    <a href="" class="exam-title-class">
                        <i class="fab fa-vuejs"></i>
                        Students are registered</a>
                </div>
                <div class="info-table-course">
                    <table class="table table-st">
                        <thead class="color__theme">
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userRegisters as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a type="submit" class="btn btn-primary"
                                        href="{{ route('admin.student.allow',$user->id) }}">Confirm</a>
                                    <a type="submit" class="btn btn-danger"
                                        href="{{ route('admin.student.refuse',$user->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection