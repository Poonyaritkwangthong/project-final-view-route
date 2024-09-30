<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="w-1/3 mx-auto">
      <form action="{{ route('customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-12 mt-8">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-4xl">หน้าผู้ดูเเลการเเจ้งปัญหา</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600 text-2xl mt-2s">ผู้ดูเเลสามารถเเก้ไขได้เท่านั้น</p>
            <a href="{{ route('customer.index') }}"><button type="button" class="mt-2 rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</button></a>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">ชื่อผู้ใช้</label>
                  <div class="mt-2">
                    <input type="text" name="name" value="{{ $customer->name }}" id="name"  placeholder="ใส่ชื่อผู้ใช้" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                     @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">อีเมล</label>
                    <div class="mt-2">
                      <input id="email" name="email" type="email" value="{{ $customer->email }}" placeholder="ใส่อีเมล" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                       @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                <div class="sm:col-span-4">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">รหัสผ่าน</label>
                    <div class="mt-2">
                      <input id="email" name="password" value="{{ $customer->password }}" type="text"  placeholder="ใส่รหัสผ่าน" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                       @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="col-span-full">
                    <label for="user_type" class="block text-sm font-medium leading-6 text-gray-900 font-bold font-bold text-xl mt-4">สถานะผู้ใช้</label>
                    <div class="mt-2">
                      <input id="user_type"  type="text" name="user_type" value="{{ $customer->user_type }}" placeholder="โปรดระบุสถานะผู้ใช้." class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2"></input>
                      @error('user_type')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

        <div class="mx-auto mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
    </div>
</body>
</html>

