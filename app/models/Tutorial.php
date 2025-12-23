<?php

// The TUTORIAL model is responsible for database operations related to tutorial video content.
class Tutorial
{

    // fetch all tutorials for public display and admin management 
    public static function getAll(PDO $pdo): array
    {
        $sql = "SELECT * FROM tutorials ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    //create a new tutorial for the admin only.
    public static function create(PDO $pdo, string $title, string $description, string $videoUrl)
    {
        // Query to db
        $sql = "INSERT INTO tutorials (title, description, video_url)
                VALUES (:title, :description, :video_url)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':video_url' => $videoUrl
        ]);
    }

    // Admin delete a tutorial 

    public static function delete(PDO $pdo, int $id)
    {
        $sql = "DELETE FROM tutorials WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }

}
