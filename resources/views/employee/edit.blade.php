<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center">Edit Employee</h1>
                <form action="{{ url('employee/update',$employee->id) }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="">First Name</label>
                        <input type="text" name="firstName" class="form-control" value="{{ $employee->first_name }}">
                        @error('firstName')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">last Name</label>
                        <input type="text" name="lastName" class="form-control" value="{{ $employee->last_name }}">
                        @error('lastName')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Job</label>
                        <input type="text" name="job" class="form-control" value="{{ $employee->job }}">
                        @error('job')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                        @error('phone')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $employee->address }}">
                        @error('address')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="">Age</label>
                        <input type="text" name="age" class="form-control" value="{{ $employee->age }}">
                        @error('age')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
