<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-gray-200 min-h-screen flex ">
        <div class="bg-white p-8 rounded shadow-md w-full m-8  ">
            <div class="flex flex-row items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold ">Admin Dashboard</h1>
                <button class="text-sm py-2 px-4 bg-black text-white rounded-2xl"
                    href="{{route('admin.create')}}">Create new user</button>
            </div>

            <!-- Admin-specific content goes here -->

            <table class="table mt-3 w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="p-1 border">{{ $user->name }}</td>
                        <td class="p-1 border">{{ $user->email }}</td>
                        <td class="p-1 border">
                            <a href="{{ route('admin.edit', $user) }}"
                                class="btn btn-sm btn-primary p-1 bg-gray-600 m-1 text-white rounded-md">Edit</a>
                            <form action="{{ route('admin.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>