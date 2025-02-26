<?php

namespace Src\Models\Client;

use mysqli;
use Src\Models\BaseModel;
use Throwable;

class AddressModel extends BaseModel
{


    protected $table = "checkout_addresses";
    protected $id = "id";

    public function getOneAddress($id)
    {
        return $this->getOne($id);
    }
    public function createAddress($data)
    {
        return $this->create($data);
    }

    public function updateAddress($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAddress($id)
    {
        return $this->delete($id);
    }

    public function getAddressByUserId($user_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $conn = $this->_conn->MySQLi();

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $results = $result->fetch_all(MYSQLI_ASSOC);
        return $results;
    }
}
