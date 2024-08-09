<?php

namespace Kanboard\Plugin\LegendaTasks\Model;

use Kanboard\Core\Base;

class LegendaTaskModel extends Base
{
    const TABLE = 'legendas';

    public function create($values)
    {
        return $this->db->table(self::TABLE)->insert($values);
    }

    public function update($id, $values)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->update($values);
    }

    public function remove($id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->remove();
    }

    public function getAllLegendas()
    {
        return $this->db->table(self::TABLE)->findAll();
    }

    public function getAllLegendasByProject($project_id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $project_id)->findAll();
    }

    public function getLegendaById($legenda_id)
    {
        return $this->db->table(self::TABLE)->eq('id', $legenda_id)->findOne();
    }
}
