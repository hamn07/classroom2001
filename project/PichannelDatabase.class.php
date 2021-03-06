<?php
// ref: http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers
class PichannelDatabase {
    private $db;

    function  __construct(){
      $this->db = new PDO("mysql:host=localhost;dbname=pichannel;charset=utf8;port=3306", "root", "wheel11");
      // $db->exec("set names utf8");

      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // ref : http://stackoverflow.com/questions/17059362/why-should-use-attr-emulate-prepares-is-any-alternatives-of-mysql-real-escape-s
      // 安全性設定，不使用模擬，使用原生PDO，防止PDO針對沒支援prepare statemet的DB來進行模擬，使用不支援prepare statement的MySQL版本才需要開啟
      $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    // 新增照片資訊(檔名、拍攝時間)
    function insertImage($sha1,$timestamp){

      $sql = <<<sqlText
        INSERT INTO image VALUES (:sha1,:timestamp)
sqlText;

      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':sha1',$sha1);
      $stmt->bindValue(':timestamp',$timestamp);

      try {
        $num = $stmt->execute();

      } catch (PDOException $ex) {
        switch ($ex->getCode()){
          //duplicate key in table
          case 23000:
            $num = 0;
        }
      }
      $stmt->close();
      return $num;
    }
    // 新增post
    function insertPost($timestamp,$user_id,$image_sha1){
      $sql = <<<sqlText
      INSERT INTO post(
        post_unixtimestamp_original,
        user_id,
        image_sha1
      )
      VALUES (
        :timestamp,
        :user_id,
        :image_sha1
      )
sqlText;
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':image_sha1',$image_sha1);
      $stmt->bindValue(':timestamp',$timestamp);
      $stmt->bindValue(':user_id',$user_id);

      try {
        $num = $stmt->execute();

      } catch (PDOException $ex) {
        switch ($ex->getCode()){
          //duplicate key in table
          case 23000:
            $num = 0;
        }
      }
      return $num;
    }
    function updatePostText($timestamp,$user_id,$text){
      $sql = <<<sqlText
      UPDATE post
         SET text = ?
       WHERE timestamp = ?
         AND user_id = ?
sqlText;

      $stmt = $this->db->prepare($sql);
      $num = $stmt->execute(array($text,$timestamp,$user_id));
      $stmt->close();
      return $num;
    }
    function updateMusic($timestamp,$user_id){

    }
    function deletePost($timestamp,$user_id){

    }
    // 取得所有的posts
    function queryPosts($user_id){
      $sql = <<<sqlText
      SELECT FROM_UNIXTIME(post_unixtimestamp_original),
             image_sha1,
             text
        FROM post
       WHERE user_id = :user_id;
sqlText;


      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':user_id',$user_id);
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      var_dump($rows);
      $stmt->close();
    }
    function queryMusicList(){

    }

    function __destruct(){
      $db = null;
    }
}
