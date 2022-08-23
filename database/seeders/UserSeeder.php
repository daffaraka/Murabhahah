<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m_cabang_utama = User::create([
            'name' => 'Manager Cabang Utama',
            'email' => 'm_cabang_utama@gmail.com',
            'password' => bcrypt('utama1234')
        ]);
        $m_cabang_utama->assignRole('Manager Cabang Utama');
        $m_cabang_utama->givePermissionTo(
            [
                'index pembiayaan',
                'input pembiayaan',
                'edit pembiayaan',
                'hapus pembiayaan',
                'index pembayaran',
                'input pembayaran',
                'edit pembayaran',
                'hapus pembayaran',
            ]
        );

        $m_pembiayaan = User::create([
            'name' => 'Manager Cabang',
            'email' => 'm_pembiayaan@gmail.com',
            'password' => bcrypt('pembiayaan1234')
        ]);
        $m_pembiayaan->assignRole('Manager Pembiayaan');
        $m_pembiayaan->givePermissionTo(
            [
                'index pembiayaan',
                'input pembiayaan',
                'edit pembiayaan',
                'hapus pembiayaan',
                'index pembayaran',
                'input pembayaran',
                'edit pembayaran',
                'hapus pembayaran',
            ]
        );


        $m_operasional = User::create([
            'name' => 'Manager Operasional',
            'email' => 'm_operasional@gmail.com',
            'password' => bcrypt('operasional1234')
        ]);
        $m_operasional->assignRole('Manager Operasional');
        $m_operasional->givePermissionTo(
            [
                'index nasabah',
                'edit nasabah',
                'tambah nasabah',
                'hapus nasabah',
            ]
        );

        $m_account = User::create([
            'name' => 'Account Officer',
            'email' => 'a_officer@gmail.com',
            'password' => bcrypt('officer1234')
        ]);
        $m_account->assignRole('Account Officer');
        $m_account->givePermissionTo(
            [
                'index pembayaran',
                'input pembayaran',
                'edit pembayaran',
                'hapus pembayaran',
            ]
        );


        $teller = User::create([
            'name' => 'Teller',
            'email' => 'teller@gmail.com',
            'password' => bcrypt('teller1234')
        ]);
        $teller->assignRole('Manager Operasional');
        $teller->givePermissionTo(
            [
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
            ]
            );


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234')
        ]);

        $admin->assignRole('Admin');
        $admin->givePermissionTo(
            [
                'index pembiayaan',
                'input pembiayaan',
                'edit pembiayaan',
                'hapus pembiayaan',
            ]
            );
    }
}
