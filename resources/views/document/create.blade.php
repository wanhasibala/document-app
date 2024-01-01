<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Document</h1>

        <form method="POST" action="{{ route('documents.store') }}">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 border rounded-md w-full" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-600">Content (JSON)</label>
                <textarea name="content" id="content" class="mt-1 p-2 border rounded-md w-full">{{ old('content') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-600">Category</label>
                <select name="category_id" id="category_id" class="mt-1 p-2 border rounded-md w-full">
                    @foreach ($categories as $category) 
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="is_published" class="block text-sm font-medium text-gray-600">Is Published</label>
                <input type="checkbox" name="is_published" id="is_published" class="mt-1" {{ old('is_published') ? 'checked' : '' }}>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Document</button>
        </form>
    </div>    
</x-app-layout>


