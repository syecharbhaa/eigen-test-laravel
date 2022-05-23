@extends('layouts.app')

@section('content')
<form method="post" action="/return">
@csrf
    <table class="table">
        <tr>
            <td>
                Loan Transaction
            </td>
            <td>
                <select class="form-control" name="book_loan_code">
                @foreach($data as $loan)
                    <option value="{{$loan->code}}">{{$loan->member->name}} - {{$loan->book->title}} - {{$loan->qty}}</option>
                @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn btn-primary" type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
@endsection