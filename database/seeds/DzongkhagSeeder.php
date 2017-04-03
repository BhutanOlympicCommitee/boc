<?php 
class DzongkhagSeeder extends Seeder{
	public function run(){
		DB::table('MstDzongkhag')->delete();
		$Dzongkhag=array(
			array(
				'dzongkhag_name' => 'Thimphu',
				'dzongkhag_code' => 'T1',
				)
			);
		DB::table('MstDzongkhag')->insert(Dzongkhag);
	}
}