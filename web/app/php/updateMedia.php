<?

/**
 * Copyright 2014 Micc (Media Integration and Communication Center) http://www.micc.unifi.it
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * @author      Media Integration and Communication Center http://www.micc.unifi.it (Micc) <info@micc.unifi.it>
 * @license     Apache License https://github.com/miccunifi/Loki/LICENSE.txt
 * @link        Official page and description: http://www.micc.unifi.it/vim/opensource/loki-a-cross-media-search-engine/
 *              GitHub Repository: https://github.com/miccunifi/Loki
 * 
*/



?><?php
session_start();
include ('../config.php');

$id = $_GET['id'];

$query = "";

if(isset($_GET['title']) && isset($_GET['author'])){
	$query = "UPDATE media SET title = '".$_GET['title']."', author = '".$_GET['author']."' WHERE id_media = ".$id;
} elseif (isset($_GET['title']) && !isset($_GET['author'])){
	$query = "UPDATE media SET title = '".$_GET['title']."' WHERE id_media = ".$id;
} elseif (!isset($_GET['title']) && isset($_GET['author'])){
	$query = "UPDATE media SET author = '".$_GET['author']."' WHERE id_media = ".$id;
}

mysql_query($query) or trigger_error(mysql_error());
if(mysql_affected_rows() == 0){
	echo 'error updating table';
} else {
	echo 'success';
}
?>