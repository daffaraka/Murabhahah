<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // manager cabang utama = otorisasi penginputan pembiayaan/pembayaran masuk 
        // manager pembiayaan = otorisasi penginputan pembiayaan/pembayaran masuk 
        // manager operasional = otorisasi data nasabah baru
        // accout officer = penginputan pembayaran angsuran masuk
        // teller = penginputan pembiayaan baru, data nasabah baru,pembayaran angsuran masuk 
        // admin = penginputan pembiayaan baru
        $permissions = [
            'index pembiayaan',
            'input pembiayaan',
            'edit pembiayaan',
            'hapus pembiayaan',
            'index pembayaran',
            'input pembayaran',
            'edit pembayaran',
            'hapus pembayaran',
            'index nasabah',
            'edit nasabah',
            'tambah nasabah',
            'hapus nasabah',
            'index user',
            'edit user',
            'tambah user',
            'hapus user',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
