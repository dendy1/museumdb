<?php

namespace application\models;

use application\core\Model;

class MainModel extends Model
{
    public function getCloseExhibitions()
    {
        return $this->db->row("select * from exhibition e join exhibition_translate et on e.exhibition_id=e.exhibition_id where start_date in (select max(start_date) from exhibition)");
    }

    public function getOngoingExhibitions($gap)
    {
        $params = ['gap' => $gap];
        return $this->db->row("select * from exhibition e join exhibition_translate et on e.exhibition_id=e.exhibition_id where start_date < curdate() + interval :gap day", $params);
    }

    public function getExhibits($count)
    {
        $params = ['count' => $count];
        return $this->db->row("select * from exhibit e join exhibit_translate et on e.exhibit_id=et.exhibit_id order by RAND() LIMIT :count", $params);
    }

    public function getExhibitById($id)
    {
        $params = ['id' => $id];
        return $this->db->row("select * from exhibit e join exhibit_translate et on e.exhibit_id=et.exhibit_id join category_translate ct on e.category_id=ct.category_id join location_translate lt on e.location_id=lt.location_id where e.exhibit_id=:id", $params);
    }

    public function getExhibitionById($id)
    {
        $params = ['id' => $id];
        return $this->db->row("select * from exhibition e join exhibition_translate et on e.exhibition_id=et.exhibition_id where e.exhibition_id=:id", $params);
    }

    public function getExhibitionsOfExhibit($exhibit_id)
    {
        $params = ['exhibit_id' => $exhibit_id];
        return $this->db->row("select * from exhibition e join exhibition_translate et on e.exhibition_id=et.exhibition_id where e.exhibition_id IN (select exhibition_id from exhibit_exhibition ee where ee.exhibit_id=:exhibit_id)", $params);
    }

    public function getExhibitsOfExhibition($exhibition_id)
    {
        $params = ['exhibition_id' => $exhibition_id];
        return $this->db->row("select * from exhibit e join exhibit_translate et on e.exhibit_id=et.exhibit_id where e.exhibit_id IN (select exhibit_id from exhibit_exhibition ee where ee.exhibition_id=:exhibition_id)", $params);
    }

    public function getCategoryById($id)
    {
        $params = ['id' => $id];
        return $this->db->row("select * from category c join category_translate ct on c.category_id=ct.category_id where c.category_id=:id", $params);
    }

    public function getExhibitsOfCategory($category_id)
    {
        $params = ['category_id' => $category_id];
        return $this->db->row("select * from exhibit e join exhibit_translate et on e.exhibit_id=et.exhibit_id where e.category_id=:category_id", $params);
    }
}