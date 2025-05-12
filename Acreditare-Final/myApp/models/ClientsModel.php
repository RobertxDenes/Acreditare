<?php

class ClientsModel extends DBModel
{
    public function getAllClients()
    {
        $query = "SELECT * FROM clients";
        $result = $this->db()->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClientById($id)
    {
        $query = "SELECT * FROM clients WHERE id = ?";
        $stmt = $this->db()->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addClient($name, $email)
    {
        $query = "INSERT INTO clients (name, email) VALUES (?, ?)";
        $stmt = $this->db()->prepare($query);
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $stmt->close();
        return $this->db()->insert_id;
    }

    public function updateClient($id, $name, $email)
    {
        $query = "UPDATE clients SET name = ?, email = ? WHERE id = ?";
        $stmt = $this->db()->prepare($query);
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteClient($id)
    {
        $query = "DELETE FROM clients WHERE id = ?";
        $stmt = $this->db()->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}