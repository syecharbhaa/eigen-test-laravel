@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <th>
            Code
        </th>
        <th>
            Name
        </th>
        <th>
            Borrowed Book(s) (Qty)
        </th>
    </thead>
    <tbody>
    @foreach($data as $member)
        <tr>
            <td>
                {{$member->code}}
            </td>
            <td>
                {{$member->name}}
            </td>
            <td>
                {{$member->book_loans->sum('qty')}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection