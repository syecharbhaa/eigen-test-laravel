@extends('layouts.app')

@section('content')
<form method="post" action="/book-loan">
@csrf
    <table class="table">
        <tr>
            <td>
                Book
            </td>
            <td>
                <select class="form-control" name="book_code">
                @foreach($books as $book)
                    <option value="{{$book->code}}">{{$book->title}}</option>
                @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Member
            </td>
            <td>
                <select class="form-control" name="member_code">
                @foreach($members as $member)
                    <option value="{{$member->code}}">{{$member->name}}</option>
                @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Qty
            </td>
            <td>
                <input class="form-control" type="text" name="qty" required>
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