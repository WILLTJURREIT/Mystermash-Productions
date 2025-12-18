<?php

// This file is the post model which is responsible for the database operations that are related to posts.

class Post
{

    // create a new post that will be inserted into the database

    public static function create(PDO $pdo, int $userId, string $title, string $content)
    {
        $sql = "INSERT INTO posts (user_id, title, content)
                VALUES (:user_id, :title, :content)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':title' => $title,
            ':content' => $content,
        ]);
    }
    // Get all posts from a user
    public static function getByUser(PDO $pdo, int $userId): array
    {
        $sql = "SELECT * FROM posts
                WHERE user_id = :user_id
                ORDER BY created_at DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId
        ]);

        return $stmt->fetchAll();
    }

    // Update an existing post
    public static function update(PDO $pdo, int $postId, int $userId, string $title, string $content)
    {
        $sql = "UPDATE posts
            SET title = :title, content = :content
            WHERE id = :id AND user_id = :user_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':id' => $postId,
            ':user_id' => $userId,
        ]);
    }


    // Delete a post

    public static function delete(PDO $pdo, int $postId, int $userId)
    {
        $sql = "DELETE FROM posts
            WHERE id = :id AND user_id = :user_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $postId,
            ':user_id' => $userId,
        ]);
    }

}

