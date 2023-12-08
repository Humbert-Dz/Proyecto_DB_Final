-- procedimientos almacenados y vistas


-- * vista con toda la información de administradores
create view info_admins as
select adm.id, u.name, u.lastname, u.second_lastname, u.birthday, u.phone, u.email, u.password,
       u.postal_code, u.state, u.town, u.street,u.house_number, u.reference, adm.work_schedule_start, adm.work_schedule_end
       from users u join administrators adm
    on u.id = adm.id order by adm.id asc;
select * from info_admins;


-- * vista con toda la información de usuarios
create view info_users as
select cli.id, u.name, u.lastname, u.second_lastname, u.birthday, u.phone, u.email, u.password,
       u.postal_code, u.state, u.town, u.street,u.house_number, u.reference, cli.username
from users u join clients cli
                  on u.id = cli.id order by cli.id asc;


-- !procedimiento almacenado para buscar las credenciales del administrador en la vista info_admins
DELIMITER //
CREATE PROCEDURE art_LoginAdmin(em varchar(50), pass varchar(100) )
BEGIN
    select * from info_admins where email = em and password = pass;
end //
DELIMITER ;

CALL art_LoginAdmin('isabel@example.com', 'hashedpassword19');


-- !procedimiento almacenado para insertar un nuevo producto
DELIMITER //
CREATE PROCEDURE art_AddProduct(nam varchar(50), wei float, expDate date, cos float, price float, sto int, stat boolean, cat int, img varchar(255), idAdmin int, descr varchar(255))
BEGIN
insert into products (name, weight, expiration_date, cost, price_sale, stock, status, category, image, created_at, added_by, description)
values (nam, wei, expDate, cos, price, sto, stat, cat, img, NOW() ,idAdmin, descr) ;
end //
DELIMITER ;

call art_AddProduct('Ceviche', 0.400, NOW(),  30.0, 500.5, 30.0, 1, 4, 'le.img', 19, 'esta es una descripción del producto' );


-- !procedimiento almacenado para eliminar un producto
DELIMITER //
CREATE PROCEDURE art_DeleteProduct(idP int)
    BEGIN
        DELETE FROM products where id = idP;
    end //
DELIMITER ;

call art_DeleteProduct(20);


-- * vista que muestra toda la información de un producto
create view info_product as
    select p.id, p.image, p.name as name, p.weight, p.expiration_date, c.name as category, p.cost, p.price_sale, (p.price_sale - p.cost) as utilidad , p.description, p.stock, p.status, u.name as added_by
    from categories c join products p on c.id = p.category join administrators adm on p.added_by = adm.id join users u on adm.id = u.id order by p.id asc ;

select * from info_product where id = 11;


-- !procedimiento almacenado para buscar un producto por su nombre
DELIMITER //
CREATE PROCEDURE art_SearchProduct(nom varchar(50))
BEGIN
    select * from info_product where name like concat('%', nom, '%');
end //
DELIMITER ;

call art_SearchProduct('mezca');


-- !procedimiento almacenado para mostrar productos activos o inactivos
DELIMITER //
CREATE PROCEDURE art_SearchProductStatus(stat boolean)
BEGIN
    select * from info_product where status = stat;
end //
DELIMITER ;

CALL art_SearchProductStatus(0);

-- !procedimiento almacenado para filtrar un producto por categoria
DELIMITER //
CREATE PROCEDURE art_CategoryFilter(cate varchar(20))
BEGIN
    select * from info_product where category like concat('%', cate, '%');
end //
DELIMITER ;

call art_CategoryFilter('BEBIDA');

-- !procedimiento que obtiene la cantidad de productos vendidos en un rango de fechas, además obtiene los más o menos vendidos
-- en función de:
-- 1: 10 productos más vendidos, ordena de forma descendente, teniendo en la cima los más vendidos
-- 0: 10 productos menos vendidos, ordena de forma ascendente, teniendo en la cima los menos vendidos
DELIMITER //
    CREATE PROCEDURE art_ProductosVendidos(inicio datetime, fin datetime, mas boolean)
        BEGIN
            select p.name, sum(po.amount) as cantidad_vendidos
                from products p join  products_orders po
                        on p.id = po.id_product join orders o on po.id_order = o.id
                    where o.created_at between inicio and fin and  o.confirmed = 1
                group by p.name
                order by
                    CASE WHEN mas THEN cantidad_vendidos END DESC ,
                    CASE WHEN NOT mas THEN cantidad_vendidos END ASC
                limit 10;
        END //
DELIMITER ;

call art_ProductosVendidos('2023-11-15', '2023-11-15', 1);


-- transacción para actualizar el total de las ordenes
START TRANSACTION;

    UPDATE ORDERS o
    SET unit_price = (
        SELECT SUM(p.price_sale * po.amount) AS total
        FROM PRODUCTS_ORDERS po
                 JOIN PRODUCTS p ON po.id_product = p.id
        WHERE po.id_order = o.id
        GROUP BY po.id_order
    ) WHERE o.confirmed = 1;

COMMIT;

ROLLBACK ;



-- * vista para  procedimiento almacenado para
DELIMITER //
CREATE PROCEDURE art_Utilidades(inicio datetime, fin datetime)
BEGIN

select c.name, sum((p.price_sale - p.cost) * po.amount )as utilidadTotal from categories c join products p
    on c.id = p.category join products_orders po on p.id = po.id_product
    join orders o on po.id_order = o.id where o.confirmed = 1 and o.created_at between inicio and fin group by c.name;

end //
DELIMITER ;

CALL  art_Utilidades('2023-11-15', '2023-11-15');


-- * vista que muestra todos los detalles de una orden
create view detalles_orders as
select o.id, concat(u.name, ' (', c.username ,')') as usuario,
       JSON_ARRAYAGG(
           JSON_OBJECT('producto', p.name, 'cantidad', po.amount)
           ) as producto, o.created_at as fecha, o.unit_price,
       u.state, u.town, u.postal_code, u.street, u.reference, o.confirmed, o.delivery, o.canceled_at
from users u join clients c
    on u.id = c.id join orders o
        on c.id = o.user join products_orders po
            on o.id = po.id_order join products p
                on po.id_product = p.id group by o.id;

delimiter ;

-- !procedimiento almacenado para buscar ordener por su status
DELIMITER //
CREATE PROCEDURE art_filterOrders(filtro int)
BEGIN
    select * from detalles_orders where
                                      CASE filtro
                                          WHEN  0 THEN delivery = 1 and canceled_at is null
                                          WHEN  1 THEN delivery = 0 and canceled_at is null and confirmed = 1
                                          WHEN  2 THEN canceled_at is not null
                                          WHEN  3 THEN confirmed = 0 and canceled_at is null
                                    END;
end //
DELIMITER ;

call art_filterOrders(3);
