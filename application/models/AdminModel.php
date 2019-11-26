<?php

namespace application\models;

use application\core\Model;

class AdminModel extends Model
{
    public function validate_exhibit()
    {
        return true;
    }

    public function validate_exhibition()
    {
        return true;
    }

    public function validate_location()
    {
        return true;
    }

    public function validate_category()
    {
        return true;
    }

    public function add_exhibit()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $author = $_POST['author'];

        $category_id = $_POST['category_id'];
        $location_id = $_POST['location_id'];
        $create_date = $_POST['create_date'];

        $params = [
            'exhibit_id' => null,
            'category_id' => $category_id,
            'location_id' => $location_id,
            'create_date' => $create_date
        ];
        $this->db->query('INSERT INTO exhibit VALUES (:exhibit_id, :category_id, :location_id, :create_date);', $params);

        $exhibit_id = $this->db->last_insert_id();

        $params = [
            'id' => null,
            'language_id' => 1,
            'exhibit_id' => $exhibit_id,
            'name' => $name,
            'description' => $description
        ];
        $this->db->query('INSERT INTO exhibit_translate VALUES (:id, :language_id, :exhibit_id, :name, :description);', $params);

        return $this->db->last_insert_id();
    }

    public function add_exhibition()
    {

    }

    public function add_category()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $params = [
            'category_id' => null
        ];
        $this->db->query('INSERT INTO category VALUES (:category_id);', $params);

        $category_id = $this->db->last_insert_id();

        $params = [
            'id' => null,
            'language_id' => 1,
            'category_id' => $category_id,
            'category' => $name,
            'description' => $description
        ];
        $this->db->query('INSERT INTO category_translate VALUES (:id, :language_id, :category_id, :category, :description);', $params);

        return $this->db->last_insert_id();
    }

    public function add_location()
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $type = $_POST['type'];

        $params = [
            'location_id' => null
        ];
        $this->db->query('INSERT INTO location VALUES (:location_id);', $params);

        $location_id = $this->db->last_insert_id();

        $params = [
            'id' => null,
            'language_id' => 1,
            'location_id' => $location_id,
            'location' => $name,
            'address' => $address,
            'type' => $type
        ];
        $this->db->query('INSERT INTO location_translate VALUES (:id, :language_id, :location_id, :location, :address, :type);', $params);

        return $this->db->last_insert_id();
    }

    public function get_exhibits()
    {
        return $this->db->row('select * from exhibit e join exhibit_translate et on e.exhibit_id = et.exhibit_id');
    }

    public function get_exhibitions()
    {
        return $this->db->row('select * from exhibition e join exhibition_translate et on e.exhibition_id = et.exhibition_id');
    }

    public function get_categories()
    {
        return $this->db->row('select * from category c join category_translate ct on c.category_id = ct.category_id');
    }

    public function get_locations()
    {
        return $this->db->row('select * from location l join location_translate lt on l.location_id = lt.location_id');
    }
}