<?php
class LikeModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function likePost ($postid) {
    $user_id = $_SESSION['user_id'];



  $this->db->query("select * from likes
where post_id = :post_id AND user_id= :user_id;");
    $this->db->bind(':post_id', $postid);
    $this->db->bind(':user_id', $user_id);
    $this->db->execute();
    if ($this->db->rowCount() > 0) {
      $this->db->query( 'DELETE FROM likes WHERE post_id = :post_id AND user_id= :user_id');

      // Bind Values
      $this->db->bind( ':post_id', $postid);
      $this->db->bind( ':user_id', $user_id);

      //Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }else{
      $this->db->query("INSERT INTO likes SET user_id=:user_id, post_id=:post_id");
      $this->db->bind(':post_id', $postid);
      $this->db->bind(':user_id', $user_id);
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

   }
  public function getAllUserLikes()
  {


    $this->db->query( "
    SELECT p.id, p.author, p.title, p.body, p.image, p.created_date
FROM posts p
LEFT JOIN likes l ON l.post_id = p.id
WHERE l.user_id = :user_id;");

//     $this->db->query( "select * from posts
// where author= :user_id");                    

    $id = $_SESSION['user_id'];
    $this->db->bind(':user_id', $id);

    $results = $this->db->resultset();
    return $results;
  }

}