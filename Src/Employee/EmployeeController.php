<?php 
//Insert
function addEmployee($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole)
{
	$sqlInsert=
	"INSERT INTO 
	`employee`(`EmployeeCode`, `EmployeePass`, `EmployeeName`, 
	`EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, 
	`EmployeeIC`, `Role`)
	VALUES 
	('$empCode','".md5($empPass)."','$empName','$empBrith','$empAddress','$empMail','$empIC','$empRole')";
	mysql_query($sqlInsert);
}
function blindListRole()
{
	$sqlString="SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `role`";
	$sqlresult = mysql_query($sqlString);
	echo "<select name='slRole' class='form-control'><option value='0'>Vui lòng chọn quyền cho nhân viên của hệ thống</option>";

	while ($row = mysql_fetch_array($sqlresult,MYSQL_ASSOC)) {
		echo "<option value='".$row['RoleId']."'>".$row['RoleName']."</option>";

	}
	echo "</select>";
}
//Update
function searchEmployee($empCode)
{
	$select = 
	"SELECT 
	`EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` 
	FROM `employee` 
	WHERE `EmployeeCode`='$empCode'";
	return mysql_query($select);
}

function updateEmployee($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole)
{
	$sqlUpdate=
	"UPDATE `employee` 
	SET 
	`EmployeeCode`='$empCode',`EmployeePass`='$empPass',`EmployeeName`='$empName',
	`EmployeeBirth`='$empBrith',`EmployeeAddress`='$empAddress',
	`EmployeeEmail`='$empMail',`EmployeeIC`='$empIC',
	`Role`='$empRole' 
	WHERE 
	`EmployeeCode`='$empCode'";
	mysql_query($sqlUpdate);
}
//Delete
function deleteEmployee($empCode)
{
	$delete = "DELETE FROM employee WHERE EmployeeCode='$empCode'";
	mysql_query($delete);
}
?>