<?php
require_once(implode(DIRECTORY_SEPARATOR,array(__DIR__,"..","core",implode(".",array("Api","class","php")))));
require_once(implode(DIRECTORY_SEPARATOR,array(__DIR__,"..","module","qcodo",implode(".",array("configuration","inc","php")))));
var_dump(Api::Call("http://api.hackenberg112.de","QApplication","GenerateOrmCode",array(QCODO_PASSWORD)));