<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$mySalary = $data->salary;
$myCarAllowance = $data->car;
$myTravelAllowance = $data->travel;
$myVacation = $data->vacation;

$gross_salary = floatval($mySalary) + floatval($myCarAllowance) + floatval($myTravelAllowance) + floatval($myVacation);

//employee tier
$empTierOne = (0/100) * $gross_salary;
$empTierTwo = (5.5/100) * $gross_salary;
$empTierThree = (5/100) * $gross_salary;

$totalEmpTier = $empTierOne + $empTierTwo + $empTierThree;

//employer tier
$employerTierOne = (13/100) * $gross_salary;
$employerTierTwo = (0/100) * $gross_salary;
$employerTierThree = (5/100) * $gross_salary;

$totalEmployerTier = $employerTierOne + $employerTierTwo + $employerTierThree;

//remaining gross_salary
$remGross = $gross_salary - $totalEmpTier;

if($remGross <= 319){
	//paye tax
	$graTaxRate = 0;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	echo json_encode($newArr);
	
}else if($remGross > 319 && $remGross <= 419){
	//paye tax
	$graTaxRate = 5;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	echo json_encode($newArr);
	
}else if($remGross > 419 && $remGross <= 539){
	//paye tax
	$graTaxRate = 10;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	echo json_encode($newArr);
	
}else if($remGross > 539 && $remGross <= 3000){
	//paye tax
	$graTaxRate = 17.5;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	echo json_encode($newArr);
	
}else if($remGross > 3000 && $remGross <= 16461){
	//paye tax
	$graTaxRate = 25;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	echo json_encode($newArr);
	
}else if($remGross > 16461 || $remGross >= 20000){
	//paye tax
	$graTaxRate = 30;
	$payeTax = ($graTaxRate/100) * $remGross;
	
	//Actual net salary
	$actualNetSalary = $remGross - $payeTax;
	$allArray = array();
	$allArray["data"] = array();
	
	$newArr = array(
		"expectednetsalary" => $mySalary,
		"totalEmployeePensionPayable" => $totalEmpTier,
		"totalEmployerPensionPayable" => $totalEmployerTier,
		"payablePayeTax" => $payeTax,
		"gross_salary" => $gross_salary,
		"actualNetSalary" => $actualNetSalary
	);
	
	array_push($allArray["data"], $newArr);
	echo json_encode($allArray);
	
}else{
	echo json_encode("Sorry, no information available.");
}

?>