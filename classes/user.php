<?php
class User {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function register($username, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
            return $stmt->execute([trim($username), trim($email), $hashedPassword]);
        } catch (PDOException $e) {
            error_log("Registration error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Attempts to log in the user.
     * On success, sets $_SESSION['user_id'] and $_SESSION['username'].
     * Vrácení true on success, false on failure.
     */
    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([trim($username)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // <-- Force associative keys

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    /**
     * Get user data by ID.
     */
    public function getUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>