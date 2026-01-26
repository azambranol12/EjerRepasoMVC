-- Para la aplicación indicada a medida que leo el enunciado distingo dos tipos de usuarios para la base de datos.
-- Por un lado tendremos el usuario admin que tendra el control sobre toda la base de datos.
-- Y por el otro lado teniedno en cuenta los requerimientos de la app el usuario tendra permisos de actualizar, seleccionar e insertar en tablas nada más.

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON deportes.* TO 'admin'@'localhost';

CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'usuario';
GRANT SELECT, INSERT, UPDATE ON deportes.* TO 'usuario'@'localhost';

