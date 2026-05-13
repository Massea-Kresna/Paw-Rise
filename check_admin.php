<?php

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$u = App\Models\User::where('email', 'admin@pawrise.id')->first();

if ($u) {
    echo "Found: {$u->name} role={$u->role}\n";
    // Ensure role is admin
    if ($u->role !== 'admin') {
        $u->role = 'admin';
        $u->save();
        echo "Updated role to admin\n";
    }
} else {
    App\Models\User::create([
        'name' => 'Admin PawRise',
        'email' => 'admin@pawrise.id',
        'password' => bcrypt('password'),
        'role' => 'admin',
        'phone' => '081111111111',
    ]);
    echo "Created admin user: admin@pawrise.id / password\n";
}
