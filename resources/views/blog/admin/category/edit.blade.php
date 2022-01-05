<x-app-layout>
    <div class="mt-5 md:mt-0 md:col-span-2 container mx-auto">
        @if (session('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                 role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Our privacy policy has changed</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div role="alert mt-5 mb-5" class="mt-5 mb-5">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Danger
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ $errors->first() }}</p>
                </div>
            </div>
        @endif
        @if($item->exists)
            <form action="{{ route('blog.admin.categories.update', $item->id) }}" method="POST">
                @method('PATCH')
                @else
                    <form action="{{ route('blog.admin.categories.store', $item->id) }}" method="POST">
                        @endif
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="flex-col">
                                    <div class="w-1/3">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Название</label>
                                        <input type="text" name="title" id="title" autocomplete="title"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                               value="{{ $item->title }}">
                                    </div>
                                    <div class="w-1/3 mt-5">
                                        <label for="slug" class="block text-sm font-medium text-gray-700">
                                            URI</label>
                                        <input type="text" name="slug" id="slug" autocomplete="slug"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                               value="{{ $item->slug }}">
                                    </div>
                                    <div class="w-1/3 mt-5">
                                        <label for="parent_id" class="block text-sm font-medium text-gray-700">Родительская
                                            категория</label>
                                        <select id="parent_id" name="parent_id" autocomplete="parent_id"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach ($allCategories as $categoryOption)
                                                <option value="{{ $categoryOption->id }}"
                                                        @if ($categoryOption->id == $item->parent_id) selected @endif>
                                                    {{ $categoryOption->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/3 mt-5">
                                        <label for="description"
                                               class="block text-sm font-medium text-gray-700">Описание</label>
                                        <textarea name="description" id="description" autocomplete="description"
                                                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $item->description) }}
                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
</x-app-layout>
