/////////////////////////////////////////////
// Control: Dialog Box functionality
/////////////////////////////////////////////

	qcodo.monthNames = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
	qcodo.monthNamesAbbreviated = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	qcodo.dayNames = new Array("Su","Mo","Tu","We","Th","Fr","Sa");

	qcodo.registerCalendar = function(mixControl, strDtxControlId) {
		// Initialize the Event Handler
		qcodo.handleEvent();

		// Get Control/Wrapper
		var objControl; if (!(objControl = qcodo.getControl(mixControl))) return;
		var objWrapper = objControl.wrapper;

		// Get Linked DateTimeTextbox
		objControl.dateTimeTextBox = qcodo.getControl(strDtxControlId);

		// Get CalendarPane and Hide it
		objControl.calendarPane = document.getElementById(objControl.id + "_cal");
		objControl.calendarPane.style.display = "none";

		objControl.showCalendar = function() {
			if (this.wrapper.parentNode.nodeName.toLowerCase() == 'form') {
				var strPositionArray = this.wrapper.getAbsolutePosition();
				this.calendarPane.style.left = strPositionArray.x + "px";
				this.calendarPane.style.top = strPositionArray.y + "px";						
			} else {
				this.calendarPane.style.left = this.wrapper.offsetLeft + "px";
				this.calendarPane.style.top = this.wrapper.offsetTop + "px";				
			}
			this.calendarPane.style.position = "absolute";
			this.calendarPane.style.zIndex = 10;
			this.calendarPane.style.display = "block";
			this.drawCalendar(0, 0);
		};

		objControl.setDate = function(intYear, intMonth, intDay) {
			this.dateTimeTextBox.value = intDay + " " + qcodo.monthNamesAbbreviated[intMonth] + " " + intYear;
			this.hideCalendar();
			//fire onchange event on textbox (make sure it exists first)
			if (this.dateTimeTextBox.onchange) {this.dateTimeTextBox.onchange()};
		};

		objControl.setToToday = function() {
			var dttToday = new Date();
			this.setDate(dttToday.getFullYear(), dttToday.getMonth(), dttToday.getDate())
		};

		objControl.drawCalendar = function(intYear, intMonth) {
			// Get the "selected" date and the "current" date
			var dttSelected;
			if (this.dateTimeTextBox.value)
				dttSelected = new Date(this.dateTimeTextBox.value);
			var dttToday = new Date();

			// Get the month to view
			var dttMonthToView;
			// If viewing a specific month/year, use it
			if (intYear)
				dttMonthToView = new Date(intYear, intMonth, 1);
			// If no "selected date" use "today"
			else if (!dttSelected || dttSelected == "Invalid Date")
				dttMonthToView = new Date();
			// Otherwise, use the "selected date"
			else
				dttMonthToView = new Date(dttSelected);
			dttMonthToView.setDate(1);
			var intViewMonth = dttMonthToView.getMonth();
			var intViewYear = dttMonthToView.getFullYear();

			// Render the month to view
			var strCalendar = '<table border="0" cellspacing="0"><thead><tr>';
			for (var intDay = 0; intDay < qcodo.dayNames.length; ++intDay) strCalendar += "<th>" + qcodo.dayNames[intDay] + "</th>";
			strCalendar += "</tr></thead>";

			for (var intDaysBack = dttMonthToView.getDay(); intDaysBack > 0; intDaysBack--)
				dttMonthToView.setDate(dttMonthToView.getDate() - 1);

			for (var intWeek = 0; intWeek < 6; intWeek++) {
				strCalendar += '<tr>';
				for (var intDay = 0; intDay < 7; intDay++) {
					var strStyle = (intWeek == 5) ? "lastRow " : "";
					if ((dttMonthToView.getDate() == dttToday.getDate()) && (dttMonthToView.getMonth() == dttToday.getMonth()) && (dttMonthToView.getFullYear() == dttToday.getFullYear()))
						strStyle += 'today ';
					if (dttSelected && (dttMonthToView.getDate() == dttSelected.getDate()) && (dttMonthToView.getMonth() == dttSelected.getMonth()) && (dttMonthToView.getFullYear() == dttSelected.getFullYear()))
						strStyle += 'selected ';
					if (dttMonthToView.getMonth() != intViewMonth)
						strStyle += 'nonMonth';				
					if (strStyle)
						strStyle = ' class="' + strStyle + '"';

					strCalendar += '<td' + strStyle + '><a href="#" onclick="qc.getC(\'' + this.id + '\').setDate(' +
						dttMonthToView.getFullYear() + ',' + dttMonthToView.getMonth() + ',' + dttMonthToView.getDate() + ');return false;">' +
						dttMonthToView.getDate() + '</a></td>';
					dttMonthToView.setDate(dttMonthToView.getDate() + 1);
				};
				strCalendar += '</tr>';
			};
			strCalendar += '</table>';

			var intViewPreviousMonth = intViewMonth - 1;
			var intViewPreviousYear = intViewYear;
			if (intViewPreviousMonth == -1) {
				intViewPreviousMonth = 11;
				intViewPreviousYear--;
			};
			var strPreviousMonth = intViewPreviousYear + ',' + intViewPreviousMonth;

			var intViewNextMonth = intViewMonth + 1;
			var intViewNextYear = intViewYear;
			if (intViewNextMonth == 12) {
				intViewNextMonth = 0;
				intViewNextYear++;
			};
			var strNextMonth = intViewNextYear + ',' + intViewNextMonth;

			var strPreviousYear = (intViewYear - 1) + ',' + intViewMonth;
			var strNextYear = (intViewYear + 1) + ',' + intViewMonth;

			var strNavigator = '<div class="navigator">';
			strNavigator += '<div class="left"><a href="#" onclick="qc.getC(\'' + this.id + '\').drawCalendar(' + strPreviousMonth + ');return false;">&laquo;</a></div>';
			strNavigator += '<div class="month">' + qcodo.monthNames[intViewMonth] + '</div>';
			strNavigator += '<div class="left"><a href="#" onclick="qc.getC(\'' + this.id + '\').drawCalendar(' + strNextMonth + ');return false;">&raquo;</a></div>';
			strNavigator += '<div class="year"><a href="#" onclick="qc.getC(\'' + this.id + '\').drawCalendar(' + strPreviousYear + ');return false;">&laquo;</a>';
			strNavigator += '<span>' + intViewYear + '</span>';
			strNavigator += '<a href="#" onclick="qc.getC(\'' + this.id + '\').drawCalendar(' + strNextYear + ');return false;">&raquo;</a></div>';
			strNavigator += '</div>';

			var strOptions = '<div class="options">';
			strOptions += '<a href="#" onclick="qc.getC(\'' + this.id + '\').setToToday(); return false;">&quot;Today&quot;</a> &nbsp; &nbsp; ';
			strOptions += '<a href="#" onclick="qc.getC(\'' + this.id + '\').hideCalendar(); return false;">Cancel</a></div>';
			
			this.calendarPane.innerHTML = strNavigator + strCalendar + strOptions;
		};

		objControl.hideCalendar = function() {
			this.calendarPane.style.display = 'none';
		};

		objControl.onclick = objControl.showCalendar;
	};

//////////////////
// Qcodo Shortcuts
//////////////////

	qc.regCAL = qcodo.registerCalendar;