@extends('layout.master')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Incomes Information</h3>
        </div>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Income Category Id</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incomes as $income)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$income->income_categories_id}}</td>
                        <td>{{$income->description}}</td>
                        <td>{{$income->amount}}</td>
                        <td>{{$income->date}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection
