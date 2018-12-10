<?php
class MemberDAO{
  private $db;

  public function __construct(){
    try {

      $this->db = new PDO("mysql:host=localhost;dbname=php","root","");
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
      exit($e->getMessage());

    }

  }

  public function getMember($id){
    try {
      $query=$this->db->prepare("select * from member where id = :id");
      /*실행 준비 , DB서버가
      1. 문법검사
      2. 유효성 검사
      3. 실행계획 수립*/
      $query->bindValue(":id",$id,PDO::PARAM_STR);
      $query->execute();

      $result=$query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $result;

  }

  public function insertMember($id, $pw, $name){
    try{

       
      //$query=$this->db->prepare("insert into member values(:id,:pw,:name)");
      /*실행 준비 , DB서버가
      1. a문법검사
      2. 유효성 검사
      3. 실행계획 수립*/
     $sql = "insert into member(id, pw, name) values(:id, :pw, :name)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name", $name, PDO::PARAM_STR);

                $pstmt->execute();

    }catch (PDOException $e) {
      exit($e->getMessage());
    }
  }
    function updateMember($id, $pw, $name){
        try{
            $sql = "update member set pw = :pw, name=:name where id = :id";
            $pstmt =$this -> db-> prepare($sql);
            $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
            $pstmt->bindValue(":name", $name, PDO::PARAM_STR);
            
            $pstmt->execute();
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    
}
 ?>