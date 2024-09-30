@extends('layouts.user')

@section('title')
    Votepage
@endsection

@section('title_content')
    <div
        class="w-full h-screen bg-blue-200 bg-cover bg-center text-white">
        <div class="w-full h-full flex flex-col backdrop-blur-sm">
            <div class="mt-10">
                <h1 class="text-center text-black text-[30px] font-bold">หน้าลงคะเเนนโหวด</h1>
            </div>
        @endsection

        @section('content')
            <div class="border-2 w-[32rem] p-2 text-between mx-auto shadow-xl mt-10 bg-white">
                <div class="mt-2 text-[16px] text-black">
                    <div>
                        ชื่อหัวข้อ :
                        {{ $suggestion->topic_name }}
                    </div>
                    <div>
                        รายละเอียด :
                        {{ $suggestion->s_detail }}
                    </div>
                </div>
                <div class="flex justify-center mt-8">
    <form action="{{ route('votepage.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_v_id" value="{{ auth()->user()->id }}" id="">
        <input hidden type="text" name="suggestion_id" value="{{ $suggestion->id }}">
        @error('suggestion_id')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror

        @php
            $userHasVoted = $uservote->where('user_v_id', auth()->user()->id)
                                      ->where('suggestion_id', $suggestion->id)
                                      ->isNotEmpty();
        @endphp

        @if ($userHasVoted)
            <button name="disable"
                class="btn bg-green-500 ml-6 p-2 rounded hover:bg-white hover:text-green-500 border-2 border-green-500">
                <a href="{{ route('votepage.index') }}">คุณโหวตไปแล้ว</a>
            </button>
        @else
            <button name="vote_id" value="1"
                class="btn bg-green-500 ml-6 p-2 rounded hover:bg-white hover:text-green-500 border-2 border-green-500"
                type="submit">เห็นด้วย</button>
            <button name="vote_id" value="2"
                class="btn bg-red-500 ml-6 p-2 rounded hover:bg-white hover:text-red-500 border-2 border-red-500"
                type="submit">ไม่เห็นด้วย</button>
            @error('vote_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        @endif
    </form>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
