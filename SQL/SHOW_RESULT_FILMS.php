<?php
function ShowAllFilms($data,$lang)
{
  $p_year = $lang->get('P_YEAR');
  $p_country = $lang->get('P_COUNTRY');
  $p_genre = $lang->get('P_GENRE');
  $p_producer = $lang->get('P_PRODUCER');
  $p_starring = $lang->get('P_STARRING');
  $p_time = $lang->get('P_TIME');

  foreach ($data as $d)
  {
    echo "<a href = 'http://u-vision.zzz.com.ua/'>";
    echo "<div class='pre-film'>";

    echo "<nav class='pre-film-name'>";
    echo "<nav>";
    echo "<h6>" . $d['name'] . "</h6>";
    echo "</nav>";
    echo "<nav>";
    echo "<div>";
    echo "<p>" . $d['grade'] . "</p>";
    echo "</div>";
    echo "<div>";
    echo "<img src = '../Media/Images/star.png' alt='rate'>";
    echo "</div>";
    echo "</nav>";
    echo "</nav>";

    echo "<div class='pre-film-content'>";
    echo "<nav>";

    echo "<div class='pre-film-picture'>";
    echo "<img src = '../Media/Images/Films/" . $d['picture'] . "' alt = 'Film picture'>";
    echo "</div>";

    echo "<div class='pre-film-short-info'>";
    echo "<p>" . $p_year . ": " . $d['year'] . "</p>";
    echo "<p>" . $p_country . ": " . $d['country'] . "</p>";
    echo "<p>" . $p_genre . ": " . $d['genre'] . "</p>";
    echo "<p>" . $p_producer . ": " . $d['producer'] . "</p>";
    echo "<p>" . $p_starring . ": " . $d['starring'] . "</p>";
    echo "<p>" . $p_time . ": " . $d['time'] . "</p>";
    echo "</div>";

    echo "</nav>";
    echo "</div>";

    echo "</div>";
    echo "</a>";
  }
}
 ?>
