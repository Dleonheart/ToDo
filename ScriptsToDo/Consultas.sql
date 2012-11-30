select GRANTEE, TABLE_NAME, GRANTOR, DBA_TAB_PRIVS.PRIVILEGE as priv_obj, ROLE_SYS_PRIVS.PRIVILEGE as priv_sys
from dba_tab_privs JOIN role_sys_privs on dba_tab_privs.grantee = role_sys_privs.role and dba_tab_privs.grantee IN ('PERPROYECTO', 'DIRPROYECTO', 'DIRAREA', 'INVITADO')
ORDER BY GRANTEE;