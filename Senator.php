<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 5/3/18
 * Time: 8:22 AM
 */

/** inserts new senator into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/

public function insert(\PDO $pdo): void {

	// create query template
	$query = "INSERT INTO senator(senatorId, senatorName, senatorNumLives) VALUES(:senatorId, :senatorName, :senatorNumLives)";
	$statement = $pdo->prepare($query);

	// bind the member variables to the placeholders in the template
	$parameters = ["senatorId" => $this->senatorID->getBytes(), "senatorName" => $this->senatorName, "senatorNumLives" => $this->senatorNumLives];
	$statement->execute($parameters);
}

/** deletes this senator from mysql
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/

public function delete(\PDO $pdo): void {

	// create query template
	$query = "DELETE FROM senator WHERE senatorId = :senatorId";
	$statement = $pdo->prepare($query);

	// bind member vars to placeholder in template
	$parameters = ["senatorId" => $this->senatorId->getBytes()];
	$statement->execute($parameters);
}

/** updates this senator in mysql
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/

public function update(\PDO $pdo): void {

	// create query template
	$query = "UPDATE senator SET senatorName = :senatorName, senatorNumLives = :senatorNumLives WHERE senatorId = :senatorId";
	$statement = $pdo->prepare($query);

	$parameters = ["senatorId" => $this->senatorId->getBytes(), "senatorName" => $this->senatorName, "senatorNumLives" => $this->senatorNumLives];
	$statement->execute($parameters);
}