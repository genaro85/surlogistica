<?php
	/**
	 * QListBoxBase.class.php contains QListBoxBase
	 * @package Controls
	 */
	/**
	 * QListBoxBase will render an HTML DropDown or MultiSelect box <SELECT>.
	 * 
	 * It extends {@link QListControl}.  By default, the number of visible rows is set to 1 and
	 * the selection mode is set to single, creating a dropdown select box.
	 *
	 * @property integer $Rows specifies how many rows you want to have shown.
	 * @property string $LabelForRequired 
	 * @property string $LabelForRequiredUnnamed
	 * @property string $ItemStyle {@link QListItemStyle} 
	 * @property string $SelectionMode {@link QSelectionMode} specifies if this is a "Single" or "Multiple" select control.
	 * @see QListItemStyle
	 * @see QSelectionMode
	 * @package Controls
	 */
	abstract class QListBoxBase extends QListControl {
		///////////////////////////
		// Private Member Variables
		///////////////////////////
		
		// APPEARANCE
		private $intRows = 1;
		protected $strLabelForRequired;
		protected $strLabelForRequiredUnnamed;
		protected $objItemStyle = null;

		// BEHAVIOR
		protected $strSelectionMode = QSelectionMode::Single;

		// SETTINGS
		protected $strJavaScripts = 'listbox.js';

		//////////
		// Methods
		//////////
		/**
		 * QControl-Constructor
		 * 
		 * @param QControl|QForm $objParentObject
		 * @param string $strControlId
		 */
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);

			$this->strLabelForRequired = QApplication::Translate('%s is required');
			$this->strLabelForRequiredUnnamed = QApplication::Translate('Required');
			$this->objItemStyle = new QListItemStyle();
		}


		public function ParsePostData() {
			if (array_key_exists($this->strControlId, $_POST)) {
				if (is_array($_POST[$this->strControlId])) {
					// Multi-Select, so find them all
					for ($intIndex = 0; $intIndex < count($this->objItemsArray); $intIndex++) {
						if (array_search($intIndex, $_POST[$this->strControlId]) !== false)
							$this->objItemsArray[$intIndex]->Selected = true;
						else
							$this->objItemsArray[$intIndex]->Selected = false;
					}
				} else {
					// Single-select
					for ($intIndex = 0; $intIndex < count($this->objItemsArray); $intIndex++) {
						if ($_POST[$this->strControlId] == $intIndex)
							$this->objItemsArray[$intIndex]->Selected = true;
						else
							$this->objItemsArray[$intIndex]->Selected = false;
					}
				}
			} else {
				// Multiselect forms with nothing passed via $_POST means that everything was DE selected
				if ($this->strSelectionMode == QSelectionMode::Multiple) {
					for ($intIndex = 0; $intIndex < count($this->objItemsArray); $intIndex++) {
						$this->objItemsArray[$intIndex]->Selected = false;
					}
				}
			}
		}

		public function GetJavaScriptAction() {
			return "onchange";
		}

		public function GetAttributes($blnIncludeCustom = true, $blnIncludeAction = true) {
			$strToReturn = parent::GetAttributes($blnIncludeCustom, $blnIncludeAction);

			if ($this->intRows)
				$strToReturn .= sprintf('size="%s" ', $this->intRows);
			if ($this->strSelectionMode == QSelectionMode::Multiple)
				$strToReturn .= 'multiple="multiple" ';
				
			return $strToReturn;

		}
		/**
		 * Returns the HTML-Code for a single Item
		 * 
		 * @param QListItem $objItem
		 * @param integer $intIndex
		 * @return string resulting HTML
		 */
		protected function GetItemHtml($objItem, $intIndex) {
			// The Default Item Style
			$objStyle = $this->objItemStyle;

			// Apply any Style Override (if applicable)
			if ($objItem->ItemStyle) {
				$objStyle = $objStyle->ApplyOverride($objItem->ItemStyle);
			}

			$strToReturn = sprintf('<option value="%s" %s%s>%s</option>',
				$intIndex,
				($objItem->Selected) ? 'selected="selected"' : "",
				$objStyle->GetAttributes(),
				QApplication::HtmlEntities($objItem->Name)
			);

			return $strToReturn;
		}

		protected function GetControlHtml() {
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s"', $strStyle);

			$strToReturn = sprintf('<select name="%s%s" id="%s" %s%s>', 
						$this->strControlId,
						($this->strSelectionMode == QSelectionMode::Multiple) ? "[]" : "",
						$this->strControlId,
						$this->GetAttributes(),
						$strStyle);

			$strCurrentGroup = null;
			if (is_array($this->objItemsArray)) {
				for ($intIndex = 0; $intIndex < $this->ItemCount; $intIndex++) {
					$objItem = $this->objItemsArray[$intIndex];
					// Figure Out Groups (if applicable)
					if (!is_null($objItem->ItemGroup)) {
						// We've got grouping -- are we in a new or same group?
						if (is_null($strCurrentGroup))
							// New Group
							$strToReturn .= '<optgroup label="' . QApplication::HtmlEntities($objItem->ItemGroup) . '">';							
							
						else if ($strCurrentGroup != $objItem->ItemGroup)
							// Different Group
							$strToReturn .= '</optgroup><optgroup label="' . QApplication::HtmlEntities($objItem->ItemGroup) . '">';

						$strCurrentGroup = $objItem->ItemGroup;
						
					// We've got no (or no more) grouping
					} else {
						if (!is_null($strCurrentGroup)) {
							// End the current group
							$strToReturn .= '</optgroup>';
							$strCurrentGroup = null;
						}
					}
					$strToReturn .= $this->GetItemHtml($objItem, $intIndex);
				}
				
				if (!is_null($strCurrentGroup))
					$strToReturn .= '</optgroup>';
			}
			$strToReturn .= '</select>';

			// If MultiSelect and if NOT required, add a "Reset" button to deselect everything
			if (($this->strSelectionMode == QSelectionMode::Multiple) && (!$this->blnRequired) && ($this->blnEnabled) && ($this->blnVisible))
				$strToReturn .= $this->GetResetButtonHtml();

			return $strToReturn;
		}

		// For multiple-select based listboxes, you must define the way a "Reset" button should look
		abstract protected function GetResetButtonHtml();

		public function Validate() {
			if ($this->blnRequired) {
				if ($this->SelectedIndex == -1) {
					if ($this->strName)
						$this->strValidationError = sprintf($this->strLabelForRequired, $this->strName);
					else
						$this->strValidationError = $this->strLabelForRequiredUnnamed;
					return false;
				}

				if (($this->SelectedIndex == 0) && (strlen($this->SelectedValue) == 0)) {
					if ($this->strName)
						$this->strValidationError = sprintf($this->strLabelForRequired, $this->strName);
					else
						$this->strValidationError = $this->strLabelForRequiredUnnamed;
					return false;
				}
			}

			$this->strValidationError = null;
			return true;
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "Rows": return $this->intRows;
				case "LabelForRequired": return $this->strLabelForRequired;
				case "LabelForRequiredUnnamed": return $this->strLabelForRequiredUnnamed;
				case "ItemStyle": return $this->objItemStyle;
				
				// BEHAVIOR
				case "SelectionMode": return $this->strSelectionMode;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				// APPEARANCE
				case "Rows":
					try {
						$this->intRows = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForRequired":
					try {
						$this->strLabelForRequired = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case "LabelForRequiredUnnamed":
					try {
						$this->strLabelForRequiredUnnamed = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				// BEHAVIOR
				case "SelectionMode":
					try {
						$this->strSelectionMode = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				
				case "ItemStyle":
					try {
						$this->objItemStyle = QType::Cast($mixValue, "QListItemStyle");
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>