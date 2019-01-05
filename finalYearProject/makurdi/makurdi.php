<?php

//*******************************************************************************/
// BEGINING OG CLASS Makurdi
//*******************************************************************************/
class Makurdi{
	
	
	//strnatcasecmp() Compares two strings using a "natural order" algorithm (case-insensitive) 
	//strncasecmp() Binary safe string comparison of the first n characters (case-insensitive) 
	//similar_text()	Calculate the similarity between two strings
	//strip_tags()	Strip HTML and PHP tags from a string
	//stripslashes()	Un-quotes a quoted string
	//substr_compare()	Compares of two strings from a specified start position up to the length of the comparison. The comparison is binary safe and optionally case-sensitive
	//array_key_exists()	Checks if the specified key exists in the array
	//array_values()	Return all the values of an array
	//in_array()	Checks if a value exists in an array

// *******************************************************************************/
// 	user functions available for the labrary
// *******************************************************************************/
// getMakurdi()
// getAllDistrics()
// getDistrictByName()
// getDistrictByZipcode()
// getAllStreets()
// getAllZipcodes() 
// addNewDistrict()
// updateDistrict()
// updateDistrictName()
// updateDistrictZipcode()
// updateDistrictStreets() // not completed
// deleteDistrict() // yet to be biult
// addStreet()
// updateStreet()
// deleteStreet()

//*******************************************************************************/
//*******************************************************************************/
// building of functions to access elements
//*******************************************************************************/
//*******************************************************************************/
	
//*******************************************************************************/
// first let's get the file with all the data
// the file contains all data in json array format
//*******************************************************************************/
	public $message = null;
    public function getMakurdi(){
        try{
			$makurdiData = file_get_contents('makurdi/database.json'); // get data from the json file
			$makurdiData = json_decode($makurdiData, true); // converts data from json to array format
            return $makurdiData; // return the converted array 
        } catch (Exception $e){
            $message = $e->getMessage();
        }
        return false;
    }

//*******************************************************************************/
	// funtion to get all the districts from makurdi
//*******************************************************************************/
	public function getAllDistricts(){
		$allDistricts = [];
		if ( $this->getMakurdi() ){
			foreach( $this->getMakurdi() as $district ){
				$allDistricts[] = $district['name'];
			}
			return $allDistricts;
		}
	}

//*******************************************************************************/
	// function to get a specific district by name
//*******************************************************************************/
	public function getDistrictByName( $districtName ){
		$districtName = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtName); // strip off characters.
		$districtName = strtolower($districtName); 
		if ( $this->getMakurdi() ){
			foreach( $this->getMakurdi() as $district ){
				if( strtolower( $district['name'] ) == $districtName ){
					return $district['streets'];
				}
			}
			return [];
		}
	}

//*******************************************************************************/
	// function to get a specific district by zipcode
//*******************************************************************************/
	public function getDistrictByZipcode( $districtZipcode ){
		$districtZipcode = preg_replace("/[^0-9]/", "", $districtZipcode);  // strip off letters, special characters and white spaces
		if ( $this->getMakurdi() ){
			foreach( $this->getMakurdi() as $district ){
				if( $district['zipcode'] == $districtZipcode ){
					return $district['streets'];
				}
			}
			return [];
		}
	}
	
//*******************************************************************************/
	// function to get all streets in the whole of makurdi
//*******************************************************************************/
	public function getAllStreets(){
		$allStreets = [];
		if ($this->getMakurdi() ){
			foreach( $this->getMakurdi() as $district ){
				foreach( $district['streets'] as $street ){
					$allStreets[] = $street;
				}
			}
			return $allStreets;
		}
	}
	
//*******************************************************************************/
	// function to get all zipcodes in the whole of makurdi
//*******************************************************************************/
	public function getAllZipcodes(){
		$allZipcodes = [];
		if ($this->getMakurdi() ){
			foreach( $this->getMakurdi() as $district ){
				$allZipcodes[] = $district['zipcode'];
			}
			return $allZipcodes;
		}
	}

