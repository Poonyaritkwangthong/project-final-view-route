@extends('layouts.admin')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-[24px] font-bold my-4">
                    <h2>Suggestion Page</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('suggestion.create') }}"> Create item</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Topic Name</th>
                    <th>Detail</th>
                    <th>User</th>
                    <th>Start Vote Date</th>
                    <th>End Vote Date</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->topic_name }}</td>
                        <td>{{ $item->s_detail }}</td>
                        <td>
                            @if ($item->user->customer)
                                @foreach ($item->user->customer as $customer)
                                <div class="flex items-center gap-2 p-2">
                                    <img class="w-20 h-30" src="{{ asset('/images/profiles/'. $customer->c_img) }}" alt="">
                                    <p>ชื่อ: {{ $customer->f_name }}</p>
                                    <p>นามสกุล: {{ $customer->l_name }}</p>
                                </div>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>
                            <form action="{{ route('suggestion.destroy', $item->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('suggestion.edit', $item->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
