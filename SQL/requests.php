<?php
const SQL_SELECT_ALL_FILMS_RU = "SELECT * FROM filmsRU;";
const SQL_SELECT_ALL_FILMS_UA = "SELECT * FROM filmsUA;";
const SQL_SELECT_ALL_ABOUT_FILM_RU = "SELECT * FROM filmsRU WHERE name = ?;";
const SQL_SELECT_ALL_ABOUT_FILM_UA = "SELECT * FROM filmsUA WHERE name = ?;";




const SQL_SELECT_FILM_UA_NAME_BY_FILM_RU_NAME = "SELECT a.name
                                                 FROM filmsUA AS a
                                                 INNER JOIN filmsRU AS b ON a.picture = b.picture
                                                 WHERE b.name = ?;";
const SQL_SELECT_FILM_RU_NAME_BY_FILM_UA_NAME = "SELECT a.name
                                                FROM filmsRU AS a
                                                INNER JOIN filmsUA AS b ON a.picture = b.picture
                                                WHERE b.name = ?;";
 ?>
