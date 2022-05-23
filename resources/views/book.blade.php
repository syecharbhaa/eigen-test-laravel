@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <th>
            Code
        </th>
        <th>
            Title
        </th>
        <th>
            Author
        </th>
        <th>
            Stock
        </th>
    </thead>
    <tbody>
    @foreach($data as $book)
        <tr>
            <td>
                {{$book->code}}
            </td>
            <td>
                {{$book->title}}
            </td>
            <td>
                {{$book->author}}
            </td>
            <td>
                {{$book->stock}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection