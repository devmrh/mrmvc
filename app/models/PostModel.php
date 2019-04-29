<?php
class PostModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPosts()
  {
    $this->db->query("select post.id,post.author,post.title,post.body,post.image,post.created_date,user.name
from posts post, users user
where user.id=post.author;
                        ");

    $results = $this->db->resultset();
    return $results;
  }
  public function getAllUserPosts()
  {
    $this->db->query("select * from posts
where author= :author;");

    $id = $_SESSION['user_id'];
    $this->db->bind(':author', $id);

    $results = $this->db->resultset();
    return $results;
  }

  public function getSinglePost($id)
  {
    $this->db->query("SELECT * FROM posts WHERE id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }

  public function updatePost($data)
  {

    $this->db->query("UPDATE posts SET title=:title,image=:image, body=:body WHERE id=:id");
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':image', $data['image']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function addPost($data)
  {
    $this->db->query('INSERT INTO posts (title, author, body, image) 
      VALUES (:title, :author, :body, :image)');

    $this->db->bind(':title', $data['title']);
    $this->db->bind(':author', $data['author']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':image', $data['image']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function deletePost($id)
  {
    $this->db->query('DELETE FROM posts WHERE id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

}
