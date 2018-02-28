<?php
session_start();
function con(){
	return new PDO("mysql:host=localhost;dbname=ktb2;", "root","");
}


function islogged(){
		if (!isset($_SESSION['id'])) {
	header('Location: ../loginadmin.php');
	}
}

function isloggedsa(){
		if (!isset($_SESSION['id'])) {
	header('Location: ../systemadminlogin.php');
	}
}


function islogged2(){	
		if (!isset($_SESSION['id'])) {
	header('Location: ../../index.php');
	}
}

// CUSTOMERS

	function addCustomer($data){
		$con = con();

		$sql = "INSERT INTO customers(customer_fname, customer_mname, customer_lname,customer_addr, customer_phone, customer_email, customer_gender,customer_birthdate,customer_password) 
						VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);
		$add = $stmt->execute($data);
		//$set = $con->lastInsertId();
		//$_SESSION['id'] = $set;
		$con = null;

			if(!($add))
				echo '<script> alert("Something went wrong! Please Try Again"); window.location="../../index.php"</script>';
			
	}

	function viewAllCustomers(){
		$con = con();
		$sql = "SELECT * FROM customers";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$con = null;

		return $view;
	}

	function getCustomer($data){
		$con = con();
		$sql = "SELECT * FROM customers WHERE customer_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute($data);
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$con = null;

		return $row;

	}

	function getSingleCustomer($data){
		$con = con();
		$sql = "SELECT * FROM customers WHERE customer_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute($data);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$con = null;

		return $row;

	}

	function updateCustomer($data,$image){
		$con = con();
		if(!empty($image))
		$sql = "UPDATE customers SET customer_fname = ?, customer_mname = ?, customer_lname = ?, customer_email = ?, customer_password = ?, customer_phone = ?, customer_addr = ?, customer_pic = ? WHERE customer_id = ?";
		else
		$sql = "UPDATE customers SET customer_fname = ?, customer_mname = ?, customer_lname = ?, customer_email = ?, customer_password = ?, customer_phone = ?, customer_addr = ?, WHERE customer_id = ?";
	
		$stmt = $con->prepare($sql);
		$update = $stmt->execute($data);
		$con = null;

	}

	//RESTAURANTS

		//Add Restaurant Owner

		function addOwner($data){
			$con = con();
			$sql = "INSERT INTO restaurants(username,password,owner_fname,owner_mname,owner_lname,owner_contact,owner_address,sub_date,sub_exp,sub_id) 
										VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$row = $con->lastInsertId();
			return $row;
			$con = null;
			if(!($add)){
						echo '<script> alert("Something went wrong! Please Try Again"); window.location="../../Paypals/index.php"; </script>';
			}
		}

		function viewAllOwners(){
			$con = con();
			$sql = "SELECT * FROM restaurants";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;
			return $view;
		}

		function getOwner($data){
			$con = con();
			$sql = "SELECT * FROM restaurants WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

		function getSingleOwner($data){
			$con = con();
			$sql = "SELECT * FROM restaurants WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

		function updateOwner($data,$image){
			$con = con();	
			if(!empty($image))
			$sql = "UPDATE restaurants SET username  = ?, password = ?, restaurant_name = ?, restaurant_addr = ?,restaurant_contact = ?, hour_open = ?, hour_close = ?, restaurant_logo = ?, restaurant_desc = ?, max_capacity = ?, maxdate = ?, owner_email = ? WHERE restaurant_id = ?";
			else
			$sql = "UPDATE restaurants SET username  = ?, password = ?, restaurant_name = ?, restaurant_addr = ?,restaurant_contact = ?, hour_open = ?, hour_close = ?, restaurant_desc = ?, max_capacity = ?, maxdate = ?, owner_email = ? WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;
		
		}

		

        function ownerStatus($data){
			$con = con();
			$sql = "UPDATE restaurants SET restaurant_status = ? WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;

				
		}
    //End Restaurant Ownder

		function addPromo($data){
			$con = con();
			$sql = "INSERT INTO promo_restaurant(promo_id,restaurant_id) VALUES(?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}

		function addCombo($data,$image){
			$con = con();
			if(!(empty($image)))
			$sql = "INSERT INTO combo_meals(restaurant_id, cm_name, cm_desc, price, image, cm_number, menu_id) VALUES(?,?,?,?,?,?,?)";
			else
			$sql = "INSERT INTO combo_meals(restaurant_id, cm_name, cm_desc, price, cm_number, menu_id) VALUES(?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}
		function addCombo2($data){
			$con = con();
			$sql = "INSERT INTO combo_meals(restaurant_id, cm_name, cm_desc, price, image, cm_number, menu_id) VALUES(?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}
		function updateCombo($data,$image){
			$con = con();
			if(!(empty($image)))
			$sql = "UPDATE combo_meals SET restaurant_id = ?, cm_name = ?, cm_desc = ?, price = ?, image = ?, menu_id = ? WHERE cm_id = ?";
			else
			$sql = "UPDATE combo_meals SET restaurant_id = ?, cm_name = ?, cm_desc = ?, price = ?, menu_id = ? WHERE cm_id = ?";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}


		

		//Add Restaurant Information
		function visit($data){
			$con = con();
			$sql = "INSERT INTO visitors(restaurant_id,customer_id) VALUES (?,?)";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$ret = $con->lastInsertId();
			$con = null;
			return $ret;
		}

	

		function visitcount($data){
			$con = con();
			$sql = "UPDATE visitors SET visit_count = visit_count + '1' WHERE restaurant_id = ? AND customer_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;
		}
		function updateRetaurant($data){
			$con = con();
			$sql = "UPDATE restaurants SET restaurant_name = ?, restaurant_desc = ?, restaurant_addr = ?, restaurant_contact = ?, hour_open = ?, hour_close = ?, restaurant_logo = ?, restaurant_status = ? WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;

			if($update){
				echo '<script> alert("Successfully Updated"); window.location="../View/indexadmin.php" </script>';
			}
			else{
				echo '<script> alert("Something went wrong! Please Try Again"); window.location="../"</script>';
			}
		}//End Restaurant Information

		//Add Reservations
		function addReservation($data){
			$con = con();
			$sql = "INSERT INTO reservations(customer_id,restaurant_id,reservation_date,reservation_time,spec_reqs,no_of_guests,reservation_number) 
					VALUES (?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$row = $con->lastInsertId();
			$con = null;

			return $row;
		}
		function addReservation2($data){
			$con = con();
			$sql = "INSERT INTO reservations(customer_id, restaurant_id, table_id, reservation_date, reservation_time, spec_reqs, no_of_guests, reservation_number) 
					VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$row = $con->lastInsertId();
			$con = null;

			return $row;
		}
		function viewAllReservations(){
			$con = con();
			$sql = "SELECT * FROM reservations";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}	
		function viewAllReservations2($data){
			$con = con();
			$sql = "SELECT DATE_FORMAT(reservation_date, '%D %M %Y') as dat, SUM(no_of_guests) as guest FROM reservations WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		function getReservation($data){
			$con = con();
			$sql = "SELECT * FROM reservations WHERE customer_id = ? ORDER BY created desc LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

		function getReservation2($data){
			$con = con();
			$sql = "SELECT * FROM reservations WHERE reservation_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

		function updateReservation($data){
			$con = con();
			$sql = "UPDATE reservations SET customer_id = ?, restaurant_id = ?, reservation_date = ?, reservation_time = ?, res_status = ?, spec_reqs = ?, no_of_guests = ? WHERE reservation_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;

			if($update){
				echo '<script> alert("Successfully Updated"); window.location="../../Model/Restaurant/reservations.php" </script>';
			}
			else{
				echo '<script> alert("Something went wrong! Please Try Again");  window.location="../../Model/Restaurant/reservations.php" </script>';
			}
		}

		function acceptReservation($id){
			$db = con();
			$sql = "UPDATE reservations SET res_status=? WHERE reservation_id = ?";
			$s = $db->prepare($sql);
			$s->execute($id);
			$db = null;
		}

		function ChangeAll($id){
			$db = con();
			$sql = "UPDATE reservations SET res_status = ? WHERE reservation_id = ?";
			$s = $db->prepare($sql);
			$s->execute($id);
			$db = null;
		}


		function deactRes($id){
			$db = con();
			$sql = "UPDATE restaurants SET restaurant_status = ? WHERE restaurant_id = ?";
			$s = $db->prepare($sql);
			$s->execute($id);
			$db = null;
		}

		//End Reservation

		//Add Staff
		function addStaff($data){
				$con =con();
			$sql = "INSERT INTO employees(restaurant_id,staff_number,employee_fname, employee_mname, employee_lname,employee_addr, employee_phone, employee_gender, employee_ssn,username,password) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		

		}

		function viewAllStaffs(){
			$con = con();
			$sql = "SELECT * FROM employees";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(FPDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		function getStaff($data){
			$con = con();
			$sql = "SELECT * FROM employees WHERE employee_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;
			
			return $row;
		}

		function updateStaff($data){
			$con = con();
			$sql = "UPDATE employees SET employee_fname = ?, employee_mname = ?,employee_lname = ?,employee_addr = ?,employee_phone = ?,employee_gender = ?,employee_ssn = ? WHERE employee_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;
		}

		function deactivateStaff($id){
			$db = con();
			$sql = "UPDATE employees SET employee_status=? WHERE employee_id = ?";
			$s = $db->prepare($sql);
			$s->execute($id);
			$db = null;
		}//End Staff

		//Add Menu
		function addMenu($data,$image){
			$con = con();
			if(!empty($image))
			$sql = "INSERT INTO menus(restaurant_id,m_name,m_desc,mc_id,m_category,m_price,m_image,menu_number) 
					VALUES (?,?,?,?,?,?,?,?)";	
			else
			$sql = "INSERT INTO menus(restaurant_id,m_name,m_desc,mc_id,m_category,m_price,menu_number) 
					VALUES (?,?,?,?,?,?,?)";			
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}	
		
		function addTemp($data){
			$con = con();
			$sql = "INSERT INTO restaurants(temp) VALUES(?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;
		}

		function updateTemp($data){
			$con = con();
			$sql = "UPDATE restaurants SET temp = ? WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;
		}

		function updateProduct($data,$image){
            $con = con();
            if(!empty($image))
			     $sql = "UPDATE menus SET restaurant_id = ?, m_name = ?, m_desc = ?, mc_id = ?, m_category = ?, m_price = ?, m_image = ? WHERE menu_id = ?";
            else
                 $sql = "UPDATE menus SET restaurant_id = ?, m_name = ?, m_desc = ?, mc_id = ?, m_category = ?, m_price = ? WHERE menu_id = ?";
			$stmt = $con->prepare($sql);
			$update =$stmt->execute($data);
			$con = null;
		}

		//Add Food
		

		function viewAllFoods(){
			$con = con();
			$sql = "SELECT * FROM menus WHERE mc_id = 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}
		

		function viewAllBeverages(){
			$con = con();
			$sql = "SELECT * FROM menus WHERE mc_id = 2";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		

		function viewAllDesserts(){
			$con = con();
			$sql = "SELECT * FROM menus WHERE mc_id = 3";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		

		function deactivateProduct($data){
			$db = con();
			$sql = "UPDATE menus SET m_status=? WHERE menu_id = ?";
			$s = $db->prepare($sql);
			$s->execute($data);
			$db = null;
		}//End Food


		function deactivateCM($data){
			$db = con();
			$sql = "UPDATE combo_meals SET status = ? WHERE cm_id = ?";
			$s = $db->prepare($sql);
			$s->execute($data);
			$db = null;
		}//End Food

		
		function viewAllMenuCategory(){
			$con = con();
			$sql = "SELECT * FROM menu_category";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;

		}
		function viewAllProducts(){
			$con = con();
			$sql = "SELECT * FROM menus";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;

		}

		//Add Beverage
		//End Menu

		//Add Schedule
		function addSchedule($data){
			$con = con();
			$sql = "INSERT INTO schedules(restaurant_id,sched_sdate,sched_stime,sched_edate,sched_etime,schedule_number)VALUES (?,?,?,?,?,?)";	
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$set = $con->lastInsertId();
			return $set;
			$con = null;

			 
		}

		function viewAllSchedules(){
			$con = con();
			$sql = "SELECT * FROM schedules";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		function getSchedule($data){
			$con = con();
			$sql = "SELECT * FROM schedules WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

	

		function updateSchedule($data){
			$con = con();
			$sql = "UPDATE schedules SET restaurant_id = ?, sched_sdate = ?, sched_stime = ?, sched_edate = ?, sched_etime = ? WHERE sched_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;

			
			

		}

		function deactivateSchedule($id){
			$con = con();
			$sql = "UPDATE schedules SET status=? WHERE sched_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($id);
			$con = null;
			
		}

		//End Schedule

		//Add Event
		function addEvent($data){
			$con = con();
			$sql = "INSERT INTO events(restaurant_id,event_name,event_venue,event_date,event_time,event_desc,event_number) 
					VALUES (?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$add = $stmt->execute($data);
			$con = null;	

		}

		function viewAllEvents(){
			$con = con();
			$sql = "SELECT * FROM events";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $view;
		}

		function getEvent($data){
			$con = con();
			$sql = "SELECT * FROM events WHERE event_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con = null;

			return $row;
		}

		function updateEvent($data){
			$con = con();
			$sql = "UPDATE events SET  event_name = ?, event_venue = ?, event_date = ?, event_time = ?, event_desc = ? WHERE event_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
			$con = null;

		}

		function deactivateEvent($id){
			$con = con();
			$sql = "UPDATE events SET event_status=? WHERE event_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($id);
			$con = null;
		}
		//End Event

		//Table Layout

		//2 or more Queries and Other type of Queries

		function viewCustomerReservation(){
			$con = con();
			$sql = "SELECT * FROM customers c, reservations r WHERE  r.customer_id = c.customer_id";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$con= null;

			return $row;
		}


		//Messages


        //New
        function getRatingByProductId($con, $resId) {
            $query = "SELECT SUM(rate) as rate, COUNT(rate) as count from ratings WHERE restaurant_id = $resId";

              $result = mysqli_query($con, $query);
              $resultSet = mysqli_fetch_assoc($result);
              if($resultSet['count']>0) {
                return ($resultSet['rate']/$resultSet['count']);
              } else {
                return 0;
              }

        }


        function getRate($resId)
        {

                $db = con();

                $sql = "SELECT SUM(rate) as rate, COUNT(rate) as count from ratings WHERE restaurant_id = $resId";

                $s = $db->query($sql);
                $s->execute(array());
                $rate = $s->fetch(PDO::FETCH_ASSOC);
                if($rate['count']>0)
                {
                    return ($rate['rate']/$rate['count']);
                } 
                else 
                {
                    return 0;
                }
        }

        function doneRating($id,$resID)
        {
                $db = con();

                $sql = "SELECT rate FROM ratings WHERE customer_id LIKE '$id' AND restaurant_id LIKE '$resID' ";
                $s = $db->prepare($sql);
                $s->execute(array($id,$resID));
                $rate = $s->fetch(PDO::FETCH_ASSOC);
                return $rate;
        }	


        function getMenu($id)
        {
            $db = con();

            $sql = "SELECT * FROM menus WHERE menu_id =?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            $menu = $stmt->fetch(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }

        function getCombo($data){
			$con = con();
			$sql = "SELECT * FROM combo_meals cm, menus m WHERE m.restaurant_id = ? GROUP BY m.menu_id";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$add = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$con = null;

			return $add;

		}	
		function getCombos($data)
        {
            $db = con();

            $sql = "SELECT * FROM combo_meals WHERE status = 'Available' AND restaurant_id = ? GROUP BY cm_number";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }

        function selectMenu($id)
        {
            $db = con();

            $sql = "SELECT * FROM menus WHERE m_status = 'Available' AND restaurant_id = $id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }
        function getMenu2($data)
        {
            $db = con();

            $sql = "SELECT * FROM menus where menu_id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
		}
		function getM($data)
        {
            $db = con();

            $sql = "SELECT * FROM menus where restaurant_id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }
        function addOrder($id,$c,$d,$e)
        {
            date_default_timezone_set('Asia/Manila');
            $db = con();

            $sql = "INSERT INTO orders(customer_id,restaurant_id,reservation_id,order_number)VALUES(?,?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id,$c,$d,$e));
            $row = $db->lastInsertId();
            return $row;
            $db = null;

            
        }

        function getOrders($data){
        	$con = con();
        	$sql = "SELECT * FROM orders WHERE customer_id = ? ORDER BY order_time DESC LIMIT 1";
        	$stmt = $con->prepare($sql);
        	$stmt->execute($data);
        	$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
        	$con = null;

        	return $view;
        }
        function getOrder($data){
        	$con = con();
        	$sql = "SELECT * FROM orders o, customers c, restaurants r WHERE o.customer_id = c.customer_id AND o.restaurant_id = r.restaurant_id AND o.order_id = ?";
        	$stmt = $con->prepare($sql);
        	$stmt->execute($data);
        	$view = $stmt->fetch(PDO::FETCH_ASSOC);
        	$con = null;

        	return $view;
        }
        
        function addOrderDetails($order,$mid,$qty)
        {
            $db = con();
            $sql = "INSERT INTO order_details(order_id,menu_id,order_qty)VALUES(?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($order,$mid,$qty));
            $db = null;	


        }

        function orderStatus($data){
        	$con = con();
        	$sql = "UPDATE orders SET status = ? WHERE order_id = ?";
        	$stmt = $con->prepare($sql);
        	$update = $stmt->execute($data);
        	$con = null;
        }

         function getPromos()
        {
            $db = con();

            $sql = "SELECT * FROM promos";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }
        function getPromo($data){
            $db = con();

            $sql = "SELECT * FROM promos p, promo_restaurant pr WHERE p.promo_id = pr.promo_id WHERE pr.restaurant_id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $menu;
            $db = null;
        }
        //MAPS
        function getLngLat($rid)
		{
		    $db = con();
		    $sql = "SELECT * FROM restaurants WHERE lat IS NULL AND lng IS NULL AND restaurant_id=$rid";
		    $s = $db->query($sql);
		    // $s->execute(array($rid));
		    $user = $s->fetchAll(PDO::FETCH_ASSOC);
		    $db = null;
			return $user;
		}

		function getLL()
		{
		    $db = con();
		    $sql = "SELECT * FROM restaurants WHERE lat IS NULL AND lng IS NULL";
		    $s = $db->query($sql);
		    // $s->execute(array($rid));
		    $user = $s->fetchall(PDO::FETCH_ASSOC);
		    $db = null;
			return $user;
		}

		function updateLoc($id,$lng,$lat)
		{
		    $db = con();
		    $sql = "UPDATE restaurants SET lat=?, lng=? WHERE restaurant_id=?";
		    $s = $db->prepare($sql);
			$s->execute(array($lng,$lat,$id));
			$db = null;
		}

		function getMap()
		{
		    $db = con();
		    $sql = "SELECT * FROM restaurants";
		    $s = $db->query($sql);
		    $user = $s->fetchAll();
		    $db = null;
		    return $user;
		}

		function getMapbyId($id)
		{
		    $db = con();
		    $sql = "SELECT * FROM restaurants WHERE restaurant_id=$id";
		    $s = $db->query($sql);
		    // $s->execute(array($id));
		    $user = $s->fetch();
		    $db = null;
		    return $user;
		}

		//TABLES
		function getTables($data)
		{
			$db = con();
			$sql = "SELECT * FROM tables t, restaurants r where t.restaurant_id = r.restaurant_id AND t.restaurant_id = ?";
			$s = $db->prepare($sql);
			$s->execute($data);
			$tables = $s->fetchAll(PDO::FETCH_ASSOC);
			$db = null;
			return $tables;
		}

		function changeTable($data)
		{
			$db = con();
			$sql = "UPDATE tables SET status = ? WHERE table_id = ?";
			$s = $db->prepare($sql);
			$s->execute($data);
			$tables = $s->fetchAll(PDO::FETCH_ASSOC);
			$db = null;
		}

		function addTables($data)
		{
			$db = con();
			$sql = "INSERT INTO tables(restaurant_id, table_num, area_desc, maxcapacity, mincapacity, image) VALUES(?,?,?,?,?,?)";
			$s = $db->prepare($sql);
			$s->execute($data);
			$db = null;
		}

		function updateTables($data,$image)
		{
			$db = con();
			if(!empty($image))
                $sql = "UPDATE tables SET restaurant_id = ?, table_num =?, area_desc=?,maxcapacity=?,mincapacity=?, image=?  WHERE table_id=?";
            else 
                $sql = "UPDATE tables SET restaurant_id = ?, table_num =?, area_desc=?,maxcapacity=?,mincapacity=? WHERE table_id=?";
            
			$s = $db->prepare($sql);
			$s->execute($data);
			$db=null;

	
		}

		function cancelReservation($data){
			$con = con();
			$sql = "UPDATE reservations SET reservation_date = ?, reservation_time = ?, no_of_guests = ?, spec_reqs = ? WHERE reservation_id = ?";
			$stmt = $con->prepare($sql);
			$update = $stmt->execute($data);
		}


		function autoAdd($data){
			$con = con();
			$sql2 = "INSERT INTO schedules(restaurant_id,status,schedule_number) VALUES(?,?,?)";
			 $stmt = $con->prepare($sql2);
			 $add = $stmt->execute($data);
			 $set = $con->lastInsertId();
			 return $set;	
			 $con = null;
		}

		function autoAdd2($data){
			$con = con();
			$sql2 = "INSERT INTO schedules(restaurant_id,sched_sdate,status,schedule_number) VALUES(?,?,?,?)";
			 $stmt = $con->prepare($sql2);
			 $add = $stmt->execute($data);
			 $set = $con->lastInsertId();
			 return $set;	
			 $con = null;
		}
		function updateAdd2($data){
			$con = con();
			$sql2 = "UPDATE schedules SET restaurant_id = ?, status = ? WHERE sched_id = ?";
			$stmt = $con->prepare($sql2);
			$add = $stmt->execute($data);
		 	$con = null;
		}

		function getAdd2($data){
			$con = con();
			$sql = "SELECT * FROM schedules WHERE sched_sdate = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $view;
			$con = null;
		}

		function getAdd($data){
			$con = con();
			$sql = "SELECT * FROM schedules WHERE restaurant_id = ? ORDER BY created DESC LIMIT 1";
			$stmt = $con->prepare($sql);
			$stmt->execute($data);
			$view = $stmt->fetch(PDO::FETCH_ASSOC);
			return $view;
			$con = null;
		}
		function updateAdd($data){
			$con = con();
			$sql3 = "UPDATE schedules SET restaurant_id = ?, status = ? WHERE sched_id = ?";
			$stmt = $con->prepare($sql3);
			$update = $stmt->execute($data);
					
		}
		

		function time_ago($date) {
			date_default_timezone_set('Asia/Manila');
		    if (empty($date)) {
		        return "No date provided";
		    }
		    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
		    $now = time();
		    $unix_date = strtotime($date);
		// check validity of date
		    if (empty($unix_date)) {
		        return "Bad date";
		    }
		    if($now != $unix_date){
				// is it future date or past date
			    if ($now > $unix_date) {
			        $difference = $now - $unix_date;
			        $tense = "ago";
			    } else {
			        $difference = $unix_date - $now;
			        $tense = "from now";
			    }
			    
			    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
			        $difference /= $lengths[$j];
			    }
			    $difference = round($difference);
			    if ($difference != 1) {
			        $periods[$j].= "s";
			    }
			    return "$difference $periods[$j] {$tense}";
			 }elseif($now == $unix_date){
			 	$tense = "Just now";
			 	return  "{$tense}";
			 }   

		}

		function loginStaff($u,$p)
		{
			$sql = "SELECT * FROM employees WHERE username = ? AND password =?";
			$con = con();
			$stmt = $con->prepare($sql);
			$stmt->execute(array($u,$p));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			if($row['employee_status']=='Deactivate')
			{
				echo '<script>alert("Your account has not yet been verified"); window.location="../loginadmin.php" </script>';
			}
			elseif($count  > 0)
			{
				$_SESSION['id'] = $row['restaurant_id'];
				header('location:../View/loadingstaff.php?id='.$row['restaurant_id'].'');
			}
			else
			{
				//echo '<script> alert("Wrong username or password"); window.location="../loginadmin.php"  </script>';
			}
			$con = null;
		}

		function getEmail($id)
		{
			$con = con();
			$sql = "SELECT owner_email FROM restaurants WHERE restaurant_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($id);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
			$con = null;
		}

				//admin

		function getAdmin($id)
		{
			$con = con();
			$sql = "SELECT * FROM admin";
			$stmt = $con->prepare($sql);
			$stmt->execute($id);
			$row = $stmt->fetchall(PDO::FETCH_ASSOC);
			return $row;
			$con = null;
		}

			//deactivate user
		function deactivateUser($data){
			$db = con();
			$sql = "UPDATE customers SET customer_status=? WHERE customer_id = ?";
			$s = $db->prepare($sql);
			$s->execute($data);
			$db = null;
		}
?>


