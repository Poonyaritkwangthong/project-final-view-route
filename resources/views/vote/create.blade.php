<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="w-1/4 mx-auto border-2">
        <form action="{{ route('vote.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12 mt-8">
                <div class="border-b border-gray-900/10 pb-12 p-4">
                    <h2 class="text-base font-semibold leading-7 text-gray-900 text-4xl">หน้าเพิ่มตัวเลือก</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600 text-2xl mt-2">
                        เพิ่มตัวเลือกสำหรับใช้โหวด</p>
                    <a href="{{ route('vote.index') }}"><button type="button"
                            class="mt-2 rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</button></a>


                    <div class="col-span-full">
                        <label for="about"
                            class="block text-sm font-medium leading-6 text-gray-900 font-bold mt-2 text-xl">เพิ่มตัวเลือก</label>
                        <div class="mt-2">
                            <input id="vote" type="text" name="vote" placeholder="โปรดเพิ่มตัวเลือก."
                                class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-2"></input>
                            @error('vote')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
