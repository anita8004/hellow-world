SELECT * FROM `categories` c1 LEFT JOIN `categories` c2 ON c1.parent_sid=c2.sid;