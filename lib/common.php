<?php
//session starten
session_start();

// root Dateipfad
function getRootPath()
{
    return realpath(__DIR__ . '/..');
}

// Dateipfad Datenbank
function getDatabasePath()
{
    return getRootPath() . '/data/data.db';
}

function db()
{
	return new SQLite3("data/data.db");
}

//Datenbank überprüfen
function checkdatabase()
{
	if(is_readable(getDatabasePath()))
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>