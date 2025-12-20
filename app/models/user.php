<?php

// The User model represents the users table in the database, and it handles all the database interactions related to users. the controllers will call these methods instead of writing SQL directly, this is part of the MVC structure and helps keep the code secure  and clean. 

class User
{
    //find a user by email address when logging in. then returns the user row as an associative array or false if not found.
    public static function findByEmail(PDO $pdo, string $email)
    {
        $stmt = $pdo->prepare(
            'SELECT * FROM users WHERE email = ? LIMIT 1'
        );
        $stmt->execute([$email]);

        return $stmt->fetch();
    }



    // Find the user by their id this is used to retrieve the full user record.
    public static function findById(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare(
            'SELECT * FROM users WHERE id = ?'
        );
        $stmt->execute([$id]);

        return $stmt->fetch();
    }



    // Create or register a new user, password is hashed for security then returns the new users id
    public static function create(
        PDO $pdo,
        string $name,
        string $email,
        string $password
    ) {
        // here we Hash the password before storing it, we do not want to save a plain text password as this would be bad for security. 
        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $pdo->prepare(
            'INSERT INTO users (name, email, password)
             VALUES (?, ?, ?)'
        );

        $stmt->execute([
            $name,
            $email,
            $hashedPassword
        ]);


        return $pdo->lastInsertId();
    }



    // gether  all users, for admin only, used in the admin dashboard to manage users
    public static function all(PDO $pdo)
    {
        return $pdo
            ->query('SELECT * FROM users ORDER BY created_at DESC')
            ->fetchAll();
    }


    // Update a users status for admin only and allows enabling and disabling user accounts
    public static function setStatus(
        PDO $pdo,
        int $id,
        string $status
    ) {
        $stmt = $pdo->prepare(
            'UPDATE users SET status = ? WHERE id = ?'
        );

        return $stmt->execute([$status, $id]);
    }


    // delete a user, this is for admin only, and removes a user from the database
    public static function delete(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare(
            'DELETE FROM users WHERE id = ?'
        );

        return $stmt->execute([$id]);
    }

    // Get all users for the admin user control panel.
    public static function getAll(PDO $pdo): array
    {
        $sql = "SELECT id, name, email, role, status, created_at FROM users ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Disable users account
    public static function disable(PDO $pdo, int $id)
    {
        $sql = "UPDATE users SET status = 'disabled' WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    // Enable users account
    public static function enable(PDO $pdo, int $id)
    {
        $sql = "UPDATE users SET status = 'active' WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
