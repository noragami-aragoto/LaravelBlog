<x-app-layout>
    <div class="bg-gray-50 min-h-screen container mx-auto">
        <div class="p-4">
            <div class="bg-white p-4 rounded-md">
                <div>
                    <h2 class="mb-4 text-xl font-bold text-gray-700">Admin & User</h2>
                    <div>
                        <div>
                            <div
                                class="flex justify-between bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md py-2 px-4 text-white font-bold text-md">
                                <div>
                                    <span>Title</span>
                                </div>
                                <div>
                                    <span>Id</span>
                                </div>
                                <div>
                                    <span>ParentId</span>
                                </div>
                            </div>
                            <div>
                                @foreach ($pagination as $item)
                                    <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                        <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4">
                                            <div class="px-2">
                                                <span>{{ $item->title }}</span>
                                            </div>
                                            <div class="px-2 flex">
                                                <span>{{ $item->id }}</span>
                                            </div>
                                            <div class="px-2 flex">
                                                <span>{{ $item->parent_id }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto w-2/4">
                @if ($pagination->total() > $pagination->count())
                    {{ $pagination->links() }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
