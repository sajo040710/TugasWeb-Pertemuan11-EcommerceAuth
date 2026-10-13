<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold">Kelola Pengguna</h2>
  </x-slot>

  <div class="py-8">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
      <x-flash />

      <div class="tj-card overflow-x-auto">
        <table class="tj-table min-w-full divide-y text-sm">
          <thead class="text-left">
            <tr>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Role</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach ($users as $user)
              <tr>
                <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                <td class="tj-muted px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3">
                  @if ($user->is(auth()->user()))
                    <span class="tj-muted">{{ $user->role }} (akun Anda)</span>
                  @else
                    <form method="POST" action="{{ route('admin.users.role', $user) }}" class="flex items-center gap-2">
                      @csrf
                      @method('PATCH')
                      <select name="role" class="tj-field py-1 text-sm">
                        @foreach (App\Models\User::ROLES as $role)
                          <option value="{{ $role }}" @selected($user->role === $role)>{{ $role }}</option>
                        @endforeach
                      </select>
                      <button class="tj-btn tj-btn-quiet !px-3 !py-1">Simpan</button>
                    </form>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="mt-6">{{ $users->links() }}</div>
    </div>
  </div>
</x-app-layout>
