<?php

namespace Kanboard\Plugin\LegendaTasks\Controller;

use Kanboard\Controller\BaseController;

class LegendaController extends BaseController
{
    public function create(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('LegendaTasks:create', array(
            'plugin' => 'LegendaTasks',
            'values' => $values,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function show(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->helper->layout->project('LegendaTasks:show', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
            'errors' => $errors,
            'legendas' => $this->legendaTaskModel->getAllLegendas(),
            'project' => $project,
            'title' => t('Edit project')
        )));
    }

    public function save()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();

        list($valid, $errors) = $this->legendaTasksDataValidator->validate($values);

        if ($valid) {
            $values['project_id'] = $project['id'];
            if ($this->legendaTaskModel->create($values) !== false) {
                $this->flash->success(t('Legenda criado com sucesso.'));
            } else {
                $this->flash->failure(t('Não foi possível criar a legenda.'));
            }
            $this->response->redirect($this->helper->url->to('LegendaController', 'show', array('project_id' => $project['id'])), true);
        } else {
            $this->create($values, $errors);
        }

    }

    public function edit(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $legenda = $this->legendaTaskModel->getLegendaById($this->request->getIntegerParam('legenda_id'));

        $this->response->html($this->template->render('LegendaTasks:edit', array(
            'plugin' => 'LegendaTasks',
            'values' => empty($values) ? $legenda : $values,
            'legenda' => $legenda,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function update()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();

        list($valid, $errors) = $this->legendaTasksDataValidator->validate($values);

        if ($valid) {
            $values['project_id'] = $project['id'];
            if ($this->legendaTaskModel->update($this->request->getIntegerParam('id'), $values)) {
                $this->flash->success(t('Legenda atualizado com sucesso.'));
            } else {
                $this->flash->failure(t('Não foi possível atualizar a legenda.'));
            }

            $this->response->redirect($this->helper->url->to('LegendaController', 'show', array()), true);
        } else {
            $this->edit($values, $errors);
        }
    }

    public function confirm()
    {
        $legenda = $this->legendaTaskModel->getLegendaById($this->request->getIntegerParam('id'));

        $this->response->html($this->template->render('LegendaTasks:remove', array(
            'plugin' => 'LegendaTasks',
            'legenda' => $legenda,
        )));
    }

    public function remove()
    {
        $this->checkCSRFParam();

        $legenda = $this->legendaTaskModel->getLegendaById($this->request->getIntegerParam('id'));

        if ($this->legendaTaskModel->remove($legenda['id'])) {
            $this->flash->success(t('Legenda removido com sucesso.'));
        } else {
            $this->flash->failure(t('Não foi possível remover a legenda.'));
        }

        $this->response->redirect($this->helper->url->to('LegendaController', 'show', array()), true);
    }
}
