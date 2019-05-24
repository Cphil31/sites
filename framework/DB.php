<?php

interface DB {

    function esc($val);

    function xeq($req);

    function n();

    function tab($classe = 'stdClass');

    function prem($classe = 'stdClass');

    function ins($obj);

    function pk();

    function start();

    function savepoint();

    function rollback();

    function commit();
}
