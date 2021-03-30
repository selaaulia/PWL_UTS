<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'kode_barang'=>['PRD001', 'PRD002', 'PRD003', 'PRD004', 'PRD005',
                            'PRD006', 'PRD007', 'PRD008', 'PRD009', 'PRD010',
                            'PRD011', 'PRD012', 'PRD013', 'PRD014', 'PRD015',
                            'PRD016', 'PRD017', 'PRD018', 'PRD019', 'PRD020'],
            'nama_barang'=>['Indomie', 'Pocari Sweat', 'Silverqueen', 'Potabee', 'Aqua',
                            'Mie Sedaap', 'Sari Roti', 'Lemonilo', 'Sarimi', 'Paroti',
                            'Teh Pucuk', 'UC1000', 'Cimori', 'Conetto', 'Magnum',
                            'Citato', 'Cheetos', 'Pringles', 'Lays', 'Soyjoy'],
            'kategori_barang'=>['Makanan','Minuman', 'Snack', 'Snack', 'Minuman',
                                'Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan',
                                'Minuman', 'Minuman', 'Minuman', 'Es Krim', 'Es Krim', 
                                'Snack', 'Snack', 'Snack', 'Snack', 'Snack',],
            'harga'=>['2500', '6000', '25000', '7500', '2500',
                    '2500', '4500', '4500', '3000', '4000',
                    '3500', '7000', '10000', '15000', '15000',
                    '7000', '9000', '12000', '1100', '7500'],
            'qty'=>['25', '10', '11', '5', '10', '7', '8', '9', '10', '12', '13', '15', '17', '19', '20', '23', '25', '35', '18', '20'],
        ]);

    }
}
