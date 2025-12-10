<?php
class Product extends BaseModel
{

    protected $table = 'products';

    public function getAll()
    {
        $sql = 'SELECT pro.*, pro.img AS image, cat.name AS cat_name 
            FROM `products` as pro
            JOIN categorys as cat ON pro.category_id = cat.id ORDER BY pro.id DESC;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy sản phẩm theo danh mục
    public function getByCategory($categoryId)
    {
        $sql = 'SELECT pro.*, pro.img AS image, cat.name AS cat_name 
            FROM `products` as pro
            JOIN categorys as cat ON pro.category_id = cat.id
            WHERE pro.category_id = :cat_id
            ORDER BY pro.id DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['cat_id' => $categoryId]);
        return $stmt->fetchAll();
    }
    public function store($data)
    {
        $sql = "INSERT INTO {$this->table} (category_id, name, description, price, quantily, img)
                VALUES (:category_id, :name, :description, :price, :quantily, :img)";
        return $this->pdo_execute($sql, $data);
    }

    // Lấy 1 sản phẩm theo id
    public function find($id)
    {
        $sql = 'SELECT pro.*, pro.img AS image, cat.name AS cat_name
                FROM `products` as pro
                JOIN categorys as cat ON pro.category_id = cat.id
                WHERE pro.id = :id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Cập nhật sản phẩm
    public function update($data)
    {
        // nếu có img mới thì phần SET có img, nếu không thì giữ nguyên
        if (isset($data['img']) && $data['img'] !== null) {
            $sql = "UPDATE {$this->table} SET category_id = :category_id, name = :name, description = :description, price = :price, quantily = :quantily, img = :img WHERE id = :id";
        } else {
            $sql = "UPDATE {$this->table} SET category_id = :category_id, name = :name, description = :description, price = :price, quantily = :quantily WHERE id = :id";
        }
        return $this->pdo_execute($sql, $data);
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->pdo_execute($sql, ['id' => $id]);
    }
}
