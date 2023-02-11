<pre>
<?php

require_once('data.php');

function razvrsti_prvo(array &$r)
{
  rsort($r);
}

function razvrsti_n(array &$r, int $n)
{
  usort($r, function ($a, $b) use ($n) {
    return $b[$n] - $a[$n];
  });
}

function razvrsti_sum(array &$r)
{
  usort($r, function ($a, $b) {
    return array_sum($b) - array_sum($a);
  });
}

function razvrsti_max(array &$r)
{
  usort($r, function ($a, $b) {
    rsort($a);
    rsort($b);
    foreach ($a as $i => $v) {
      if ($v !== $b[$i]) {
        return $b[$i] - $v;
      }
    }
  });
}

function izbrisi_pod_11(array &$r)
{
  foreach ($r as $ime => $rez) {
    $f = array_filter($rez, function ($a) {
      return $a >= 11;
    });
    if (!count($f)) {
      unset($r[$ime]);
    } else {
      $r[$ime] = $f;
    }
  }
}

razvrsti_prvo($rezultati);
print_r($rezultati);

razvrsti_n($rezultati, 2);
print_r($rezultati);

razvrsti_sum($rezultati);
print_r($rezultati);

razvrsti_max($rezultati);
print_r($rezultati);

izbrisi_pod_11($rezultati);
print_r($rezultati);
