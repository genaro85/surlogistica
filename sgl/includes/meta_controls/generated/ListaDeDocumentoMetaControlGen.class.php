<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ListaDeDocumento class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ListaDeDocumento object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ListaDeDocumentoMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 * @property-read ListaDeDocumento $ListaDeDocumento the actual ListaDeDocumento data class being edited
	 * @property QListBox $DOCUMENTOIdDOCUMENTOControl
	 * @property-read QLabel $DOCUMENTOIdDOCUMENTOLabel
	 * @property QListBox $PROCESOIdPROCESOControl
	 * @property-read QLabel $PROCESOIdPROCESOLabel
	 * @property QListBox $FASEIdFASEControl
	 * @property-read QLabel $FASEIdFASELabel
	 * @property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * @property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ListaDeDocumentoMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ListaDeDocumento objListaDeDocumento
		 */
		protected $objListaDeDocumento;
		protected $objParentObject;
		/**
		 * @var string TitleVerb
		 */
		protected $strTitleVerb;
		/**
		 * @var boolean EditMode
		 */
		protected $blnEditMode;

		// Controls that allow the editing of ListaDeDocumento's individual data fields
		/**
		 * @var QListBox intDOCUMENTOIdDOCUMENTO
		 */
		protected $lstDOCUMENTOIdDOCUMENTOObject;
		/**
		 * @var QListBox intPROCESOIdPROCESO
		 */
		protected $lstPROCESOIdPROCESOObject;
		/**
		 * @var QListBox intFASEIdFASE
		 */
		protected $lstFASEIdFASEObject;

		// Controls that allow the viewing of ListaDeDocumento's individual data fields
		protected $lblDOCUMENTOIdDOCUMENTO;
		protected $lblPROCESOIdPROCESO;
		protected $lblFASEIdFASE;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ListaDeDocumentoMetaControl to edit a single ListaDeDocumento object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ListaDeDocumento object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ListaDeDocumentoMetaControl
		 * @param ListaDeDocumento $objListaDeDocumento new or existing ListaDeDocumento object
		 */
		 public function __construct($objParentObject, ListaDeDocumento $objListaDeDocumento) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ListaDeDocumentoMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ListaDeDocumento object
			$this->objListaDeDocumento = $objListaDeDocumento;

			// Figure out if we're Editing or Creating New
			if ($this->objListaDeDocumento->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this ListaDeDocumentoMetaControl
		 * @param integer $intDOCUMENTOIdDOCUMENTO primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ListaDeDocumento object creation - defaults to CreateOrEdit
 		 * @return ListaDeDocumentoMetaControl
		 */
		public static function Create($objParentObject, $intDOCUMENTOIdDOCUMENTO = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intDOCUMENTOIdDOCUMENTO)) {
				$objListaDeDocumento = ListaDeDocumento::Load($intDOCUMENTOIdDOCUMENTO);

				// ListaDeDocumento was found -- return it!
				if ($objListaDeDocumento)
					return new ListaDeDocumentoMetaControl($objParentObject, $objListaDeDocumento);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ListaDeDocumento object with PK arguments: ' . $intDOCUMENTOIdDOCUMENTO);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ListaDeDocumentoMetaControl($objParentObject, new ListaDeDocumento());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ListaDeDocumentoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ListaDeDocumento object creation - defaults to CreateOrEdit
		 * @return ListaDeDocumentoMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDOCUMENTOIdDOCUMENTO = QApplication::PathInfo(0);
			return ListaDeDocumentoMetaControl::Create($objParentObject, $intDOCUMENTOIdDOCUMENTO, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ListaDeDocumentoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ListaDeDocumento object creation - defaults to CreateOrEdit
		 * @return ListaDeDocumentoMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intDOCUMENTOIdDOCUMENTO = QApplication::QueryString('intDOCUMENTOIdDOCUMENTO');
			return ListaDeDocumentoMetaControl::Create($objParentObject, $intDOCUMENTOIdDOCUMENTO, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstDOCUMENTOIdDOCUMENTOObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstDOCUMENTOIdDOCUMENTOObject_Create($strControlId = null) {
			$this->lstDOCUMENTOIdDOCUMENTOObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstDOCUMENTOIdDOCUMENTOObject->Name = QApplication::Translate('D O C U M E N T O Id D O C U M E N T O Object');
			$this->lstDOCUMENTOIdDOCUMENTOObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstDOCUMENTOIdDOCUMENTOObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objDOCUMENTOIdDOCUMENTOObjectArray = Documento::LoadAll();
			if ($objDOCUMENTOIdDOCUMENTOObjectArray) foreach ($objDOCUMENTOIdDOCUMENTOObjectArray as $objDOCUMENTOIdDOCUMENTOObject) {
				$objListItem = new QListItem($objDOCUMENTOIdDOCUMENTOObject->__toString(), $objDOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO);
				if (($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject) && ($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO == $objDOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO))
					$objListItem->Selected = true;
				$this->lstDOCUMENTOIdDOCUMENTOObject->AddItem($objListItem);
			}
			return $this->lstDOCUMENTOIdDOCUMENTOObject;
		}

		/**
		 * Create and setup QLabel lblDOCUMENTOIdDOCUMENTO
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDOCUMENTOIdDOCUMENTO_Create($strControlId = null) {
			$this->lblDOCUMENTOIdDOCUMENTO = new QLabel($this->objParentObject, $strControlId);
			$this->lblDOCUMENTOIdDOCUMENTO->Name = QApplication::Translate('D O C U M E N T O Id D O C U M E N T O Object');
			$this->lblDOCUMENTOIdDOCUMENTO->Text = ($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject) ? $this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject->__toString() : null;
			$this->lblDOCUMENTOIdDOCUMENTO->Required = true;
			return $this->lblDOCUMENTOIdDOCUMENTO;
		}

		/**
		 * Create and setup QListBox lstPROCESOIdPROCESOObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPROCESOIdPROCESOObject_Create($strControlId = null) {
			$this->lstPROCESOIdPROCESOObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstPROCESOIdPROCESOObject->Name = QApplication::Translate('P R O C E S O Id P R O C E S O Object');
			$this->lstPROCESOIdPROCESOObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objPROCESOIdPROCESOObjectArray = Proceso::LoadAll();
			if ($objPROCESOIdPROCESOObjectArray) foreach ($objPROCESOIdPROCESOObjectArray as $objPROCESOIdPROCESOObject) {
				$objListItem = new QListItem($objPROCESOIdPROCESOObject->__toString(), $objPROCESOIdPROCESOObject->IdPROCESO);
				if (($this->objListaDeDocumento->PROCESOIdPROCESOObject) && ($this->objListaDeDocumento->PROCESOIdPROCESOObject->IdPROCESO == $objPROCESOIdPROCESOObject->IdPROCESO))
					$objListItem->Selected = true;
				$this->lstPROCESOIdPROCESOObject->AddItem($objListItem);
			}
			return $this->lstPROCESOIdPROCESOObject;
		}

		/**
		 * Create and setup QLabel lblPROCESOIdPROCESO
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPROCESOIdPROCESO_Create($strControlId = null) {
			$this->lblPROCESOIdPROCESO = new QLabel($this->objParentObject, $strControlId);
			$this->lblPROCESOIdPROCESO->Name = QApplication::Translate('P R O C E S O Id P R O C E S O Object');
			$this->lblPROCESOIdPROCESO->Text = ($this->objListaDeDocumento->PROCESOIdPROCESOObject) ? $this->objListaDeDocumento->PROCESOIdPROCESOObject->__toString() : null;
			return $this->lblPROCESOIdPROCESO;
		}

		/**
		 * Create and setup QListBox lstFASEIdFASEObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstFASEIdFASEObject_Create($strControlId = null) {
			$this->lstFASEIdFASEObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstFASEIdFASEObject->Name = QApplication::Translate('F A S E Id F A S E Object');
			$this->lstFASEIdFASEObject->AddItem(QApplication::Translate('- Select One -'), null);
			$objFASEIdFASEObjectArray = Fase::LoadAll();
			if ($objFASEIdFASEObjectArray) foreach ($objFASEIdFASEObjectArray as $objFASEIdFASEObject) {
				$objListItem = new QListItem($objFASEIdFASEObject->__toString(), $objFASEIdFASEObject->IdFASE);
				if (($this->objListaDeDocumento->FASEIdFASEObject) && ($this->objListaDeDocumento->FASEIdFASEObject->IdFASE == $objFASEIdFASEObject->IdFASE))
					$objListItem->Selected = true;
				$this->lstFASEIdFASEObject->AddItem($objListItem);
			}
			return $this->lstFASEIdFASEObject;
		}

		/**
		 * Create and setup QLabel lblFASEIdFASE
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFASEIdFASE_Create($strControlId = null) {
			$this->lblFASEIdFASE = new QLabel($this->objParentObject, $strControlId);
			$this->lblFASEIdFASE->Name = QApplication::Translate('F A S E Id F A S E Object');
			$this->lblFASEIdFASE->Text = ($this->objListaDeDocumento->FASEIdFASEObject) ? $this->objListaDeDocumento->FASEIdFASEObject->__toString() : null;
			return $this->lblFASEIdFASE;
		}



		/**
		 * Refresh this MetaControl with Data from the local ListaDeDocumento object.
		 * @param boolean $blnReload reload ListaDeDocumento from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objListaDeDocumento->Reload();

			if ($this->lstDOCUMENTOIdDOCUMENTOObject) {
					$this->lstDOCUMENTOIdDOCUMENTOObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstDOCUMENTOIdDOCUMENTOObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objDOCUMENTOIdDOCUMENTOObjectArray = Documento::LoadAll();
				if ($objDOCUMENTOIdDOCUMENTOObjectArray) foreach ($objDOCUMENTOIdDOCUMENTOObjectArray as $objDOCUMENTOIdDOCUMENTOObject) {
					$objListItem = new QListItem($objDOCUMENTOIdDOCUMENTOObject->__toString(), $objDOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO);
					if (($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject) && ($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO == $objDOCUMENTOIdDOCUMENTOObject->IdDOCUMENTO))
						$objListItem->Selected = true;
					$this->lstDOCUMENTOIdDOCUMENTOObject->AddItem($objListItem);
				}
			}
			if ($this->lblDOCUMENTOIdDOCUMENTO) $this->lblDOCUMENTOIdDOCUMENTO->Text = ($this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject) ? $this->objListaDeDocumento->DOCUMENTOIdDOCUMENTOObject->__toString() : null;

			if ($this->lstPROCESOIdPROCESOObject) {
					$this->lstPROCESOIdPROCESOObject->RemoveAllItems();
				$this->lstPROCESOIdPROCESOObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objPROCESOIdPROCESOObjectArray = Proceso::LoadAll();
				if ($objPROCESOIdPROCESOObjectArray) foreach ($objPROCESOIdPROCESOObjectArray as $objPROCESOIdPROCESOObject) {
					$objListItem = new QListItem($objPROCESOIdPROCESOObject->__toString(), $objPROCESOIdPROCESOObject->IdPROCESO);
					if (($this->objListaDeDocumento->PROCESOIdPROCESOObject) && ($this->objListaDeDocumento->PROCESOIdPROCESOObject->IdPROCESO == $objPROCESOIdPROCESOObject->IdPROCESO))
						$objListItem->Selected = true;
					$this->lstPROCESOIdPROCESOObject->AddItem($objListItem);
				}
			}
			if ($this->lblPROCESOIdPROCESO) $this->lblPROCESOIdPROCESO->Text = ($this->objListaDeDocumento->PROCESOIdPROCESOObject) ? $this->objListaDeDocumento->PROCESOIdPROCESOObject->__toString() : null;

			if ($this->lstFASEIdFASEObject) {
					$this->lstFASEIdFASEObject->RemoveAllItems();
				$this->lstFASEIdFASEObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objFASEIdFASEObjectArray = Fase::LoadAll();
				if ($objFASEIdFASEObjectArray) foreach ($objFASEIdFASEObjectArray as $objFASEIdFASEObject) {
					$objListItem = new QListItem($objFASEIdFASEObject->__toString(), $objFASEIdFASEObject->IdFASE);
					if (($this->objListaDeDocumento->FASEIdFASEObject) && ($this->objListaDeDocumento->FASEIdFASEObject->IdFASE == $objFASEIdFASEObject->IdFASE))
						$objListItem->Selected = true;
					$this->lstFASEIdFASEObject->AddItem($objListItem);
				}
			}
			if ($this->lblFASEIdFASE) $this->lblFASEIdFASE->Text = ($this->objListaDeDocumento->FASEIdFASEObject) ? $this->objListaDeDocumento->FASEIdFASEObject->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LISTADEDOCUMENTO OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ListaDeDocumento instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveListaDeDocumento() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstDOCUMENTOIdDOCUMENTOObject) $this->objListaDeDocumento->DOCUMENTOIdDOCUMENTO = $this->lstDOCUMENTOIdDOCUMENTOObject->SelectedValue;
				if ($this->lstPROCESOIdPROCESOObject) $this->objListaDeDocumento->PROCESOIdPROCESO = $this->lstPROCESOIdPROCESOObject->SelectedValue;
				if ($this->lstFASEIdFASEObject) $this->objListaDeDocumento->FASEIdFASE = $this->lstFASEIdFASEObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ListaDeDocumento object
				$this->objListaDeDocumento->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ListaDeDocumento instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteListaDeDocumento() {
			$this->objListaDeDocumento->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'ListaDeDocumento': return $this->objListaDeDocumento;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ListaDeDocumento fields -- will be created dynamically if not yet created
				case 'DOCUMENTOIdDOCUMENTOControl':
					if (!$this->lstDOCUMENTOIdDOCUMENTOObject) return $this->lstDOCUMENTOIdDOCUMENTOObject_Create();
					return $this->lstDOCUMENTOIdDOCUMENTOObject;
				case 'DOCUMENTOIdDOCUMENTOLabel':
					if (!$this->lblDOCUMENTOIdDOCUMENTO) return $this->lblDOCUMENTOIdDOCUMENTO_Create();
					return $this->lblDOCUMENTOIdDOCUMENTO;
				case 'PROCESOIdPROCESOControl':
					if (!$this->lstPROCESOIdPROCESOObject) return $this->lstPROCESOIdPROCESOObject_Create();
					return $this->lstPROCESOIdPROCESOObject;
				case 'PROCESOIdPROCESOLabel':
					if (!$this->lblPROCESOIdPROCESO) return $this->lblPROCESOIdPROCESO_Create();
					return $this->lblPROCESOIdPROCESO;
				case 'FASEIdFASEControl':
					if (!$this->lstFASEIdFASEObject) return $this->lstFASEIdFASEObject_Create();
					return $this->lstFASEIdFASEObject;
				case 'FASEIdFASELabel':
					if (!$this->lblFASEIdFASE) return $this->lblFASEIdFASE_Create();
					return $this->lblFASEIdFASE;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to ListaDeDocumento fields
					case 'DOCUMENTOIdDOCUMENTOControl':
						return ($this->lstDOCUMENTOIdDOCUMENTOObject = QType::Cast($mixValue, 'QControl'));
					case 'PROCESOIdPROCESOControl':
						return ($this->lstPROCESOIdPROCESOObject = QType::Cast($mixValue, 'QControl'));
					case 'FASEIdFASEControl':
						return ($this->lstFASEIdFASEObject = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>