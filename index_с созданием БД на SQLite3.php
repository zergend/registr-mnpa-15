<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/layouts/header.php"); ?>

<div class="container">
  <div class="row">
	<?php include("/includes/layouts/sidebar_edit.php"); ?>		

	<?php $db = new SQLite3("new.db");
	$sql = "CREATE TABLE otdely (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  name TEXT NOT NULL
		)";
	$result = $db->exec($sql);	

		$sql = "CREATE TABLE sotrudniki (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  otdely_id INTEGER REFERENCES otdely(id)
		  ON DELETE CASCADE ON
		  DEFERRABLE INITIALLY DEFERRED,
		  f TEXT NOT NULL,
		  i TEXT NOT NULL,
		  o TEXT,
		  dolzhnost TEXT NOT NULL,
		  dr TEXT,
		  phone INTEGER
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE users (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  sotrudniki_id INTEGER REFERENCES sotrudniki(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,  
		  username TEXT NOT NULL,
		  email TEXT,
		  password TEXT NOT NULL
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE status_proekta (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  status TEXT NOT NULL
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE proekt_mnpa (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  status_proekta_id INTEGER REFERENCES status_proekta(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  name TEXT NOT NULL,
		  description TEXT,
		  data_nachala TEXT NOT NULL,
		  data_zaversheniya TEXT
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE files_proect (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  proekt_mnpa_id INTEGER REFERENCES proekt_mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  filename TEXT NOT NULL,
		  path TEXT NOT NULL,
		  description TEXT
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE soglasovanie (
		  sotrudniki_id INTEGER REFERENCES sotrudniki(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  proekt_mnpa_id INTEGER REFERENCES proekt_mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  data_peredachi TEXT NOT NULL,
		  data_soglasovaniya TEXT
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE zamechanie (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  soglasovanie_sotrudniki_id INTEGER REFERENCES soglasovanie(sotrudniki_id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  soglasovanie_proekt_mnpa_id INTEGER REFERENCES soglasovanie(mnpa_id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  description TEXT NOT NULL
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE type_mnpa (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  name TEXT NOT NULL
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE mnpa (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  type_mnpa_id INTEGER REFERENCES type_mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  nomer INTEGER NOT NULL,
		  litera TEXT,
		  name TEXT NOT NULL,
		  description TEXT,
		  data_prinyatiya TEXT NOT NULL,
		  data_otmeny TEXT,
		  podpisan INTEGER NOT NULL DEFAULT 1,
		  razoslan INTEGER NOT NULL DEFAULT 0,
		  deystvuet INTEGER NOT NULL DEFAULT 1,
		  opublikovan_na_saite INTEGER NOT NULL DEFAULT 0,
		  v_registr INTEGER NOT NULL DEFAULT 1
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE files_mnpa (
		  id INTEGER PRIMARY KEY AUTOINCREMENT,
		  mnpa_id INTEGER REFERENCES mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  filename TEXT NOT NULL,
		  path TEXT NOT NULL,
		  description TEXT
		)";
	$result = $db->exec($sql);


		$sql = "CREATE TABLE rassylka (
		  sotrudniki_id INTEGER REFERENCES sotrudniki(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  mnpa_id INTEGER REFERENCES mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  data_rassylki TEXT NOT NULL
		)";
	$result = $db->exec($sql);

		$sql = "CREATE TABLE podpisi (
		  sotrudniki_id INTEGER REFERENCES sotrudniki(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  mnpa_id INTEGER REFERENCES mnpa(id)
		  ON DELETE RESTRICT
		  DEFERRABLE INITIALLY DEFERRED,
		  data_podpisi TEXT NOT NULL
		)";
	$result = $db->exec($sql);
		
		unset($db);
		?>
		
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<div class="panel panel-primary text-center">	
		  <div class="panel-heading">	
			<h2 class="panel-title">Регистр муниципальных нормативных правовых актов <br /> администрации муниципального образования - <br /> Кораблинский муниципальный район Рязанской области</h2>
		  </div>
		  <div class="panel-body">
			<img src="img/mainlogo.png" alt="Герб Кораблинского района">
		  </div>
		   <div class="panel-footer">&copy; 2015. Разработчик - Дёмин С.Н.</div>
		</div>
	</div>
  </div>
</div>
		
<?php include("/includes/layouts/footer.php"); ?>