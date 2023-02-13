CREATE TRIGGER [trgEspelhoVendas] ON Base1.dbo.Vendas
AFTER INSERT, UPDATE, DELETE -- TRIGGER AFTER para evitar erros na escrita por erro na trigger
AS
BEGIN
    
    SET NOCOUNT ON

    -- UPDATE
    IF (EXISTS(SELECT * FROM Inserted) AND EXISTS (SELECT * FROM Deleted))
    BEGIN
        
        UPDATE A
        SET
            A.Dt_Pedido = B.Dt_Pedido,
            A.[Status] = B.[Status],
            A.Quantidade = B.Quantidade,
            A.Valor = B.Valor
        FROM
            Base2.dbo.Vendas A
            JOIN Inserted B ON B.Id_Pedido = A.Id_Pedido
 
    END
    ELSE BEGIN
 
        -- INSERT
        IF (EXISTS(SELECT * FROM Inserted))
        BEGIN
 
            INSERT INTO Base2.dbo.Vendas
            SELECT *
            FROM Inserted
 
        END
        ELSE BEGIN -- DELETE
 
            DELETE A
            FROM 
                Base2.dbo.Vendas A
                JOIN Deleted B ON B.Id_Pedido = A.Id_Pedido
 
        END
 
    END

END