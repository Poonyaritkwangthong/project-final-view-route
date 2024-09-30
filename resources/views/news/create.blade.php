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
      <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12 mt-8">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-4xl">หน้าผู้ดูเเลการเเจ้งปัญหา</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600 text-2xl">ผู้ดูเเลสามารถเเก้ไขได้เท่านั้น</p>
            <a href="{{ route('news.index') }}"><button type="button" class="mt-2 rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</button></a>

              <div class="col-span-full">
                <label for="text" class="block text-sm font-medium leading-6 text-gray-900 font-bold mt-2 text-xl">หัวข้อข่าวประจำหมู่บ้าน</label>
                <div class="mt-2">
                    <input name="name_news" type="text" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2" placeholder="โปรดเเจ้งหัวข้อข่าวประจำหมู่บ้าน.">
                    @error('name_news')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </input>
                </div>
              </div>

              <div class="col-span-full mt-4">
                <label for="cover-photo"  class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">เพิ่มรูปภาพข่าว</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                  <div class="text-center">
                    <input name="n_img" class="block border rounded py-1.5 px-2" type="file" accept="image/*" onchange="loadFile(event)"><br>
                    <img class="" id="output"/>
                        <script>
                           var loadFile = function(event) {
                           var output = document.getElementById('output');
                           output.src = URL.createObjectURL(event.target.files[0]);
                           output.onload = function() {
                              URL.revokeObjectURL(output.src)
                           }
                           };
                        </script>
                        @error('n_img')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900 font-bold font-bold text-xl mt-4">ระบุตำเเหน่งข่าว</label>
            <div class="mt-2">
              <input id="about" type="text" name="n_location" placeholder="โปรดระบุตำเเหน่งข่าว." class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2"></input>
              @error('n_location')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900 font-bold text-xl">เเจ้งลายระเอียดของข่าว</label>
            <div class="mt-2">
              <textarea id="about" type="text" name="n_detail" placeholder="โปรดเเจ้งลายระเอียดของข่าว." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2"></textarea>
              @error('p_detail')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900 font-bold font-bold text-xl mt-4">ระบุวันที่</label>
            <div class="mt-2">
              <input id="about"  type="date" name="n_date" placeholder="โปรดระบุวันที่ข่าว." class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2"></input>
              @error('n_date')
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
