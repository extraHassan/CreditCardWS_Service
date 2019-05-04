package org.mql.creditws.dao;


import org.mql.creditws.models.CreditCard;

import java.util.List;

public interface CardDao {
    boolean create(CreditCard creditCard);

    boolean update(CreditCard creditCard);

    boolean delete(long id);

    CreditCard select(long id);

    List<CreditCard> selectAll();
}
