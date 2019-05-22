<?php


return [
    'adminEmail' => 'mboisselier@jusrionegro.gov.ar',
    'JWT_EXPIRE' => time() - 1, // expirado
    'JWT_SECRET' => getenv('JWT_SECRET') ? getenv('JWT_SECRET') : '123456',
    # Build info
    'buildId' => getenv('BUILD_ID') ? getenv('BUILD_ID') : 'Filesystem',
    'buildUrl' => getenv('BUILD_URL') ? getenv('BUILD_URL') : '',
    'buildTime' => getenv('BUILD_TIME') ? getenv('BUILD_TIME') : 'Ahora',
    'revision' => getenv('REVISION') ? getenv('REVISION') : '',
    # Env params    
    'host' => getenv('NODE') ? getenv('NODE') : 'Local Dev',
    'runMode' => getenv('RUN_MODE') ? getenv('RUN_MODE') : 'dev',
    # Database
    'dbURL' => getenv('DB_URL') ? getenv('DB_URL') : 'mysql:host=db_mysql;dbname=turnos',
    'dbUser' => getenv('DB_USER') ? getenv('DB_USER') : 'root',
    'dbPass' => getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : 'examplePassword123',
    'emailFileTransport' => getenv('EMAIL_MODE') ? getenv('EMAIL_MODE')=='file' : false,
    'adminUser'=> getenv('ADMIN_USER')?[getenv('ADMIN_USER')]:['mariano']
];
