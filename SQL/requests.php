<?php
const SQL_SELECT_ALL_FILMS_RU = "SELECT * FROM filmsRU;";
const SQL_SELECT_ALL_FILMS_UA = "SELECT * FROM filmsUA;";

const SQL_SELECT_ALL_SERIALS_RU = "SELECT * FROM serialsRU;";
const SQL_SELECT_ALL_SERIALS_UA = "SELECT * FROM serialsUA;";

const SQL_SELECT_ALL_CARTOONS_RU = "SELECT * FROM cartoonsRU;";
const SQL_SELECT_ALL_CARTOONS_UA = "SELECT * FROM cartoonsUA;";

/////////////////////////////////////////////////////////////////////////////
const SQL_SELECT_ALL_ABOUT_FILM_RU = "SELECT * FROM filmsRU WHERE name = ?;";
const SQL_SELECT_ALL_ABOUT_FILM_UA = "SELECT * FROM filmsUA WHERE name = ?;";

const SQL_SELECT_ALL_ABOUT_SERIAL_RU = "SELECT * FROM serialsRU WHERE name = ?;";
const SQL_SELECT_ALL_ABOUT_SERIAL_UA = "SELECT * FROM serialsUA WHERE name = ?;";

const SQL_SELECT_ALL_ABOUT_CARTOON_RU = "SELECT * FROM cartoonsRU WHERE name = ?;";
const SQL_SELECT_ALL_ABOUT_CARTOON_UA = "SELECT * FROM cartoonsUA WHERE name = ?;";

///////////////////////////////////////////////////////////////////////////////////////////

const SQL_SELECT_FILM_UA_NAME_BY_FILM_RU_NAME = "SELECT a.name
                                                 FROM filmsUA AS a
                                                 INNER JOIN filmsRU AS b ON a.picture = b.picture
                                                 WHERE b.name = ?;";
const SQL_SELECT_FILM_RU_NAME_BY_FILM_UA_NAME = "SELECT a.name
                                                FROM filmsRU AS a
                                                INNER JOIN filmsUA AS b ON a.picture = b.picture
                                                WHERE b.name = ?;";


const SQL_SELECT_SERIAL_UA_NAME_BY_SERIAL_RU_NAME = "SELECT a.name
                                                 FROM serialsUA AS a
                                                 INNER JOIN serialsRU AS b ON a.picture = b.picture
                                                 WHERE b.name = ?;";
const SQL_SELECT_SERIAL_RU_NAME_BY_SERIAL_UA_NAME = "SELECT a.name
                                                FROM serialsRU AS a
                                                INNER JOIN serialsUA AS b ON a.picture = b.picture
                                                WHERE b.name = ?;";

const SQL_SELECT_CARTOON_UA_NAME_BY_CARTOON_RU_NAME = "SELECT a.name
                                                 FROM cartoonsUA AS a
                                                 INNER JOIN cartoonsRU AS b ON a.picture = b.picture
                                                 WHERE b.name = ?;";
const SQL_SELECT_CARTOON_RU_NAME_BY_CARTOON_UA_NAME = "SELECT a.name
                                                FROM cartoonsRU AS a
                                                INNER JOIN cartoonsUA AS b ON a.picture = b.picture
                                                WHERE b.name = ?;";
//////////////
const SQL_INSERT_USER = "INSERT INTO users(id, name, login, password) VALUES (NULL, ?, ?, ?);";
const SQL_SIGN_IN_USER = "SELECT * FROM users WHERE login = ? AND password = ?;";
const SQL_FIND_PERSON_THIS_LOGIN = "SELECT * FROM users WHERE login = ?;";
/////////////////

const SQL_INSERT_TO_WATCHED = "INSERT INTO userWatched(login,nameRU,nameUA,category) VALUES(?,?,?,?);";
const SQL_INSERT_TO_BEST = "INSERT INTO userBest(login,nameRU,nameUA,category) VALUES(?,?,?,?);";
const SQL_SELECT_FROM_WATCHED = "SELECT * FROM userWatched WHERE (nameRU = ? OR nameUA=?) AND login=?;";
const SQL_SELECT_FROM_BEST = "SELECT * FROM userBest WHERE (nameRU = ? OR nameUA=?) AND login=?;";
 ?>
