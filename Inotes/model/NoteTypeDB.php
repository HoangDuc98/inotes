<?php


use Model\DB;

class NoteTypeDB implements INote
{
    private $db;
    public function __construct()
    {
        $this->db = DB::connection();
    }
    public function getList()
    {
        $sql = "SELECT * FROM note_type";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $types = [];
        foreach ($result as $key => $item) {
            $type = new NoteType($item["name"], $item["description"]);
            $type->setId($item["id"]);
            array_push($types,$type);
        }
        return $types;
    }
    public function save($item)
    {
        $db = Database::connect();
        $sql = "INSERT INTO note(`title`, `content`, `type_id`) VALUES ('$this->title', '$this->content', '$this->typeId')";
        if (!empty($this->title)) {
            if ($db->exec($sql)) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Error: " . $sql;
            }
        }

        // return $row_count > 0;
    }

    public function delete($noteId)
    {
        $db = Database::connect();
        $sql = "DELETE FROM note WHERE id = '$noteId'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        // return $row_count > 0;
    }

}
