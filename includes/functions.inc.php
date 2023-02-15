<?php
require_once 'dbh.inc.php';
$result;
function emptyInputSignUp($userName,$email,$password){

if (empty($userName) || empty($email) || empty($password) ) {
    // CHECK THE USERNAME INPUT IF it MATCH CHARACTERS ASIGNED
    //retrun = true means there is a mistake  
        $result = true;
} else {
    //retrun = false means there is NO a mistake  
        $result = false;
}
return $result;
}
// CHECK USERNAME INPUT
function invalidusername($userName){
 
    if (!preg_match('/^[a-zA-Z0-9]*$/', $userName)) {
       $result = true;
    } else {
        $result = false;
    }
    return $result;
    }
    
// CHECK EMAIL INPUT IF MATCH
    function invalidemail($email){
       
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
    return $result;
        
        }
      // CHECK passoword INPUT IF MATCH
    function invalidpassword($password){
      
       
        // !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)

        if (!preg_match('/^(?=.*[A-Z]).{8,}$/', $password)) {
            $result = true;
        } else {
            $result = false;
        }
    return $result;
}

        
          
//check if username doesnt already exist in db
function uidexists($conn,$userName,$email){
    // the first (;) is for closing sql
    // second (;) is closing for php   
    // request data fron databses username or email
   $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?  ;";
//    initialize a statement object
   $stmt = mysqli_stmt_init($conn);
//    result of mysqli_stmt_init be one paramter for mysqli_stmt_prepare

   if (!mysqli_stmt_prepare($stmt,$sql)) {
    //  mysql prepared statement more secure
// run the init from the user separeted
    header("location: ../register.php?error=stmtfailed");
  exit();
    
}
// ss is for two string
   mysqli_stmt_bind_param($stmt,"ss",$userName,$email);   
   mysqli_stmt_execute($stmt);
   $resultData = mysqli_stmt_get_result($stmt);
// check if there is result from $resultdata
   if ($row = mysqli_fetch_assoc($resultData)) {
   
    return $row;
}else {
    $result=false;
    return $result;}
// mysqli_stmt_close($stmt) bool;
// --------------to be fixed ----------------------
// mysqli_stmt_close($stmt);
// mysqli_close($stmt);

   //Closing the statement
   mysqli_stmt_close($stmt);

   //Closing the connection
   mysqli_close($conn);
   
// -------------------------------------------------

}



function createUser($conn,$userName,$email,$password){
    $sql = "INSERT INTO users (userName,userEmail,userPass) VALUES (?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
 //  mysql prepared statement more secure
    if (!mysqli_stmt_prepare($stmt,$sql)) {
     header("location: ../register.php?error=signfailed");
   exit();
    //  encrypt/hash the passoword and return encrypted pass
    // $$hashPassedPass = password_hash($password,PASSWORD_DEFAULT);a
    // ------disbalde cause created password column in db with small varchar which doesnt allow to save long password hash 

    //------to be fixed + check if its hashed 
 }


 $hashPass = password_hash($password, PASSWORD_DEFAULT);
 // ss is for 3 string
    mysqli_stmt_bind_param($stmt,"sss",$userName,$email,$hashPass);   
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=YOU-ARE-REGISTRED");
    exit();
   }
// ------------------------------
// login fucntions
// ---------------------------------
// function emptyInputSignIn($userName,$password){
    
//     if (empty($userName) || empty($password)) {
//         // CHECK THE email INPUT IF it MATCH ChARACTERS ASIGNED
//         //retrun = true means there is a mistake  
//             $result = true;
//     } else {
//         //retrun = false means there is NO a mistake  
//             $result = false;
//     }
//     return $result;
//     }

//   function loginUser($conn,$userName,$password){

//      $userAlreadyExistInDb = uidexists($conn,$userName,$userName);
//         if ($userAlreadyExistInDb === false) {
//             header("location: ../register.php?error=wronglogin");
//         exit();
// }
// // -------------TO BE FIXED ----------------------------------

//         $matchPass =  $userAlreadyExistInDb["userPass"];    
//         // if these matched return false "notmatch"
//         $chekPass = password_verify($password,$matchPass);
//         if ($chekPass === false) {
//             header("location: ../register.php?error=password-doesnt-match");
//             exit();
//         // ------------------------------------------------------------

//         }  elseif($chekPass === true) {
            
//         session_start();
//         $_SESSION["userid"] = $userAlreadyExistInDb["id"];
//         $_SESSION["username"] = $userAlreadyExistInDb["userName"];
//         header("location: ../register.php?error=YouSignedIn");
//         exit();

//         }
//         };