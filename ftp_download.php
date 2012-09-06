<?php
/**

 * User: Kannan
 * Date: 8/22/12
 * Time: 5:05 PM
 Download files from FTP using this PHP script
 */


// define some variables

$currentDate = date('Ymd');

$local_file = "E:/server backup/{$currentDate}.zip";
$server_file = "/httpdocs/bk/$currentDate.zip";

// set up basic connection
$ftp_server = "xxx.xxx.xxx.xxx";
$ftp_user_name = "yyyyy";
$ftp_user_pass = "zzzzz";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, true);
// try to download $server_file and save to $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully written to $local_file\n";
} else {
    echo "There was a problem\n";
}

// close the connection
ftp_close($conn_id);