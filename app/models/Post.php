<?php

// This file is the post model which is responsible for all the database operations that are related to posts.
// Controllers call these methods instead of writing SQL directly,  this keeps the code organized and secure and follows theMVC structure.

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
    //fetch all posts created by a user a user this is used for user and admin dashboards to show only their own posts.
    public static function getByUser(PDO $pdo, int $userId): array
    {
        $sql = "SELECT posts.*, users.name AS author
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE posts.user_id = :user_id
        ORDER BY posts.created_at DESC";

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

    // fetch all of the posts and the authors name, used for the community feed and admin moderation.
    public static function getAll(PDO $pdo): array
    {
        $sql = "
        SELECT posts.*, users.name AS author
        FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC
    ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    // ADMIN ONLY delete any post no user_id check so it bypasses user ownership checks. This is used for managing the community posts
    public static function deleteAsAdmin(PDO $pdo, int $postId)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $postId
        ]);
    }


}

