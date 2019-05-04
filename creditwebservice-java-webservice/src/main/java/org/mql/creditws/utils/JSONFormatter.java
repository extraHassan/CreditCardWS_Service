package org.mql.creditws.utils;

import org.mql.creditws.models.CreditCard;

import javax.json.Json;
import javax.json.JsonObject;
import java.util.Optional;

public class JSONFormatter {

    public Optional<CreditCard> getCardFromJsonObject(JsonObject jsonObject){
        CreditCard card = new CreditCard();
        card.setId(Integer.parseInt(jsonObject.getString("id")));
        card.setControlNumber(Integer.parseInt(jsonObject.getString("controlNumber")));
        card.setExpiryDate(jsonObject.getString("expiryDate"));
        card.setType(jsonObject.getString("type"));
        card.setNumber(jsonObject.getString("number"));
        return Optional.ofNullable(card);
    }

    public Optional<JsonObject> getJsonObjectFromCard(CreditCard card){
        JsonObject object1 = Json.createObjectBuilder()
                .add("id",card.getId())
                .add("number", card.getNumber())
                .add("expiryDate", card.getExpiryDate())
                .add("controlNumber", card.getControlNumber())
                .add("type", card.getType()).build();
        return Optional.ofNullable(object1);
    }
}
