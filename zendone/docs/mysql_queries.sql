insert into `zendone`.`users`
  (
    username,
    password,
    first_name,
    last_name,
    role
  )
  values
  (
    'bambi.123',
    md5('tequiero'),
    'Judith',
    'Franco Marrero',
    'user'
  );


insert into `zendone`.`diary` 
  ( 
  	authorid, 
  	title 
  ) 
  values
  (
  	3, 
  	'Primer viaje a Paris'
  );