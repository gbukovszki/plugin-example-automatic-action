<?php

namespace Kanboard\Plugin\AutomaticAction\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Swimlane by Business Value
 *
 * @package action
 * @author  Frederic Guillot
 * @author  Gabor Bukovszki
 */
class SwimByValue extends Base
{
    /**
     * Get automatic action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Move task to Swimlane based on Business Value');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_CREATE_UPDATE,
        );
    }

    /**
     * Get the required parameter for the action (defined by the user)
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'swimlane_0' => t('Swimlane name for Sprint candidates'),
            'swimlane_1' => t('Default swimlane name'),
            'swimlane_2' => t('Swimlane name for Epics'),
            'velocity' => t('Team velocity (Sum of complexity per Sprint)'),
        );
    }

    /**
     * Get the required parameter for the event
     *
     * @access public
     * @return string[]
     */
    public function getEventRequiredParameters()
    {
        return array(
            'task_id',
            'project_id',
        );
    }

    /**
     * Execute the action
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        TaskFinderModel->getAll($data['project_id'],)
        swimlaneID = SwimlaneModel->getIdByName($data['project_id'],$DestiantionLane);
        return $this->TaskModificationModel->update(array('id' => $data['task_id'], 'swimlane_id' => $swimlaneID));
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return true;
    }
}
