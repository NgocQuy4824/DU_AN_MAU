<?php
class User extends BaseModel
{
    protected $table = 'users';

    public function getAllUsers()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return $this->pdo_query_all($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->pdo_execute($sql, ['id' => $id]);
    }

    public function toggleActive($id, $status)
    {
        $sql = "UPDATE {$this->table} SET is_admin = :is_admin WHERE id = :id";
        return $this->pdo_execute($sql, ['is_admin' => $status, 'id' => $id]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function createUser($name, $email, $password)
    {
        $sql = "INSERT INTO {$this->table} (name, email, password, is_admin) 
            VALUES (:name, :email, :password, 0)";
        return $this->pdo_execute($sql, [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
