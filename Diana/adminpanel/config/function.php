<?php
 	require 'database.php';
	
	

 	 function getPassForUserName($email){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from user WHERE email=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($email));
        $data = $q->fetch();
      
	//$row = $sql->fetch();
        $cuont = $q->rowCount();
// if count > 0 means the records is found 
        if ($cuont > 0) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $data['name'];
		//	$_SESSION['dob']=$data['dob'];
		//	$_SESSION['country']=$data['country'];
          // header('Location: index.php');
           
			return $data['password'];
			 exit();
        } 
		
	
			
			
			
            Database::disconnect();
         }
		 
		 

function getAllCategory(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from category";
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
       }

function getCategoryNameById($catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select name from category where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($catid));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return  $data['name'];
        Database::disconnect();
          
       }

function getAllNews(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from news";
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
    }

function getNewsById($newsId){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from news where id =?";
        $q = $pdo->prepare($sql);
        $q->execute(array($newsId));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
    }


function getAllNewsbyCategory($catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from news where categoryid=? ORDER BY id DESC LIMIT 3";
        $q = $pdo->prepare($sql);
        $q->execute(array($catid));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
    }


function inserCategory($catname){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into category (name,date) values (?,?)";
        $q = $pdo->prepare($sql);

        if($q->execute(array($catname,date("F j, Y, g:i a")))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
         
        
          
       }

function inserVote($question){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into votequestion (question,date) values (?,?)";
        $q = $pdo->prepare($sql);

        if($q->execute(array($question,date("F j, Y, g:i a")))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
          
       }

function inserVoteChoice($choice,$questionid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into votechoice (choice,count,questionid) values (?,?,?)";
        $q = $pdo->prepare($sql);

        if($q->execute(array($choice,"0",$questionid))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
          
       }

function getMaxQuestionId(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select max(id) from votequestion";
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return  $data['max(id)'];
        Database::disconnect();
          
    }

function getLastVoteQuestion(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from votequestion ORDER BY id DESC LIMIT 1";
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
    }

function updatecounttChoices($cohiceId){
    
    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update  votechoice set count=count+1 where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($cohiceId));
        Database::disconnect();
}
function getVoteChoices($voteid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from votechoice where questionid=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($voteid));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();
          
    }



function insertComic($summary,$photo){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into photos (summary,photo,date) values (?,?,?)";
        $q = $pdo->prepare($sql);

        if($q->execute(array($summary,$photo,date("F j, Y, g:i a")))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
          
       }


function insertNews($title,$summary,$details,$categoryid,$image){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into news (title,summary,details,categoryid,image,date) values (?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);

        if($q->execute(array($title,$summary,$details,$categoryid,$image,date("F j, Y, g:i a")))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
          
       }


function deleteCategoryt($catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from  category WHERE id=?";
        $q = $pdo->prepare($sql);
        
        if($q->execute(array($catid))){
            return 1;
        }else{
            return 0;
        }
        Database::disconnect();
         
          
       }

function updateuser($pass,$catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE user  set password = ? WHERE id= ?";
        $q = $pdo->prepare($sql);
        
        if($q->execute(array($pass,$catid))){
            return 1;
        }else{
            return 0;
        }
        Database::disconnect();
         
          
       }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateUser($col, $value) {
    global $con;
    $id = $_SESSION['id'];
    $stmt = $con->prepare("UPDATE  user SET  $col = '$value' WHERE id = $id");
    $stmt->execute();
}



function showMsg($msg) {
    ?> 
    <script type="text/javascript">
        alert('<?php echo $msg ?>');
    </script>
    <?php
}



function addUser($values) {
    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo->prepare("insert into user (name, email, password) values (? , ? , ?)");
    $q->execute($values);
    $stmt1 = $pdo->prepare("select id  from user where email = '$values[1]'");
    $stmt1->execute();

    return $stmt1->fetch();
	
	

        
       
      
}

/*
function AddUser($values) {
   


	 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    $q = $pdo->prepare("insert into user (name,email,password,dob,country) values (?,?,?,?,?)");
    $q->execute($values);
    $stmt1 = $pdo->prepare("select id from user where email = '$values[1]'");
    $stmt1->execute();

    return $stmt1->fetch();
	
	
	

     
       

/*
    $q = $pdo->prepare("insert into user (name,email,password,dob,country) values (?,?,?,?,?)");
    $q->execute();
	
	
    $stmt1 = $pdo->prepare("select id  from user where email = '$values[1]'");
    $stmt1->execute();

    return $stmt1->fetch();*/
//}



/*
function AddUser($name,$email,$pass,$dob,$country){
         $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT into user (name,email,password,dob,country) values ('$name','$email','$pass','$dob','$country')";
        $q = $pdo->prepare($sql);

      
        $q->execute(array($name,$email,$pass,$dob,$country));
		
        if($q->execute(array($name,$email,$pass,$dob,$country))){
            Database::disconnect();
            return 1;
        }else{
            Database::disconnect();
            return 0;
        }
         
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  
        $data = $q->fetch(); 
          
       }






?>

*/


