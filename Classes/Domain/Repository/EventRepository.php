<?php

/**
 * Copyright (c) 2012, ROQUIN B.V. (C), http://www.roquin.nl
 *
 * @author:         J. de Groot
 * @file:           EventRepository.php
 * @description:    News event Repository, extending functionality from the News Repository
 */

/**
 * @package TYPO3
 * @subpackage roq_newsevent
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_RoqNewsevent_Domain_Repository_EventRepository extends Tx_News_Domain_Repository_NewsRepository {

    /**
     * Returns the constraint to determine if a news event is active or not (archived)
     *
     * @param Tx_Extbase_Persistence_QueryInterface $query
     * @return Tx_Extbase_Persistence_QOM_Constraint $constraint
     */
    protected function createIsActiveConstraint(Tx_Extbase_Persistence_QueryInterface $query) {
        /** @var $constraint Tx_Extbase_Persistence_QOM_Constraint */
        $constraint = null;
        $timestamp  = time(); // + date('Z');

        $constraint = $query->logicalOr(
            // future events:
            $query->greaterThan('tx_roqnewsevent_startdate + tx_roqnewsevent_starttime',$timestamp),
            // current multiple day events:
            $query->logicalAnd(
                $query->lessThan('tx_roqnewsevent_startdate + tx_roqnewsevent_starttime',$timestamp),
                $query->greaterThan('tx_roqnewsevent_enddate + tx_roqnewsevent_endtime',$timestamp)
            ),
            // current single day events:
            $query->logicalAnd(
                $query->lessThan('tx_roqnewsevent_startdate + tx_roqnewsevent_starttime',$timestamp),
                $query->greaterThan('tx_roqnewsevent_startdate + tx_roqnewsevent_endtime',$timestamp),
                $query->equals('tx_roqnewsevent_enddate',0)
            )
        );

        return $constraint;
    }

    /**
     * Returns an array of constraints created from a given demand object.
     *
     * @param Tx_Extbase_Persistence_QueryInterface $query
     * @param Tx_News_Domain_Model_DemandInterface $demand
     * @return array<Tx_Extbase_Persistence_QOM_Constraint>
     */
    protected function createConstraintsFromDemand(Tx_Extbase_Persistence_QueryInterface $query, Tx_News_Domain_Model_DemandInterface $demand) {
        $constraints    = array();

        if ($demand->getCategories() && $demand->getCategories() !== '0') {
            $constraints[] = $this->createCategoryConstraint(
                                        $query,
                                        $demand->getCategories(),
                                        $demand->getCategoryConjunction(),
                                        $demand->getIncludeSubCategories()
                    );
        }

            // archived
        if ($demand->getArchiveRestriction() == 'archived') {
            $constraints[] = $query->logicalNot($this->createIsActiveConstraint($query));
            // non-archived (active)
        } elseif ($demand->getArchiveRestriction() == 'active') {
            $constraints[] = $this->createIsActiveConstraint($query);
        }

            // top news
        if ($demand->getTopNewsRestriction() == 1) {
            $constraints[] = $query->equals('istopnews', 1);
        } elseif ($demand->getTopNewsRestriction() == 2) {
            $constraints[] = $query->equals('istopnews', 0);
        }

            // storage page
        if ($demand->getStoragePage() != 0) {
            $pidList = t3lib_div::intExplode(',', $demand->getStoragePage(), TRUE);
            $constraints[]  = $query->in('pid', $pidList);
        }

            // month & year OR year only
        if ($demand->getYear() > 0) {
            if (is_null($demand->getDateField())) {
                throw new InvalidArgumentException('No Datefield is set, therefore no Datemenu is possible!');
            }
            if ($demand->getMonth() > 0) {
                if ($demand->getDay() > 0) {
                    $begin = mktime(0, 0, 0, $demand->getMonth(), $demand->getDay(), $demand->getYear());
                    $end = mktime(23, 59, 59, $demand->getMonth(), $demand->getDay(), $demand->getYear());
                } else {
                    $begin = mktime(0, 0, 0, $demand->getMonth(), 1, $demand->getYear());
                    $end = mktime(23, 59, 59, ($demand->getMonth() + 1), 0, $demand->getYear());
                }
            } else {
                $begin = mktime(0, 0, 0, 1, 1, $demand->getYear());
                $end = mktime(23, 59, 59, 12, 31, $demand->getYear());
            }
            $constraints[] = $query->logicalAnd(
                    $query->greaterThanOrEqual($demand->getDateField(), $begin),
                    $query->lessThanOrEqual($demand->getDateField(), $end)
                );
        }

            // Tags
        if ($demand->getTags()) {
            $constraints[] = $query->contains('tags', $demand->getTags());
        }

            // dummy records, used for UnitTests only!
        if ($demand->getIsDummyRecord()) {
            $constraints[] = $query->equals('isDummyRecord', 1);
        }

            // Search
        if ($demand->getSearch() !== NULL) {
            /* @var $searchObject Tx_News_Domain_Model_Dto_Search */
            $searchObject = $demand->getSearch();

            $searchFields = t3lib_div::trimExplode(',', $searchObject->getFields(), TRUE);
            $searchConstraints = array();

            if (count($searchFields) === 0) {
                throw new UnexpectedValueException('No search fields defined', 1318497755);
            }

            $searchSubject = $searchObject->getSubject();
            foreach($searchFields as $field) {
                if (!empty($searchSubject)) {
                $searchConstraints[] = $query->like($field, '%' . $searchSubject . '%');
                }
            }
            $constraints[] = $query->logicalOr($searchConstraints);
        }

            // Clean not used constraints
        foreach($constraints as $key => $value) {
            if (is_null($value)) {
                unset($constraints[$key]);
            }
        }

        $constraints[] = $query->logicalAnd($query->equals('tx_roqnewsevent_is_event',1));

        return $constraints;
    }
}
?>