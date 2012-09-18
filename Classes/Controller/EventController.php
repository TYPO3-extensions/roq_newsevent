<?php

/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         J. de Groot
 * @file:           EventController.php
 * @description:    News event Controller, extending functionality from the News Controller
 */

/**
 * @package TYPO3
 * @subpackage roq_newsevent
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_RoqNewsevent_Controller_EventController extends Tx_News_Controller_NewsController {

	/**
	 * eventRepository
	 *
	 * @var Tx_RoqNewsevent_Domain_Repository_EventRepository
	 */
	protected $eventRepository;

	/**
	 * injectEventRepository
	 *
	 * @param Tx_RoqNewsevent_Domain_Repository_EventRepository $eventRepository
	 * @return void
	 */
	public function injectEventRepository(Tx_RoqNewsevent_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}

    /**
   	 * Initializes the settings
     *
     * @param array $settings
   	 * @return array $settings
   	 */
   	protected function initializeSettings($settings) {
        if (isset($settings['event']['dateField'])) {
            $settings['dateField'] = $settings['event']['dateField'];
        } else {
            $settings['dateField'] = 'eventStartdate';
        }

        return $settings;
   	}

    /**
     * Create the demand object which define which records will get shown
     *
     * @param array $settings
     * @return Tx_News_Domain_Model_NewsDemand
     */
    protected function eventCreateDemandObjectFromSettings($settings) {
        $demand = parent::createDemandObjectFromSettings($settings);

        // set ordering
        if($demand->getArchiveRestriction() == 'archived') {
            if ($settings['event']['archived']['orderBy']) {
                $demand->setOrder($settings['event']['archived']['orderBy']);
            } else {
                // default ordering for archived events
                $demand->setOrder('tx_roqnewsevent_startdate DESC, tx_roqnewsevent_starttime DESC');
            }
        } else {
            if ($settings['event']['orderBy']) {
                $demand->setOrder($settings['event']['orderBy']);
            } else {
                // default ordering for active events
                $demand->setOrder('tx_roqnewsevent_startdate ASC, tx_roqnewsevent_starttime ASC');
            }
        }

        return $demand;
    }

    /**
     * Render a menu by dates, e.g. years, months or dates
     *
     * @param array|null $overwriteDemand
     * @return void
     */
    public function eventDateMenuAction(array $overwriteDemand = NULL) {
        $this->settings = $this->initializeSettings($this->settings);
        $demand = $this->eventCreateDemandObjectFromSettings($this->settings);

        $eventRecords = $this->eventRepository->findDemanded($demand);

        if (!$dateField = $this->settings['dateField']) {
            $dateField = 'eventStartdate';
        }

        $this->view->assignMultiple(array(
            'listPid' => ($this->settings['listPid'] ? $this->settings['listPid'] : $GLOBALS['TSFE']->id),
            'dateField' => $dateField,
            'events' => $eventRecords,
            'overwriteDemand' => $overwriteDemand,
        ));
    }

    /**
     * Output a list view of news events
     *
     * @param array $overwriteDemand
     * @return string the Rendered view
     */
    public function eventListAction(array $overwriteDemand = NULL) {
        $this->settings = $this->initializeSettings($this->settings);
        $demand = $this->eventCreateDemandObjectFromSettings($this->settings);

        if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== NULL) {
            $demand = $this->overwriteDemandObject($demand, $overwriteDemand);
        }

        $newsRecords = $this->eventRepository->findDemanded($demand);

        $this->view->assignMultiple(array(
            'news' => $newsRecords,
            'overwriteDemand' => $overwriteDemand,
        ));
    }

    /**
     * Single view of a news event record
     *
     * @param Tx_RoqNewsevent_Domain_Model_Event $event
     * @param integer $currentPage current page for optional pagination
     * @return void
     */
    public function eventDetailAction(Tx_RoqNewsevent_Domain_Model_Event $event = NULL, $currentPage = 1) {
        $this->settings = $this->initializeSettings($this->settings);

        if (is_null($event)) {
            $previewNewsId = ((int)$this->settings['singleNews'] > 0) ? $this->settings['singleNews'] : $this->request->getArgument('news');

            if ($this->settings['previewHiddenRecords']) {
                $event = $this->eventRepository->findByUid($previewNewsId, FALSE);
            } else {
                $event = $this->eventRepository->findByUid($previewNewsId);
            }
        }

        $this->view->assignMultiple(array(
            'newsItem' => $event,
            'currentPage' => (int)$currentPage,
        ));

        Tx_News_Utility_Page::setRegisterProperties($this->settings['detail']['registerProperties'], $event);
    }

}
?>