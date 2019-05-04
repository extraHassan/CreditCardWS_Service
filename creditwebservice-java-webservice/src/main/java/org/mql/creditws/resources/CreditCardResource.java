package org.mql.creditws.resources;

import org.mql.creditws.models.CreditCard;
import org.mql.creditws.models.User;
import org.mql.creditws.service.CreditCardService;
import org.mql.creditws.service.UserService;
import org.mql.creditws.utils.JSONFormatter;

import javax.inject.Inject;
import javax.json.Json;
import javax.json.JsonObject;
import javax.json.JsonObjectBuilder;
import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import java.util.List;
import java.util.Optional;

@Path("creditCard")
public class CreditCardResource {

    @Inject
    private CreditCardService creditCardService;

    @Inject
    private UserService userService;

    @Inject
    private JSONFormatter formatter;

    @GET
    @Produces(MediaType.TEXT_HTML)
    public String sayPlainTextHello() {
        return "<h1><em>Hello Jersey Plain</em><h1>";
    }


    @POST
    @Path("login")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response login(JsonObject loginRequest) {
        String username = loginRequest.getString("username");
        String password = loginRequest.getString("password");
        Optional<User> user = Optional.ofNullable(userService.login(username,password));
       if (user.isPresent())
           return Response.status(Response.Status.ACCEPTED).build();
       return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @GET
    @Path("select/{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response findById(@PathParam("id") long id){
        if (creditCardService.findCreditCard(id)!=null)
            return Response.ok(creditCardService.findCreditCard(id)).build();
        return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @GET
    @Path("validate/{controlNumber}")
    public Response validateCreditCard(@PathParam("controlNumber") long controlNumber) {
        CreditCard card = new CreditCard();
        card.setControlNumber(Integer.parseInt(""+controlNumber));
        if (creditCardService.validateCard(card))
            return Response.status(Response.Status.ACCEPTED).build();
        return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @POST
    @Path("create")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response createCreditCard(JsonObject jsonCreditCard) {
        if(formatter.getCardFromJsonObject(jsonCreditCard).isPresent()){
            CreditCard card = formatter.getCardFromJsonObject(jsonCreditCard).get();
            if(creditCardService.addCard(card))
                return Response.ok(card).build();
        }
        return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @POST
    @Path("update")
    public Response updateCreditCard(JsonObject jsonObject) {
       if (formatter.getCardFromJsonObject(jsonObject).isPresent()){
           CreditCard creditCard = formatter.getCardFromJsonObject(jsonObject).get();
           if (creditCardService.updateCard(creditCard))
               return Response.status(Response.Status.ACCEPTED).build();
       }
       return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @GET
    @Path("delete/{id}")
    public Response deleteCreditCard(@PathParam("id") long id) {
        if (creditCardService.removeCard(id)) {
            return Response.status(Response.Status.ACCEPTED).build();
        }
        return Response.status(Response.Status.NOT_ACCEPTABLE).build();
    }

    @GET
    @Path("findAll")
    @Produces(MediaType.APPLICATION_JSON)
    public Response findAllCreditCards() {
        Optional<List<CreditCard>> creditCards = Optional.ofNullable(creditCardService.findAll());
        if (creditCards.isPresent()) {
            List<CreditCard> cards = creditCards.get();
            if (cards.size()>0){
                JsonObjectBuilder object = Json.createObjectBuilder();
                for (CreditCard card : cards) {
                    object.add(""+card.getId(), formatter.getJsonObjectFromCard(card).get());
                }
                return Response.ok(object.build()).build();
            }
        }
        return Response.status(Response.Status.NOT_FOUND).build();
    }
}
