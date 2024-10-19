<?php



$first_name = $last_name = $phone = $seven_digit = $email = "";

$first_nameErr = $last_nameErr = $phoneErr = $seven_digitErr = $emailErr = "";

if(isset($_POST["btnRegister"])){

    if(empty($_POST["first_name"])){

        $first_nameErr = "Required!";

    }else{
        $first_name = $_POST["first_name"];

    }

if(empty($_POST["last_name"])){

    $last_nameErr = "Required!";

}else{
    $last_name = $_POST["last_name"];

}

if(empty($_POST["phone"])){

    $phoneErr = "Required!";

}else{
    $phone = $_POST["phone"];

}
 
if(empty($_POST["seven_digit"])){

    $seven_digitErr = "Required!";

}else{
    $seven_digit = $_POST["seven_digit"];

}
 
if(empty($_POST["email"])){

    $emailErr = "Required!";

}else{
    $email = $_POST["email"];

}

if ($first_name && $last_name && $phone && $seven_digit && $email){
    
    if (!preg_match("/^[a-zA-Z]*$/", $first_name)){

        $first_nameErr = "Letters only and no space.";
    }else{
        $count_first_name_string = strlen($first_name);
        
        if($count_first_name_string < 2){

            $first_nameErr = "Masyadong maikse ang name mo kapatid.";

        }else{

            $count_last_name_string = strlen($last_name); 

            if($count_last_name_string < 2){
 
             $last_nameErr = "Masyadong maikse ang last name mo kapatid.";


            }else{
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    
                    $emailErr = "Invalid email format";

                }else{
                    $count_seven_digit_name_string = strlen($seven_digit);
                    if($count_seven_digit_name_string < 7){

                        $seven_digitErr = "brad kulang ang seven digit number mo.";
                    }else{

                        function random_password ( $length = 5 ){
                            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                            $shuffled = substr(str_shuffle($str), 0, $length);
                            return $shuffled;
                        }

                        $password = random_password(8);
                        
                        include ("connections.php");

                        mysqli_query ($connections, "INSERT INTO users (first_name, last_name, email, phone, password, account_type) 
                        VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '2')");
                        

                        echo "<script> window.location.href='index.php'; </script>";

                    }

                }
            }
        }

        }
    }
}


include("connections.php");

?>

<style>
    .error{
        color: red;

    }
    </style>

    <script type = "application/javascript">
        
        function isNumberKey(evt){

            var charCode = (evt.which) ? evt.which : event.keyCode

            if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

            return true;
        }

        </script>
 
<form METHOD="POST" >
    <center>
        <table border="0" width="50%">
    <tr><td> <input type="text" name="first_name" placeholder="First name"  value="<?php echo $first_name; ?>">  <span class="error"><?php echo $first_nameErr; ?> </span> </td></tr>

    <tr><td> <input type="text" name="last_name" placeholder="Last name" value="<?php echo $last_name; ?>"> <span class="error"><?php echo $last_nameErr; ?> </span></td></tr>


    <tr>
        <td>

            <select name="phone">

                <option name="phone" id="phone" value="">Network Provided (Globe, Smart, Sun, TNT, Tm etc.) </option>

                <option name="phone" id="phone" value="0813"<?php if($phone == "0813") {echo "selected";} ?>>0813</option>
                <option name="phone" id="phone" value="0817"<?php if($phone == "0817") {echo "selected";} ?>>0817</option>
                <option name="phone" id="phone" value="0905"<?php if($phone == "0905") {echo "selected";} ?>>0905</option>
                <option name="phone" id="phone" value="0906"<?php if($phone == "0906") {echo "selected";} ?>>0906</option>
                <option name="phone" id="phone" value="0907"<?php if($phone == "0907") {echo "selected";} ?>>0907</option>
                
            </select>  <span class="error"><?php echo $phoneErr; ?> </span>

            <input type="text" name="seven_digit" value="<?php echo $seven_digit; ?>" maxlength="7" placeholder="Other Seven Digit" onkeypress='return isNumberKey (event)'> <span class="error"><?php echo $seven_digitErr; ?></span>

    </td>
</tr>

<tr>
    <td>
        <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email"> <span class="error"><?php echo $emailErr; ?> </span>
    </td>
</tr>

<tr>
    <td>
        <hr>

    </td>
</tr>

<tr>
    <td>
        
        <input type="submit" name=".login-btn input" value="Register!">

    </td> 
</tr>


    </table>
</center>
</form>
