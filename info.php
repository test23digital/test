<?php
/*$array=array();
for($i=0;$i<=10;$i++){
	echo $i;
	echo "<br/>";
	$model=$i."-model-time".time();
	$serialno=$i."-serial-time".time();
	$load['ItemCode']=$model;
	$load['U_InternalSerialNum']=$serialno;
	$array[]=$load;
}
echo "<pre>";
	print_r($array);
echo phpinfo();*/
$deliveryType=strtolower('digitalrendr_flexible');
        if(strpos($deliveryType, 'digitalrendr') !== false){
			echo "find value";
		}else{
			echo "not find value";
		}
$Weight=5;
$parcel_weight=1;
$length=50;
echo $parcel_wei = 1 > $parcel_weight ? $Weight : $parcel_weight; 
$parcel_l=1;
echo "<br> length--->".$parcel_lenght = 0 > $parcel_l ? $parcel_l : $length;

echo "<br> length--->".$parcel_lenght = 0 >= $parcel_l ? $length : $parcel_l;
if($parcel_l<=0){
	echo "default length";
}
			$Width=50;	
			$Height=50;
			$length=50;
			$Weight=50;
			
			$parcel_w="5";	
			$parcel_h="1";
			$parcel_l="1";
			$parcel_weight="1";
			
				echo "---<br>parcel_width---".$parcel_width = 0 >= $parcel_w ? $Width : $parcel_w;
				echo "---<br>parcel_lenght---".$parcel_height = 0 >= $parcel_h ? $Height : $parcel_h;
				echo "---<br>parcel_lenght---".$parcel_lenght = 0 >= $parcel_l ? $length : $parcel_l;
				echo "---<br>parcel_wei---".$parcel_wei = 1 > $parcel_weight ? $Weight : $parcel_weight;
?>