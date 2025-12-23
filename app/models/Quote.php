<?php
// Handles all database logic for daily quotes the admin can create, delete, and select which quote is shown on the homepage,and is active or not. 
class Quote
{
    // Get all quotes (for admin list)
    public static function getAll(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT * FROM quotes ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new quote
    public static function create(PDO $pdo, string $quoteText, ?string $author): bool
    {
        $stmt = $pdo->prepare("INSERT INTO quotes (quote_text, author) VALUES (:quote_text, :author)");
        return $stmt->execute([
            ':quote_text' => $quoteText,
            ':author' => $author ?: null
        ]);
    }

    // Delete a quote
    public static function delete(PDO $pdo, int $id): bool
    {
        $stmt = $pdo->prepare("DELETE FROM quotes WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // Get one daily quote latest quote)
    public static function getDaily(PDO $pdo): ?array
    {
        $stmt = $pdo->query("SELECT * FROM quotes ORDER BY created_at DESC LIMIT 1");
        $quote = $stmt->fetch(PDO::FETCH_ASSOC);
        return $quote ?: null;
    }

    // random quote instead of latest
    public static function getRandom(PDO $pdo): ?array
    {
        $stmt = $pdo->query("SELECT * FROM quotes ORDER BY RAND() LIMIT 1");
        $quote = $stmt->fetch(PDO::FETCH_ASSOC);
        return $quote ?: null;
    }

    // Returns the active quote and  only one quote should be active at a time and displayed on the homepage

    public static function getActive(PDO $pdo)
    {
        $stmt = $pdo->prepare(
            "SELECT * FROM quotes WHERE is_active = 1 LIMIT 1"
        );
        $stmt->execute();
        return $stmt->fetch();
    }

    // deactivates all quotes so only one can be active at a time, it ensures a single current daily quote.
    public static function deactivateAll(PDO $pdo)
    {
        $sql = "UPDATE quotes SET is_active = 0";
        $pdo->exec($sql);
    }


    // this sets the selected quote as the active daily quote.
    public static function activate(PDO $pdo, int $id)
    {
        $sql = "UPDATE quotes SET is_active = 1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }


}