//*******************************************************************************/
//*******************************************************************************/
// functions to modify makurdi database
// this functions give the user of this library power to create, update and delete 
//*******************************************************************************/
//*******************************************************************************/

//*******************************************************************************/
	// add new district
//*******************************************************************************/
	public function addNewDistrict( $newDistrict ){
		
		if( is_array($newDistrict) ){ 												// check if input is an array
			if( count($newDistrict) !== count($newDistrict, COUNT_RECURSIVE) ){  	// check if array is multidimensional
				if( !is_null($newDistrict) ){ 										// check if array is empty
					if( $this->getMakurdi() ){
						$result = array_push( $this->getMakurdi(), $newDistrict );
						$this->updateMakurdi( $result ); 							// update the general location in the json file
						return true;
					}
				} else { echo 'District to be added must be not be an empty array';}
			} else { echo 'District to be added must be a multidimensional array';}
		} else { echo 'District to be added must be an array'; }
		
	}
	
//*******************************************************************************/
	// update district 
//*******************************************************************************/
	public function updateDistrict( $districtName ){
		if( $this->getMakurdi() ){
			foreach( $this->makurdi as $district ){
				if( isset($district['name'])  == $districtName ){
					
				}
			}
		}
	}
	
//*******************************************************************************/
	// update district name
//*******************************************************************************/
	public function updateDistrictName( $oldName, $newName ){
		$oldName = preg_replace("/[^a-zA-Z0-9\s]/", "", $oldName); // strip off special characters.
		$oldName = strtolower($oldName); 
		$newName = preg_replace("/[^a-zA-Z0-9\s]/", "", $newName); // strip off special characters.
		if( $this->getMakurdi() ){
			$makurdi = $this->getMakurdi();
			foreach( $makurdi as &$district ){  // short form of foreach (array_keys($array) as $key) $value = &$array[$key]
				if( strtolower($district['name']) == $oldName ){
					$district['name'] = $newName;
				} 
			}
			$this->updateMakurdi($makurdi);
		}
	}

//*******************************************************************************/
	// update distric zipcode
//*******************************************************************************/
	public function updateDistrictZipcode( $districtName, $newZipcode ){
		$districtName = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtName); // strip off characters.
		$districtName = strtolower($districtName);
		$newZipcode = preg_replace("/[0-9]/", "", $newZipcode); // strip off all characters except numbers.
		if( $this->getMakurdi() ){
			$makurdi = $this->getMakurdi();
			foreach( $makurdi as &$district ){
				if( strtolower($district['name']) == $districtName ){
					$district['zipcode'] = $newZipcode;
				} 
			}
			$this->updateMakurdi($makurdi);
		}
	}

//*******************************************************************************/
	// update distric streets // not completed
//*******************************************************************************/
	public function updateDistrictStreets( $districtNameOrZipcode, $newStreets ){
		$districtNameOrZipcode = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtNameOrZipcode); // strip off characters.
		$districtNameOrZipcode = strtolower($districtNameOrZipcode);
		if( is_array($newStreets) ){
			if( $this->getMakurdi() ){
				$makurdi = $this->getMakurdi();
				foreach( $makurdi as &$district ){
					if( strtolower($district['name']) == $districtNameOrZipcode || strtolower($district['zipcode']) == $districtNameOrZipcode ){
						$district['streets'] = $newStreets;
					} 
				}
				$this->updateMakurdi($makurdi);
			}
		} else { echo 'New streets must be an array'; }	
	}
	
//*******************************************************************************/
	// delete a destrict 
	// yet to be done
//*******************************************************************************/

	
//*******************************************************************************/
	// add street
