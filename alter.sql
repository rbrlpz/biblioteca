ALTER TABLE `libros_categoria` DROP FOREIGN KEY `fk_libros_categoria_libros`
ALTER TABLE `libros_categoria` ADD CONSTRAINT `fk_libros_categoria_libros` FOREIGN KEY (`lic_lib_id`) REFERENCES `biblio`.`libro`(`lib_id`) ON DELETE CASCADE ON UPDATE CASCADE
ALTER TABLE `libros_categoria` DROP FOREIGN KEY `fk_libros_categoria_categoria`
ALTER TABLE `libros_categoria` ADD CONSTRAINT `fk_libros_categoria_categoria` FOREIGN KEY (`lic_cat_id`) REFERENCES `biblio`.`categoria`(`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
ALTER TABLE `libros_autor` DROP FOREIGN KEY `fk_libros_autor_libros`
ALTER TABLE `libros_autor` ADD CONSTRAINT `fk_libros_autor_libros` FOREIGN KEY (`lia_lib_id`) REFERENCES `biblio`.`libro`(`lib_id`) ON DELETE CASCADE ON UPDATE CASCADE
ALTER TABLE `libros_autor` DROP FOREIGN KEY `fk_libros_autor_autor`
ALTER TABLE `libros_autor` ADD CONSTRAINT `fk_libros_autor_autor` FOREIGN KEY (`lia_aut_id`) REFERENCES `biblio`.`autor`(`aut_id`) ON DELETE CASCADE ON UPDATE CASCADE
ALTER TABLE `libros_editorial` DROP FOREIGN KEY `fk_libros_editorial_libros`; 
ALTER TABLE `libros_editorial` ADD CONSTRAINT `fk_libros_editorial_libros` FOREIGN KEY (`lie_lib_id`) REFERENCES `biblio`.`libro`(`lib_id`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `libros_editorial` DROP FOREIGN KEY `fk_libros_editorial_editorial`; 
ALTER TABLE `libros_editorial` ADD CONSTRAINT `fk_libros_editorial_editorial` FOREIGN KEY (`lie_edi_id`) REFERENCES `biblio`.`editorial`(`edi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `prestamo` DROP FOREIGN KEY `fk_prestamo_usuario`; 
ALTER TABLE `prestamo` ADD CONSTRAINT `fk_prestamo_usuario` FOREIGN KEY (`pre_usu_id`) REFERENCES `biblio`.`usuario`(`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `prestamo` DROP FOREIGN KEY `fk_prestamo_libro`; 
ALTER TABLE `prestamo` ADD CONSTRAINT `fk_prestamo_libro` FOREIGN KEY (`pre_lib_id`) REFERENCES `biblio`.`libro`(`lib_id`) ON DELETE CASCADE ON UPDATE CASCADE;
