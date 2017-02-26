var int_AddDay = 0; // + date
	var int_Night = 2; // lang date
	
	$(document).ready(function() {
		$('#request_ArrivalDate').datepicker({
			minDate: "0",
			maxDate: "+1Y+6M",
			dateFormat: "dd/mm/yy",
			numberOfMonths: 1,
			onSelect: function(e) {
				if (moment(e, "DD/MM/YYYY") >= moment($("#request_DepartureDate").val(), "DD/MM/YYYY")) {
					$("#request_DepartureDate").datepicker( {dateFormat: 'dd/mm/yy'}).val(moment(e, "DD/MM/YYYY").add(int_Night, 'days').format("DD/MM/YYYY"));	
				}
				
				int_Night = moment($("#request_DepartureDate").val(), "DD/MM/YYYY").diff(moment($("#request_ArrivalDate").val(), "DD/MM/YYYY"), 'days');
				$("#request_DepartureDate").datepicker("option", "minDate", moment(e, "DD/MM/YYYY").add(1, 'days').format("DD/MM/YYYY"));	
				$('#calendar-checkin').html(moment(e, "DD/MM/YYYY").format('[<span class="date">]DD[</span> <span class="month">]MMM[</span> <span class="year">]YYYY[</span>]'));
				$('#calendar-checkout').html(moment($("#request_DepartureDate").val(), "DD/MM/YYYY").format('[<span class="date">]DD[</span> <span class="month">]MMM[</span> <span class="year">]YYYY[</span>]'));
			}
		});
		
		$('#request_DepartureDate').datepicker({
			minDate: "0",
			maxDate: "+1Y+6M",
			dateFormat: "dd/mm/yy",
			numberOfMonths: 1,
			onSelect: function(e) {
				int_Night = moment($("#request_DepartureDate").val(), "DD/MM/YYYY").diff(moment($("#request_ArrivalDate").val(), "DD/MM/YYYY"), 'days');
				$('#calendar-checkout').html(moment(e, "DD/MM/YYYY").format('[<span class="date">]DD[</span> <span class="month">]MMM[</span> <span class="year">]YYYY[</span>]'));
			}
		});
		
		$('#calendar-checkin').click(function(){ $('#request_ArrivalDate').datepicker('show'); });
		$('#calendar-checkout').click(function(){ $('#request_DepartureDate').datepicker('show'); });
		
		Datepicker_Init();
	});
	
	function Datepicker_Init()
	{
		$("#request_ArrivalDate").datepicker({dateFormat: 'dd/mm/yy'}).val(moment(new Date()).add(int_AddDay, 'days').format("DD/MM/YYYY"));
		$("#request_DepartureDate").datepicker({dateFormat: 'dd/mm/yy'}).val(moment(new Date()).add(int_AddDay + int_Night, 'days').format("DD/MM/YYYY"));
		$('#calendar-checkin').html(moment($("#request_ArrivalDate").val(), "DD/MM/YYYY").format('[<span class="date">]DD[</span> <span class="month">]MMM[</span> <span class="year">]YYYY[</span>]'));
		$('#calendar-checkout').html(moment($("#request_DepartureDate").val(), "DD/MM/YYYY").format('[<span class="date">]DD[</span> <span class="month">]MMM[</span> <span class="year">]YYYY[</span>]'));
	}
	
$(function(){
			$('.ui-datepicker').css('display','none');
			$('.ui-datepicker').click(function(){ $('.ui-datepicker').css('display','inline'); });
		});