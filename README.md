DataBases-Project
=================
<b>Database Tables<b>

Books (32421 entries)             **I can add more, but the sql dump was messed up with a bunch of illegal characters, which made data insertion difficult
ISBN	VARCHAR2(13 BYTE)	
TITLE	VARCHAR2(255 BYTE)	
AUTHOR	VARCHAR2(255 BYTE)	
YEAR_OF_PUBLICATION	NUMBER(38,0)	
PUBLISHER	VARCHAR2(255 BYTE)	
IMAGE_URL_S	VARCHAR2(255 BYTE)	
IMAGE_URL_M	VARCHAR2(255 BYTE)	
IMAGE_URL_L	VARCHAR2(255 BYTE)	

Ratings (329478 entries)
USER_ID	NUMBER(38,0)	
ISBN	VARCHAR2(13 BYTE)	
BOOK_RATING	NUMBER(38,0)	

Users (278858 entries)
USER_ID	NUMBER(38,0)	
LOCATION	VARCHAR2(250 BYTE)	
AGE	NUMBER(38,0)	

Account       **** this is currently empty.  USER_ID needs to start from the last one in the Users table.
USER_ID	NUMBER
USERNAME	VARCHAR2(50 BYTE)
PASSWORD	VARCHAR2(50 BYTE)
