BEGIN
    DBMS_SCHEDULER.CREATE_JOB (
            job_name => '"PROGRA1"."SEND_EMAIL"',
            job_type => 'PLSQL_BLOCK',
            job_action => 'CREATE OR REPLACE PROCEDURE send_mail (172.0.0.1, jpbr93@gmail.com, jpbr93@gmail.com, "hola","hola")',
            number_of_arguments => 0,
            start_date => NULL,
            repeat_interval => NULL,
            end_date => NULL,
            enabled => FALSE,
            auto_drop => FALSE,
            comments => 'SEND_EMAIL_TO_USER');

         
     
 
    DBMS_SCHEDULER.SET_ATTRIBUTE( 
             name => '"PROGRA1"."SEND_EMAIL"', 
             attribute => 'logging_level', value => DBMS_SCHEDULER.LOGGING_OFF);
      
  
    
    DBMS_SCHEDULER.enable(
             name => '"PROGRA1"."SEND_EMAIL"');
END;
/


---------------------------------------------------------
---------------------------procedure para enviar correos
-------------------------------------------------------

CREATE OR REPLACE PROCEDURE send_mail (
  p_mail_host  IN  VARCHAR2,
  p_from       IN  VARCHAR2,
  p_to         IN  VARCHAR2,
  p_subject    IN  VARCHAR2,
  p_message    IN  VARCHAR2)
AS
  l_mail_conn   UTL_SMTP.connection;
BEGIN
  l_mail_conn := UTL_SMTP.open_connection(p_mail_host, 25);
  UTL_SMTP.helo(l_mail_conn, p_mail_host);
  UTL_SMTP.mail(l_mail_conn, p_from);
  UTL_SMTP.rcpt(l_mail_conn, p_to);

  UTL_SMTP.open_data(l_mail_conn);

  UTL_SMTP.write_data(l_mail_conn, 'Date: ' || TO_CHAR(SYSDATE, 'DD-MON-YYYY HH24:MI:SS') || Chr(13));
  UTL_SMTP.write_data(l_mail_conn, 'From: ' || p_from || Chr(13));
  UTL_SMTP.write_data(l_mail_conn, 'Subject: ' || p_subject || Chr(13));
  UTL_SMTP.write_data(l_mail_conn, 'To: ' || p_to || Chr(13));
  UTL_SMTP.write_data(l_mail_conn, '' || Chr(13));
  UTL_SMTP.write_data(l_mail_conn, p_message || Chr(13));

  UTL_SMTP.close_data(l_mail_conn);
  UTL_SMTP.quit(l_mail_conn);
END send_mail;
/
SHOW ERRORS