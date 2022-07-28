<?php
	class QQN {
		/**
		 * @return QQNodeAppointment
		 */
		static public function Appointment() {
			return new QQNodeAppointment('appointment', null, null);
		}
		/**
		 * @return QQNodeMonthlyService
		 */
		static public function MonthlyService() {
			return new QQNodeMonthlyService('monthly_service', null, null);
		}
		/**
		 * @return QQNodeOperation
		 */
		static public function Operation() {
			return new QQNodeOperation('operation', null, null);
		}
		/**
		 * @return QQNodePerson
		 */
		static public function Person() {
			return new QQNodePerson('person', null, null);
		}
		/**
		 * @return QQNodePersonHasQualification
		 */
		static public function PersonHasQualification() {
			return new QQNodePersonHasQualification('person_has_qualification', null, null);
		}
		/**
		 * @return QQNodePersonInChargeForAppointment
		 */
		static public function PersonInChargeForAppointment() {
			return new QQNodePersonInChargeForAppointment('person_in_charge_for_appointment', null, null);
		}
		/**
		 * @return QQNodeQualification
		 */
		static public function Qualification() {
			return new QQNodeQualification('qualification', null, null);
		}
		/**
		 * @return QQNodeRank
		 */
		static public function Rank() {
			return new QQNodeRank('rank', null, null);
		}
		/**
		 * @return QQNodeTeam
		 */
		static public function Team() {
			return new QQNodeTeam('team', null, null);
		}
	}
?>