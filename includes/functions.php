<?php session_start();

	require_once('controller/db.class.php');

	/**
	 *	Get date now
	 *	To get the date time from corresponding timezone
	 *
	 */
	function get_date()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		return $date->format('Y-m-d H:i:s');
	}

	/**
	 *	Show date
	 *	To show date format from database which the format is timestamp
	 *
	 *	@param 		string 		date
	 *
	 */
	function show_date($str) {
        $y = explode(' ', $str);
        $x = explode('-', $y[0]);
        $date = "";    
        $m = (int)$x[1];
        $m = month($m);
        $st = array(1, 21, 31);
        $nd = array(2, 22);
        $rd = array(3, 23);

        if(in_array( $x[2], $st)) {
                $date = $x[2].'st';
        }
        else if(in_array( $x[2], $nd)) {
                $date .= $x[2].'nd';
        }
        else if(in_array( $x[2], $rd)) {
                $date .= $x[2].'rd';
        }
        else {
                $date .= $x[2].'th';
        }
		// $date .= ' ' . $m . ' ' . $x[0];
        $date = $x[2]. ' ' . $m . ' ' . $x[0];

        return $date;
	}

	/**
	 *	Show datetime
	 *	To show date and time format from database which the format is timestamp
	 *
	 *	@param 		string 		date
	 *
	 */
	function show_datetime($str) {
		// Date
        $y = explode(' ', $str);
        $x = explode('-', $y[0]);
        $date = "";    
        $m = (int)$x[1];
        $m = month($m);

        // Time
        $time = explode(':', $y[1]);

		// $date .= ' ' . $m . ' ' . $x[0];
        $date = $x[2]. ' ' . $m . ' ' . $x[0] . ' ' . $time[0] . ':' . $time[1];

        return $date;
	}

?>