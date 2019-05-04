package org.mql.creditws.service;

import org.mql.creditws.dao.CardDao;
import org.mql.creditws.models.CreditCard;

import javax.inject.Inject;
import java.util.List;

public class CreditCardService {

    @Inject
    private CardDao cardDao;

    public boolean validateCard(CreditCard card){
        return card.getControlNumber()%2==0?true:false;
    }

    public CreditCard findCreditCard(long id){
        return cardDao.select(id);
    }

    public boolean addCard(CreditCard card){
        return cardDao.create(card);
    }

    public boolean removeCard(long id){
        return  cardDao.delete(id);
    }

    public  boolean updateCard(CreditCard creditCard){
        return  cardDao.update(creditCard);
    }

    public List<CreditCard> findAll(){
        return cardDao.selectAll();
    }
}
