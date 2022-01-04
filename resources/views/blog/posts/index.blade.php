<x-app-layout>
    <table class="border-4 border-indigo-600">
        <thead>
            <tr class="border-2">
                <th class="border-2">Title</th>
                <th class="border-2">excerpt</th>
                <th class="border-2">is_published</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class='border-2'>
                    <td class="border-2">{{ $item->title }}</td>
                    <td class="border-2">{{ $item->excerpt }}</td>
                    <td class="border-2">{{ $item->content_raw }}</td>
                </tr>
            @endforeach
        </tbody>
        <caption>Products purchased last month</caption>
    </table>
</x-app-layout>
