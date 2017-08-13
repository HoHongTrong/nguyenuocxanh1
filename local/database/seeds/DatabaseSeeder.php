<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(DangKySeeder::class);
  }
}

class DangKySeeder extends Seeder
{
  public function run(){
    DB::table('dangky')->insert([
      array(
        'ten' => 'Nguyen Van A',
        'sodt' => '5000',
        'email' => '1',
        'congviec' => '1',
        'gioitinh' => 'nam',
        'id_ban' => '1'
      ),
      array(
        'ten' => 'Nguyen Van B',
        'sodt' => '5000',
        'email' => '1',
        'congviec' => '1',
        'gioitinh' => 'nam',
        'id_ban' => '2'
      ),

    ]);
  }
}
class BanSeeder extends Seeder
{
  public function run(){
    DB::table('ban')->insert([
      array(
        'ten' => 'Nguyen ',
        'ghichu' => 'mot hai 3'

      ),
      array(
        'ten' => 'Van ',
        'ghichu' => 'mot hai text'
      ),

    ]);
  }
}