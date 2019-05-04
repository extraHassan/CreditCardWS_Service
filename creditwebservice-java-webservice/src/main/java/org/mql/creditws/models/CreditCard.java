package org.mql.creditws.models;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.xml.bind.JAXBContext;
import javax.xml.bind.annotation.XmlRootElement;
import java.io.Serializable;
import java.util.Objects;

@XmlRootElement
@Entity
public class CreditCard implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;
    private String number;
    private String expiryDate;
    private Integer controlNumber;
    private String type;

    public CreditCard() {

    }

    public CreditCard(long id, String number, String expiryDate, Integer controlNumber, String type) {
        this.id = id;
        this.number = number;
        this.expiryDate = expiryDate;
        this.controlNumber = controlNumber;
        this.type = type;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNumber() {
        return number;
    }

    public void setNumber(String number) {
        this.number = number;
    }

    public String getExpiryDate() {
        return expiryDate;
    }

    public void setExpiryDate(String expiryDate) {
        this.expiryDate = expiryDate;
    }

    public Integer getControlNumber() {
        return controlNumber;
    }

    public void setControlNumber(Integer controlNumber) {
        this.controlNumber = controlNumber;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        CreditCard that = (CreditCard) o;
        return id == that.id &&
                Objects.equals(number, that.number) &&
                Objects.equals(expiryDate, that.expiryDate) &&
                Objects.equals(controlNumber, that.controlNumber) &&
                Objects.equals(type, that.type);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, number, expiryDate, controlNumber, type);
    }
}
