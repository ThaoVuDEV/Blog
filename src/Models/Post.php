<?php

namespace Bomdev\Asmoop\Models;

use Bomdev\Asmoop\Commons\Model;

class Post extends Model
{
    public function getTop6()
    {
        try {
            $sql = "SELECT  
                        p.id            AS  p_id, 
                        p.content         AS p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    ORDER BY p.id DESC
                    LIMIT 6";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }

    public function getFirstLatest()
    {
        try {
            $sql = "SELECT  
                         p.id            AS  p_id, 
                        p.content         AS p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    ORDER BY p.id DESC
                    LIMIT 1";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function getLatest()
    {
        try {
            $sql = "SELECT  
                         p.id            AS  p_id, 
                        p.content         AS p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    ORDER BY p.id DESC
                    LIMIT 5
                    ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function getTrending()
    {
        try {
            $sql = "SELECT  
                         p.id            AS  p_id, 
                        p.content         AS p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    ORDER BY p.views DESC
                    LIMIT 5
                    ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }

    public function getAllPosts()
    {
        try {
            $sql = "SELECT  
                          p.id            AS  p_id, 
                        p.content         AS p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    ORDER BY p.id DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function getByPostId($id)
    {
        try {
            $sql = "SELECT  
                        p.id            AS  p_id, 
                        p.category_id   AS  p_category_id,
                        p.content       AS  p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name          AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                    WHERE p.id =:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function getByPostIdCategory($id)
    {
        try {
            $sql = "SELECT  
                        p.id            AS  p_id, 
                        p.category_id   AS  p_category_id,
                        p.content       AS  p_content, 
                        p.title         AS  p_title, 
                        p.excerpt       AS  p_excerpt, 
                        p.image         AS  p_image, 
                        c.name          AS c_name 
                    FROM  posts AS p
                    INNER JOIN categories AS C
                    ON p.category_id = c.id
                                WHERE p.category_id=:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function insertPost($category_id, $title,  $content, $excerpt = null, $image = null)
    {
        try {
            $sql = "INSERT INTO posts (category_id,title,excerpt,content,image) 
            VALUES          (:category_id,:title,:excerpt,:content,:image) ";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":category_id", $category_id);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":excerpt", $excerpt);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":image", $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
    public function updatePost($category_id, $title, $excerpt, $content, $image, $id)
    {
        try {
            $sql = "
                    UPDATE posts 
                    SET     category_id = :category_id,
                            title       = :title,
                            excerpt     = :excerpt,
                            content     = :content,
                            image       = :image
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":category_id", $category_id);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":excerpt", $excerpt);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    public function deletePost($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    public function demView($id)
    {
        try {
            $sql = "UPDATE posts SET views = views + 1 WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
