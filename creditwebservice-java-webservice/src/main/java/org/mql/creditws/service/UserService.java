package org.mql.creditws.service;


import org.mql.creditws.models.User;

import java.util.Optional;

public class UserService {

    public User login(String username, String password) {
        if (username.equals("extraHassan") && password.equals("root")){
            User user = new User((long) 1,"elmzabi.hassan18@gmail.com","root",true);
            return user;
        }
        return null;
    }
}
