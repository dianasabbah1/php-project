<?php
 	require 'database.php';

 	 function getPassForUserName($User_name){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select password from admin WHERE account=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($User_name));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        if(isset($data ["password"])){
            return $data ["password"];
            Database::disconnect();
         }else{
             return null;
            Database::disconnect();
         }
          
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

    function getusers(){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from user";
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


function deleteuser($catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from  user WHERE id=?";
        $q = $pdo->prepare($sql);
        
        if($q->execute(array($catid))){
            return 1;
        }else{
            return 0;
        }
        Database::disconnect();
         
          
       }

       function getuserById($id){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from user where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
        Database::disconnect();

        
       }
function updateuser($pass,$catid){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE user  set password = ? WHERE id= ?";
        $q = $pdo->prepare($sql);
        
        if($q->execute(array(md5($pass),$catid))){
            return 1;
        }else{
            return 0;
        }
        Database::disconnect();
         
          
       }


?>