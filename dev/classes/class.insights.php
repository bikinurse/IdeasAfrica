<?php

/*
Insight CLASS

Provides Statistical data and summary of table emlements;


Author: Ekiru Timothy
Date:	24.8.2012

*/


class Insight{

	//Provides the number of followers of a company by counting the size of the array returned by DBase->table_row_ids
	public static function company_followers($id){
		$followers = DBase::table_row_ids("company_followers where company_id = '$id'");
		return count($followers);
	}
	
	public static function company_cities($company_id){
		$city_names = array();
		$cities =  DBase::table_column("town_id","company_cities where  company_id = '$company_id'");
		
		if(!empty($cities)){
			foreach($cities as $city_id){
				$city = DBase::table_row($city_id,'cities');
				$city_names[] = $city['name'];
			}
			return $city_names;
			//			return $cities;
			}else{
			return FALSE;
		}
	}
	
	public static function company_markets($company_id){
		$market_names = array();
		$markets =  DBase::table_column("market_id","company_markets where  company_id = '$company_id'");
		
		if(!empty($markets)){
			foreach($markets as $market_id){
				$market = DBase::table_row($market_id,'markets');
				$market_names[] = $market['name'];
			}
			return $market_names;
//						return $markets;
			}else{
			return FALSE;
		}
	}
}
?>