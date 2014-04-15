<?php
$prof_start_time=microtime(true);

// bootstrap config start
session_start();

define('_DEBUG',        true                );
define('_APP_PATH',     __DIR__.'/app'      );
define('_LIB_PATH',     __DIR__.'/lib'      );
define('_SYS_PATH',     __DIR__.'/nwebfw'   );
define('_WEB_PATH',     '/'                 );

include('config.php');

include(_LIB_PATH.'/DB.php'); // this also defines $DB

// bootstrap config end

include(_SYS_PATH.'/main.php');

$prof_end_time=microtime(true);

if(_DEBUG){
    echo '<div class="fw-debug">'.(($prof_end_time-$prof_start_time)*1000).'ms '.(memory_get_peak_usage()/1024.0).'kb</div>';
}
