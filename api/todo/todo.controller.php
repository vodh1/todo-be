<?php
  class TodoController {
    public function getAll() {
      $db = new Database();
      $result = $db->conn->query("SELECT * FROM todo");
      return json_encode($result->fetch_all(MYSQLI_ASSOC));
    }

    public function add($name) {
      $db = new Database();
      $stmt = $db->conn->prepare("INSERT INTO todo (name) VALUES (?);");
      $stmt->bind_param("s", $name);
      $stmt->execute();
      return $stmt->insert_id;
    }

    public function update($id, $is_done) {
      $db = new Database();
      $stmt = $db->conn->prepare("UPDATE todo SET is_done = ? WHERE id = ?");
      $stmt->bind_param("ii", $is_done, $id);
      $stmt->execute();
      return $stmt->affected_rows;
    }

    public function delete($id) {
      $db = new Database();
      $stmt = $db->conn->prepare("DELETE FROM todo WHERE id = ?;"); 
      $stmt->bind_param("i", $id);
      $stmt->execute();
      return $stmt->affected_rows;
    }
  }
?>