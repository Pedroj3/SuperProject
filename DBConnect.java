package groupproject;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mahadzafarahmed
 */
import java.sql.*;


public class DBConnect {
    
    String databaseURL = "jdbc:mysql://localhost:3306/groupproject?useSSL=false";
    String user = "root";
    String password ="pass123";
    Connection con;
    
    public DBConnect() {
    
    try {
        Class.forName("com.mysql.jdbc.Driver");
        con = DriverManager.getConnection(databaseURL,user,password);
        System.out.println("Connection to the database is successful.");
    }
    
    catch (SQLException e) {
        System.out.println("Error. Invalid username or password.");
    }
    catch (ClassNotFoundException e) {
        System.out.println("Database driver could not be found.");
}
    
    }  
}
