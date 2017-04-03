<?php 
 abstract class dzongSeeder extends Seeder
 {
 	public function run()
 	{
 		if(!isset($this->table)){
 			throw new Exception("No table Specified");
 		}
 		if(!isset($this->data)){
 			throw new Exception("No data Specified");
 	}
 	   DB:table($this->table)->truncate();
 	   DB:table($this->table)->insert($this->data);
 }
}