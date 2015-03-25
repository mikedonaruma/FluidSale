USE FluidSale;

DROP TRIGGER IF EXISTS updateVisits;

DELIMITER $$

CREATE TRIGGER updateVisits AFTER INSERT ON Sale 
FOR EACH ROW BEGIN
	UPDATE Member 
	SET Member.visits = visits+1
	WHERE Member.mPhone = new.mPhone;
END;
$$





