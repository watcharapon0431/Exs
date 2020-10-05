<?php
/*
	* v_footer
	* Storage JS path link and JS custom template
	* @input -
	* @output -
	* @author Chutipong
	* @Create Date 2562-08-30
	*/
?>
</div>
<!-- All Jquery -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/waves.js"></script>
<!--Counter js -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- Calendar JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/moment/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/calendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/calendar/dist/cal-init.js"></script>
<!-- Clock Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!-- Color Picker Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/custom.min.js"></script>
<!-- Custom tab JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/cbpFWTabs.js"></script>
<script type="text/javascript">
	(function() {
		[].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
			new CBPFWTabs(el);
		});
	})();
	// set month name
	var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
	var monthNamesEng = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	/*
	 * addDays
	 * addDays into date
	 * @input date, days
	 * @output Newdate
	 * @author Chalongchai
	 * @Update Date 2562-11-29
	 */
	function addDays(date, days) {
		const Newdate = new Date(Number(date))
		Newdate.setDate(date.getDate() + days)
		return Newdate
	}
	/*
	 * check_is_alert
	 * check_is_alert value
	 * @input is_alert_check
	 * @output -
	 * @author Chalongchai
	 * @Update Date 2562-09-10
	 */
	function check_is_alert() {
		// declare is_alert_check = input type checkbox id is_alert
		is_alert_check = $("#is_alert").is(":checked")
		/* Start check is_alert_check = true or false */
		if (is_alert_check == true) {
			$("#alert_day_amt").prop("disabled", false);
		} else {
			$("#alert_day_amt").prop("disabled", true);
			$("#alert_day_amt").val('');
			$('#alert_date').text('')
		}
		$("#is_alert").change(() => {
			is_alert_check = $("#is_alert").is(":checked")
			/* Start check is_alert_check = true or false */
			if (is_alert_check == true) {
				$("#alert_day_amt").prop("disabled", false);
			} else {
				$("#alert_day_amt").prop("disabled", true);
				$("#alert_day_amt").val('');
				$('#alert_date').text('')
			}
		})

		/* Start check is_alert_check = true or false */
	} // end of function

	//function map
	function initmap() {
		//define latitude
		var lat = $("#latitude").val()
		//define longitude
		var lng = $("#longitude").val()
		//define latlng
		var Latlng = new google.maps.LatLng(lat, lng);
		//define infowindow
		var infowindow = new google.maps.InfoWindow()
		//define geocoder			
		var geocoder = new google.maps.Geocoder();
		//define markers in array						
		var markers = []
		//create map
		var map = new google.maps.Map(document.getElementById('map'), {
			center: Latlng,
			zoom: 13,
			mapTypeId: 'roadmap'
		});
		//create marker
		marker = new google.maps.Marker({
			map: map,
			draggable: true,
			animation: google.maps.Animation.DROP,
			position: Latlng
		});
		// push marker into markers
		markers.push(marker)
		$(".use_local").on('click', function() {
			Current_location()
		});
		//call getaddress to show infowindows detail
		getaddress()
		/* Start when marker move update lat and lng */
		google.maps.event.addListener(marker, 'dragend', function() {
			lat = marker.getPosition().lat()
			lng = marker.getPosition().lng()
			getaddress()
		});
		/* End when marker move update lat and lng */
		/* Start add searchbar to google map */
		var input = document.getElementById('searchbox');
		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		/* End add searchbar to google map */
		search()
		/* Start funtion search */
		function search() {
			// Bias the SearchBox results towards current map's viewport.
			map.addListener('bounds_changed', function() {
				searchBox.setBounds(map.getBounds());
			});
			// Listen for the event fired when the user selects a prediction and retrieve
			// more details for that place.
			searchBox.addListener('places_changed', function() {
				var places = searchBox.getPlaces();
				if (places.length == 0) {
					return;
				}

				// For each place, get the icon, name and location.
				var bounds = new google.maps.LatLngBounds();
				places.forEach(function(place) {
					if (!place.geometry) {
						swal({
							title: 'ไม่พบสถานที่ดังกล่าว',
							type: 'warning',
						});
						return;
					}
					// Clear out the old markers.
					markers.forEach(function(marker) {
						marker.setMap(null);
					});
					markers = [];
					marker = new google.maps.Marker({
						map: map,
						draggable: true,
						animation: google.maps.Animation.DROP,
						position: place.geometry.location
					});
					map.setZoom(13);
					markers.push(marker)
					lat = marker.getPosition().lat()
					lng = marker.getPosition().lng()
					getaddress()
					//update location latitude,longitude and address
					google.maps.event.addListener(marker, 'dragend', function() {
						lat = marker.getPosition().lat()
						lng = marker.getPosition().lng()
						getaddress()
					});
					if (place.geometry.viewport) {
						// Only geocodes have viewport.
						bounds.union(place.geometry.viewport);
					} else {
						bounds.extend(place.geometry.location);
					}
				});
				map.fitBounds(bounds);
			});
		}
		/* End funtion search */
		// search latitude when input change
		$("#latitude").change(function() {
			geocodeLatLng(geocoder, map, infowindow);
		});
		// search longitude when input change
		$("#longitude").change(function() {
			geocodeLatLng(geocoder, map, infowindow);
		});
		//set and show address to infowindows
		function getaddress() {
			//set latitude longitude
			var latlng = new google.maps.LatLng(lat, lng);
			geocoder.geocode({
				'latLng': latlng
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results) {
						// get address
						var address = results[0].formatted_address
						var address_second = results[1].formatted_address
						//show info 
						infowindow.setContent(address);
						infowindow.open(map, marker);
						//show info when drag
						google.maps.event.addListener(marker, 'dragend', function() {
							infowindow.setContent(address);
							infowindow.open(map, this);
						});
						//show info when click
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.setContent(address);
							infowindow.open(map, this);
						});
						//get latitude longitude and address to input field
						$(() => {
							$("#latitude").val(lat);
							$("#longitude").val(lng);
							$("#location").val(address);
						})
					}
				}
			});
		}
		// error message
		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
				'ระบุตำแหน่งล้มเหลว' :
				'เบราว์เซอร์ของคุณไม่สนับสนุนการระบุตำแหน่ง');
			infoWindow.open(map, marker);
		}
		// use current location
		function Current_location() {
			//Get Current location
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					// set position on map
					var pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};
					markers.forEach(function(marker) {
						marker.setMap(null);
					});
					markers = [];
					marker = new google.maps.Marker({
						map: map,
						draggable: true,
						animation: google.maps.Animation.DROP,
						position: pos
					});
					// set zoom level
					map.setZoom(13);
					markers.push(marker)
					lat = marker.getPosition().lat()
					lng = marker.getPosition().lng()
					getaddress()
					google.maps.event.addListener(marker, 'dragend', function() {
						lat = marker.getPosition().lat()
						lng = marker.getPosition().lng()
						getaddress()
					});
				}, function() {
					handleLocationError(true, infowindow, map.getCenter());
				});
			} else {
				// Browser doesn't support Geolocation
				handleLocationError(false, infowindow, map.getCenter());
			}
		}
		// search location with latitude longitude
		function geocodeLatLng(geocoder, map, infowindow) {
			var Latlng = new google.maps.LatLng($("#latitude").val(), $("#longitude").val());
			geocoder.geocode({
				'location': Latlng
			}, function(results, status) {
				/* Start check location */
				// if found location
				if (status === 'OK') {
					// if location found
					if (results[0]) {
						markers.forEach(function(marker) {
							marker.setMap(null);
						});
						markers = [];
						marker = new google.maps.Marker({
							position: Latlng,
							map: map,
							draggable: true,
							animation: google.maps.Animation.DROP
						});
						map.setZoom(13);
						markers.push(marker)
						lat = marker.getPosition().lat()
						lng = marker.getPosition().lng()
						getaddress()
						google.maps.event.addListener(marker, 'dragend', function() {
							lat = marker.getPosition().lat()
							lng = marker.getPosition().lng()
							getaddress()
						});
						infowindow.setContent(results[0].formatted_address);
						infowindow.open(map, marker);
					} else {
						// if location not found
						swal({
							title: 'ไม่พบสถานที่',
							type: 'warning',
						});

					}
					// if location not found
				} else {
					swal({
						title: 'ไม่มีพิกัดดังกล่าว',
						type: 'warning',
					});

				}
				/* End check location */
			});
		}
	}

	function detail_map() {
		//define latitude
		var lat = $("#latitude").val()
		//define longitude
		var lng = $("#longitude").val()
		//define latlng
		var Latlng = new google.maps.LatLng(lat, lng);
		//define infowindow
		var infowindow = new google.maps.InfoWindow()
		//define geocoder			
		var geocoder = new google.maps.Geocoder();
		//define markers in array						
		var markers = []
		//create map
		var map = new google.maps.Map(document.getElementById('map'), {
			center: Latlng,
			zoom: 13,
			mapTypeId: 'roadmap'
		});
		//create marker
		marker = new google.maps.Marker({
			map: map,
			draggable: false,
			animation: google.maps.Animation.DROP,
			position: Latlng
		});
		// push marker into markers
		markers.push(marker)
		//call getaddress to show infowindows detail
		getaddress()
		/* Start when marker move update lat and lng */
		google.maps.event.addListener(marker, 'dragend', function() {
			lat = marker.getPosition().lat()
			lng = marker.getPosition().lng()
			getaddress()
		});
		//set and show address to infowindows
		function getaddress() {
			//set latitude longitude
			var latlng = new google.maps.LatLng(lat, lng);
			geocoder.geocode({
				'latLng': latlng
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results) {
						// get address
						var address = results[0].formatted_address
						var address_second = results[1].formatted_address
						//show info 
						infowindow.setContent(address);
						infowindow.open(map, marker);
						//show info when drag
						google.maps.event.addListener(marker, 'dragend', function() {
							infowindow.setContent(address);
							infowindow.open(map, this);
						});
						//show info when click
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.setContent(address);
							infowindow.open(map, this);
						});
						//get latitude longitude and address to input field
						$(() => {
							$("#latitude").val(lat);
							$("#longitude").val(lng);
							$("#location").val(address);
						})
					}
				}
			});
		}
		// error message
		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
				'ระบุตำแหน่งล้มเหลว' :
				'เบราว์เซอร์ของคุณไม่สนับสนุนการระบุตำแหน่ง');
			infoWindow.open(map, marker);
		}
	}
</script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Sweet-Alert  -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<!-- Switchy-Alert  -->
<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
<!-- Bootbox Alert -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/bootbox.locales.min.js"></script>
<!-- Fonts Kanit JS -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/kanit/js/font-selector.js"></script>
<!-- Pnotify JS -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/pines-notify/pnotify.min.js"></script>
<!-- Highcharts -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/highchart/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/highchart/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/highchart/modules/export-data.js"></script>
<!-- Dropzone Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/dropzone-master/dist/dropzone.js"></script>
<!-- Email Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/smtp/smtp.js"></script>
<!-- Export Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/js_export/print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>plugins/bower_components/js_export/jspdf.min.js"></script>
</body>

</html>