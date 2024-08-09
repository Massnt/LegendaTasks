<?php

namespace Kanboard\Plugin\LegendaTasks;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        global $legendaTasksConfig;

        if (file_exists('plugins/LegendaTasks/config.php'))
        {
            require_once('plugins/LegendaTasks/config.php');
        }

        $this->hook->on('template:layout:css', array('template' => 'plugins/LegendaTasks/Assets/css/legenda_cores_task.css'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/LegendaTasks/Assets/js/mostrarLegenda.js'));

        $this->template->hook->attach('template:project:sidebar', 'LegendaTasks:layout/sidebar');
        $this->template->hook->attach('template:layout:bottom', 'LegendaTasks:board/legenda_cores_task', [
            'legendas' => $this->legendaTaskModel->getAllLegendasByProject(isset($legendaTasksConfig['project_id']) ? $legendaTasksConfig['project_id'] : '1'),
        ]);
    }

    public function getClasses()
    {
        return [
            'Plugin\LegendaTasks\Model' => [
                'LegendaTaskModel',
            ],
            'Plugin\LegendaTasks\Validator' => array('LegendaTasksDataValidator')
        ];
    }

    public function getPluginName()
    {
        return 'LegendaTasks';
    }

    public function getPluginDescription()
    {
        return t('Adiciona legendas de cor ao projeto.');
    }

    public function getPluginAuthor()
    {
        return 'Mateus S.S';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Massnt/LegendaTasks.git';
    }
}

