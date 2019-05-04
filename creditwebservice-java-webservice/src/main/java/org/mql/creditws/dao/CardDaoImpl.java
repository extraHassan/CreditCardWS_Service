package org.mql.creditws.dao;

import org.mql.creditws.models.CreditCard;

import javax.ejb.Stateless;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;
import java.util.List;

@Stateless
public class CardDaoImpl implements CardDao {

    @PersistenceContext
    private EntityManager entityManager;

    public boolean create(CreditCard creditCard) {
        try {
            entityManager.merge(creditCard);
            return true;
        }catch (Exception e){
            return false;
        }
    }

    public boolean update(CreditCard creditCard) {
        System.out.println("this is the id card =======> " + creditCard.getId());
        CreditCard creditCard1 = entityManager.find(CreditCard.class,creditCard.getId());
        if (creditCard1 != null){
            entityManager.merge(creditCard);
            return true;
        }
        return false;
    }

    public boolean delete(long id) {
        CreditCard creditCard = entityManager.find(CreditCard.class,id);
        if (creditCard!=null){
            entityManager.remove(creditCard);
            return true;
        }
        return false;
    }

    public CreditCard select(long id) {
        CreditCard creditCard = entityManager.find(CreditCard.class,id);
        return creditCard;
    }

    public List<CreditCard> selectAll() {
        Query query = entityManager.createQuery("select credit from CreditCard credit");
        List<CreditCard> card = query.getResultList();
        return card;
    }
}
