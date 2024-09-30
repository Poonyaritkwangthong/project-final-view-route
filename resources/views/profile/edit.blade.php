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
    <div class="w-1/2 mx-auto">
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="space-y-12 mt-8">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-4xl">เพิ่มข้อมูลผู้ใช้</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600 text-2xl">ผู้ใช้สามารถเพิ่มรูปชื่อจริงนามสกุลเบอร์โทรได้</p>
            <a href="{{ route('profile.index') }}"><button type="button" class="mt-2 rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</button></a>

              <div class="col-span-full">
                <label for="text" class="block text-sm font-medium leading-6 text-gray-900 font-bold mt-2 text-xl">ชื่อจริง</label>
                <div class="mt-2">
                    <input name="f_name" value="{{ $profile->f_name }}" type="text" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2" placeholder="กรอกชื่อจริง.">
                    @error('f_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </input>
                </div>
              </div>

              <div class="col-span-full">
                <label for="text" class="block text-sm font-medium leading-6 text-gray-900 font-bold mt-2 text-xl">นามสกุล</label>
                <div class="mt-2">
                    <input name="l_name" value="{{ $profile->l_name }}" type="text" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2" placeholder="กรอกนามสกุล.">
                    @error('l_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </input>
                </div>
              </div>

              <div class="col-span-full mt-4">
                <label for="cover-photo"  class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">เพิ่มรูปภาพ</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                  <div class="text-center">
                    <input name="c_img" class="block border rounded py-1.5 px-2" type="file" accept="image/*" onchange="loadFile(event)"><br>
                    <img class="" id="output" src="{{ asset('/images/profiles/'.$profile->c_img) }}"/>
                        <script>
                           var loadFile = function(event) {
                           var output = document.getElementById('output');
                           output.src = URL.createObjectURL(event.target.files[0]);
                           output.onload = function() {
                              URL.revokeObjectURL(output.src)
                           }
                           };
                        </script>
                        @error('c_img')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900 font-bold font-bold text-xl mt-4">เบอร์โทรศัพท์</label>
            <div class="mt-2">
              <input id="about" type="text" name="phone_n" value="{{ $profile->phone_n }}" placeholder="กรอกเบอร์โทรศัพท์." class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2"></input>
              @error('phone_n')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
    </div>
</body>
</html>
s
