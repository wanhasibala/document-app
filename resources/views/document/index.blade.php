<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Document List</h1>

        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $document->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $document->type }}</td>
                    <td class="py-2 px-4 border-b">{{ $document->status }}</td>
                    <td class="py-2 px-4 border-b">{{ $document->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('documents.show', $document) }}"
                            class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('documents.edit', $document) }}"
                            class="text-yellow-500 hover:underline">Edit</a>
                        <form class="inline" action="{{ route('documents.destroy', $document) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>