
@extends('admin.adminbar')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-500">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b border-gray-300">ID</th>
                    <th class="px-4 py-2 border-b border-gray-300">Name</th>
                    <th class="px-4 py-2 border-b border-gray-300">Email</th>
                    <th class="px-4 py-2 border-b border-gray-300">Role</th>
                    <th class="px-4 py-2 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $user->id }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 {{ $user->role === 'admin' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">{{ $user->role }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">
                            <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
