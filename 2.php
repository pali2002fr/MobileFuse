<?php
/*
CREATE DATABASE cache;

USE cache;

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `devices` (`id`, `name`) VALUES
(1, 'Router F1'),
(2, 'Switch 1'),
(3, 'Switch 2'),
(4, 'Server');
*/
class Select {
	protected $pdo;
	protected $columnNames = [];
	protected $tableName;

	public function __construct($host, $db, $user, $pass)
	{
		$dsn = "mysql:host=$host;dbname=$db";
		$opt = [
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];
		try{
			$this->pdo = new \PDO($dsn, $user, $pass, $opt);
		} catch (Exception $e) {
		    echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	public function setColumnNames(array $columns){
		$this->columnNames = $columns;
	}

	public function getColumnNames(): array
	{
		return $this->columnNames;
	}

	public function addColumn($column){
		$this->columnNames[] = $column;
	}

	public function removeColumn($toFind){
		foreach($this->columnNames AS $key => $column){
			if($column == $toFind){
				unset($this->columnNames[$key]);
				break;
			}
		}
	}

	public function setTableName($tableName){
		$this->tableName = $tableName;
	}

	public function getTableName() : String
	{
		return $this->tableName;
	}

	private function generateQuery(): string 
	{
		return "SELECT " . join($this->getColumnNames(), ',') . " FROM " . $this->getTableName();
	}

	public function execute(): array
	{
		$sql = $this->generateQuery();
		return $this->pdo->query($sql)->fetchAll();
	}
}

$s = new Select('localhost:8889', 'cache', 'root', 'root');
$s->setTableName('devices');
$s->setColumnNames(['id']);
$s->addColumn('name');
var_dump($s->execute());