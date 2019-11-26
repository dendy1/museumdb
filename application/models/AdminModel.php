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
            'description' => $description,
            'author' => $author
        ];
        $this->db->query('INSERT INTO exhibit_translate VALUES (:id, :language_id, :exhibit_id, :name, :description, :author);', $params);

        return $this->db->last_insert_id();
    }

    public function add_exhibition()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $town = $_POST['town'];
        $place = $_POST['place'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $exhibits_id = $_POST['exhibits_id'];

        $holder = $_POST['holder'];

        $params = [
            'exhibition_id' => null,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
        $this->db->query('INSERT INTO exhibition VALUES (:exhibition_id, :start_date, :end_date);', $params);

        $exhibition_id = $this->db->last_insert_id();

        $params = [
            'id' => null,
            'language_id' => 1,
            'exhibition_id' => $exhibition_id,
            'name' => $name,
            'description' => $description,
            'country' => $country,
            'town' => $town,
            'place' => $place,
            'holder' => $holder
        ];
        $this->db->query('INSERT INTO exhibition_translate VALUES (:id, :language_id, :exhibition_id, :name, :description, :country, :town, :place, :holder);', $params);

        foreach ($exhibits_id as $exhibit_id)
        {
            $params = [
                'exhibit_id' => $exhibit_id,
                'exhibition_id' => $exhibition_id
            ];
            $this->db->query('INSERT INTO exhibit_exhibition VALUES (:exhibit_id, :exhibition_id);', $params);
        }

        return $exhibition_id;
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

    public function edit_exhibit($exhibit_id)
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $author = $_POST['author'];

        $category_id = $_POST['category_id'];
        $location_id = $_POST['location_id'];
        $create_date = $_POST['create_date'];

        $params = [
            'exhibit_id' => $exhibit_id,
            'category_id' => $category_id,
            'location_id' => $location_id,
            'create_date' => $create_date
        ];
        $this->db->query('UPDATE exhibit SET category_id=:category_id, location_id=:location_id, create_date=:create_date WHERE exhibit_id=:exhibit_id;', $params);

        $params = [
            'language_id' => 1,
            'exhibit_id' => $exhibit_id,
            'name' => $name,
            'description' => $description,
            'author' => $author
        ];
        return $this->db->query('UPDATE exhibit_translate SET name=:name, description=:description, author=:author WHERE language_id=:language_id AND exhibit_id=:exhibit_id;', $params);
    }

    public function edit_exhibition($exhibition_id)
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $town = $_POST['town'];
        $place = $_POST['place'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $exhibits_id = $_POST['exhibits_id'];

        $holder = $_POST['holder'];

        $params = [
            'exhibition_id' => $exhibition_id,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
        $this->db->query('UPDATE exhibition SET start_date=:start_date, end_date=:end_date WHERE exhibition_id=:exhibition_id;', $params);

        $params = [
            'language_id' => 1,
            'exhibition_id' => $exhibition_id,
            'name' => $name,
            'description' => $description,
            'country' => $country,
            'town' => $town,
            'place' => $place,
            'holder' => $holder
        ];
        $this->db->query('UPDATE exhibition_translate SET name=:name, description=:description, country=:country, town=:town, place=:place, holder=:holder WHERE language_id=:language_id AND exhibition_id=:exhibition_id;', $params);

        $this->db->query('DELETE FROM exhibit_exhibition WHERE exhibition_id=:exhibition_id', ['exhibition_id' => $exhibition_id]);
        foreach ($exhibits_id as $exhibit_id)
        {
            $params = [
                'exhibit_id' => $exhibit_id,
                'exhibition_id' => $exhibition_id
            ];
            $this->db->query('INSERT INTO exhibit_exhibition VALUES (:exhibit_id, :exhibition_id);', $params);
        }

        return $exhibition_id;
    }

    public function edit_category($category_id)
    {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $params = [
            'language_id' => 1,
            'category_id' => $category_id,
            'category' => $name,
            'description' => $description
        ];
        return $this->db->query('UPDATE category_translate SET category=:category, description=:description WHERE language_id=:language_id AND category_id=:category_id;', $params);
    }

    public function edit_location($location_id)
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $type = $_POST['type'];

        $params = [
            'language_id' => 1,
            'location_id' => $location_id,
            'location' => $name,
            'address' => $address,
            'type' => $type
        ];
        return $this->db->query('UPDATE location_translate SET location=:location, address=:address, type=:type WHERE language_id=:language_id AND location_id=:location_id;', $params);
    }

    public function delete_exhibit($exhibit_id)
    {
        $params = [
            'exhibit_id' => $exhibit_id
        ];

        $this->db->query('DELETE FROM exhibit WHERE exhibit_id=:exhibit_id;', $params);
    }

    public function delete_exhibition($exhibition_id)
    {
        $params = [
            'exhibition_id' => $exhibition_id
        ];

        $this->db->query('DELETE FROM exhibition WHERE exhibition_id=:exhibition_id;', $params);
    }

    public function delete_category($category_id)
    {
        $params = [
            'category_id' => $category_id
        ];

        $this->db->query('DELETE FROM category WHERE category_id=:category_id;', $params);
    }

    public function delete_location($location_id)
    {
        $params = [
            'location_id' => $location_id
        ];

        $this->db->query('DELETE FROM location WHERE location_id=:location_id;', $params);
    }

    public function get_exhibit_by_id($id,  $language_id = 1)
    {
        $params = [
            'exhibit_id' => $id,
            'language_id' => $language_id
        ];

        return $this->db->row('select * from exhibit e join exhibit_translate et on e.exhibit_id = et.exhibit_id  where e.exhibit_id=:exhibit_id and et.language_id=:language_id', $params);
    }

    public function get_exhibition_by_id($id, $language_id = 1)
    {
        $params = [
            'exhibition_id' => $id,
            'language_id' => $language_id
        ];

        return $this->db->row('select * from exhibition e join exhibition_translate et on e.exhibition_id = et.exhibition_id where e.exhibition_id=:exhibition_id and et.language_id=:language_id', $params);
    }

    public function get_category_by_id($id, $language_id = 1)
    {
        $params = [
            'category_id' => $id,
            'language_id' => $language_id
        ];

        return $this->db->row('select * from category c join category_translate ct on c.category_id = ct.category_id  where c.category_id=:category_id and ct.language_id=:language_id', $params);
    }

    public function get_location_by_id($id, $language_id = 1)
    {
        $params = [
            'location_id' => $id,
            'language_id' => $language_id
        ];

        return $this->db->row('select * from location l join location_translate lt on l.location_id = lt.location_id  where l.location_id=:location_id and lt.language_id=:language_id', $params);
    }

    public function get_exhibits_of_exhibition($exhibition_id, $language_id = 1)
    {
        $params = [
            'exhibition_id' => $exhibition_id,
            'language_id' => $language_id
        ];

        return $this->db->row('select * from exhibit_exhibition ee join exhibit_translate et on ee.exhibit_id = et.exhibit_id where ee.exhibition_id=:exhibition_id and et.language_id=:language_id', $params);
    }
}