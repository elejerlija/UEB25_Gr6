<?php
include 'includes/db_conn.php';

$today = date('Y-m-d');
$year = date('Y');
$month = date('n');
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$monthName = date('F');


$events = [];
$result = mysqli_query($conn, "SELECT name, date FROM events WHERE MONTH(date) = $month AND YEAR(date) = $year");
while ($row = mysqli_fetch_assoc($result)) {
    $events[$row['date']] = $row['name'];
}


echo '<h2 style="text-align: center; color:rgb(246, 250, 248); font-size: 2rem; margin-bottom: 20px;">' . $monthName . ' ' . $year . ' — Event Calendar</h2>';
echo '<div class="calendar-grid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; max-width: 600px; margin: auto;">';


for ($day = 1; $day <= $daysInMonth; $day++) {
    $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
    $isToday = ($dateStr === $today);
    $hasEvent = isset($events[$dateStr]);

    $bgColor = $isToday ? '#3b82f6' : ($hasEvent ? '#10b981' : 'white');
    echo '<div style="padding: 15px; border-radius: 8px; background-color: ' . $bgColor . '; color: black; text-align: center; font-weight: bold; min-height: 60px; display: flex; flex-direction: column; justify-content: center; gap: 4px;">';
    echo "<strong>$day</strong>";
  

if ($hasEvent) {
    echo "<small style='font-size: 0.7rem; font-weight: normal;'>" . htmlspecialchars($events[$dateStr]) . "</small>";
}

    echo '</div>';
}

echo '</div>';
