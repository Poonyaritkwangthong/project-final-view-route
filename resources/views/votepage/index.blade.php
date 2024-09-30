@extends('layouts.user')

@section('content')
    <div
        class="w-full h-screen bg-[url('https://i.ibb.co/hZpdbkY/248479853-2133515060137518-4885646735485668126-n.jpg')] bg-cover bg-center text-white">
        <div class="w-full h-full flex flex-col backdrop-blur-sm">
            <div>
                <h1 class="mt-10 text-center font-bold text-[30px] text-black">หัวข้อโครงการ</h1>
            </div>

            <div class="w-5/6 mx-auto mt-10">
                @if ($message = Session::get('success'))
                    <div class="mb-6 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                        role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg></div>
                            <div>
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    // ตั้งค่า timezone เป็นเวลาของประเทศไทย
                    date_default_timezone_set('Asia/Bangkok');
                @endphp
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($votepages as $item)
                        @if (now() <= $item->end_date)
                            <div class="border-2 shadow-inner p-6 rounded-lg drop-shadow-xl w-full bg-white text-black">
                                <div class="text-[16px]">
                                    <h2><span class="text-xl font-bold">หัวข้อที่ :</span> {{ $item->id }}</h2>
                                </div>
                                <div class="text-[16px]">
                                    <h2><span class="text-xl font-bold">ชื่อหัวข้อ :</span> {{ $item->topic_name }}</h2>
                                </div>
                                <div class="text-[16px]">
                                    <p><span class="text-xl font-bold">รายละเอียด :</span> {{ $item->s_detail }}</p>
                                </div>
                                <div class="text-[16px]">
                                    @php
                                        // ฟังก์ชันแปลงเดือนเป็นภาษาไทย
                                        function getThaiMonthName($monthNumber)
                                        {
                                            $thaiMonths = [
                                                1 => 'มกราคม',
                                                2 => 'กุมภาพันธ์',
                                                3 => 'มีนาคม',
                                                4 => 'เมษายน',
                                                5 => 'พฤษภาคม',
                                                6 => 'มิถุนายน',
                                                7 => 'กรกฎาคม',
                                                8 => 'สิงหาคม',
                                                9 => 'กันยายน',
                                                10 => 'ตุลาคม',
                                                11 => 'พฤศจิกายน',
                                                12 => 'ธันวาคม',
                                            ];

                                            return $thaiMonths[$monthNumber] ?? '';
                                        }

                                        // แปลงวันที่เป็นภาษาไทย
                                        $start_date = new DateTime($item->start_date);
                                        $end_date = new DateTime($item->end_date);

                                        $start_day = $start_date->format('d');
                                        $start_month = getThaiMonthName((int) $start_date->format('m'));
                                        $start_year = $start_date->format('Y') + 543; // Thai year (Buddhist Era)
                                        $start_time = $start_date->format('H:i:s');
                                        $formattedStartDate = "{$start_day} {$start_month} {$start_year} {$start_time}";

                                        $end_day = $end_date->format('d');
                                        $end_month = getThaiMonthName((int) $end_date->format('m'));
                                        $end_year = $end_date->format('Y') + 543; // Thai year (Buddhist Era)
                                        $end_time = $end_date->format('H:i:s');
                                        $formattedEndDate = "{$end_day} {$end_month} {$end_year} {$end_time}";

                                        // คำนวณเวลาที่เหลือ
                                        $now = new DateTime();
                                        $interval = $now->diff($end_date);

                                        if ($now < $end_date) {
                                            $days = $interval->days;
                                            $hours = $interval->h;
                                            $minutes = $interval->i;
                                            $seconds = $interval->s;
                                            $remainingTime = "{$days} วัน {$hours} ชั่วโมง {$minutes} นาที {$seconds} วินาที";
                                        } else {
                                            $remainingTime = 'หมดเวลา';
                                        }
                                    @endphp

                                    <p><span class=" font-bold">วันเเละเวลาเริ่มต้น :</span> {{ $formattedStartDate }} น.
                                    </p>
                                    <p><span class=" font-bold">วันเเละเวลาที่สิ้นสุด :</span> {{ $formattedEndDate }} น.
                                    </p>
                                    <p><span class=" font-bold">เวลาที่เหลือ :</span> <span
                                            class="text-green-600">{{ $remainingTime }}</span></p>
                                </div>

                                @if (now() >= $item->start_date)
                                    @if (Auth::user())
                                        <a href="{{ route('votepage.id', $item->id) }}" class="flex justify-end">
                                            <div class="mt-4 w-1/2 p-1 rounded hover:bg-green-500 bg-green-500">
                                                <p class="text-center hover:text-white text-black">ลงคะเเนนเสียง</p>
                                            </div>
                                        </a>
                                    @else
                                        <div class="mt-2 w-[230px] p-1 rounded hover:bg-red-500 bg-red-500 cursor-no-drop">
                                            <p class="text-center hover:text-white text-black">
                                                กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