//*******************************************************************************/
	public function addStreet( $districtName, $newStreetName ){
		$districtName = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtName); // strip off characters.
		$districtName = strtolower($districtName);
		$newStreetName = preg_replace("/[^a-zA-Z0-9\s]/", "", $newStreetName); // strip off characters.
		if ( $this->getMakurdi() ){
			$makurdi = $this->getMakurdi();
			foreach( $makurdi as &$district ){
				if ( strtolower($district['name']) == $districtName ){
					array_push( $district['streets'], $newStreetName );
				}
			}
			$this->updateMakurdi($makurdi);
		}
	}

//*******************************************************************************/
	// update street
//*******************************************************************************/
	public function updateStreet( $districtName, $oldStreetName, $newStreetName ){
		$districtName = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtName); // strip off characters.
		$districtName = strtolower($districtName);
		
		$oldStreetName = preg_replace("/[^a-zA-Z0-9\s]/", "", $oldStreetName); // strip off characters.
		$oldStreetName = strtolower($oldStreetName);

		$newStreetName = preg_replace("/[^a-zA-Z0-9\s]/", "", $newStreetName); // strip off characters.
		if ( $this->getMakurdi() ){
			$makurdi = $this->getMakurdi();
			foreach( $makurdi as &$district ){
				if ( strtolower($district['name'] ) == $districtName ){
					foreach( $district['streets'] as &$street ){
						if( strtolower(preg_replace("/[^a-zA-Z0-9\s]/", "", $street)) == $oldStreetName ){
							$street = $newStreetName;
						}
					}
				}
			}
			$this->updateMakurdi($makurdi);
		}
	}

//*******************************************************************************/
	// delete street
//*******************************************************************************/
	public function deleteStreet( $districtName, $streetName ){
		$districtName = preg_replace("/[^a-zA-Z0-9\s]/", "", $districtName); // strip off characters.
		$districtName = strtolower($districtName);
		$streetName = preg_replace("/[^a-zA-Z0-9\s]/", "", $streetName); // strip off characters.
		if ( $this->getMakurdi() ){
			$makurdi = $this->getMakurdi();
			foreach( $makurdi as &$district ){
				if ( strtolower($district['name']) == $districtName ){
					$key = array_search( $streetName, $district['streets'] );
					//arr_diff( $district['streets'], array(streetName) );
					unset( $district['streets'][$key] );
					array_values( $district['streets'] );
				}
			}
			$this->updateMakurdi($makurdi);
		}
	}
	
//*******************************************************************************/
	// function to update the json file after any modification
//*******************************************************************************/
	public function updateMakurdi( $content ){
		$content = json_encode($content);
		$update = file_put_contents( 'database.json', $content );
	}
	
} 
//*******************************************************************************/
//  END OF CLASS Makurdi
//*******************************************************************************/



	
	
$obj = new Makurdi();
$obj->deleteStreet('army barrack', 'new Street');

$city = $obj->getMakurdi();
$districts = $obj->getAllDistricts();
$districtName = $obj->getDistrictByName('GRa');
$districtZipcode = $obj->getDistrictByZipcode(97026);
$allStreets = $obj->getAllStreets();
$zipcode = $obj->getAllZipcodes();


//var_dump($obj->getMakurdi());


/*
        $dist = [];
        foreach ($makurdi as $district) {
            if ($district['name'] == 'Army Barrack') {
                array_push($district['streets'], "New street");
                $dist[] = $district['streets'];
            }
            echo "<h3>{$district['name']}</h3>";
            echo "<ul>";
            foreach ($district['streets'] as $street) {
                echo "<li>{$street}</li>";
            }
            echo "</ul>";
        }

        echo json_encode($makurdi);
*/

// looping to print out elements for testing.
		foreach($districtZipcode as $street){
			echo  $street . '<br>';
		}
	foreach($city as $district){
		echo '<h2>' . $district['name']  .': ' . $district['zipcode'] . '</h2>'  ;
		//echo '<h2>' . $district['zipcode'] . '</h2>' ;
		foreach($district['streets'] as $street){
			echo  $street . '<br>';
		}
	} 



	
	
?>