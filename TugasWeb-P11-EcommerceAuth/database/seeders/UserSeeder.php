<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/** Semua akun demo memakai password: "password" */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create(['name' => 'Admin Toko Joses', 'email' => 'admin@tokojoses.test']);
        User::factory()->editor()->create(['name' => 'Editor Satu', 'email' => 'editor@tokojoses.test']);
        User::factory()->editor()->create(['name' => 'Editor Dua', 'email' => 'editor2@tokojoses.test']);
        User::factory()->create(['name' => 'Pengguna Demo', 'email' => 'user@tokojoses.test']);

        User::factory(7)->create();
    }
}
