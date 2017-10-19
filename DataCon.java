
import java.sql.*;

public class DataCon {

    private Connection con;

    public static void main(String[] args) throws ClassNotFoundException {
        DataCon db = new DataCon();
        db.open();
        db.printTable("users");
        db.close();
    }

    public void open() {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://lamp.scim.brad.ac.uk:50942/lpcovaje", "lpcovaje", "Alegria3");
            System.out.println("Connecting to Database");
            DatabaseMetaData dbmd = con.getMetaData(); // Get MetaData to confirm connection
            System.out.println("Connection to " + dbmd.getDatabaseProductName() + " "
                    + dbmd.getDatabaseProductVersion() + " is opened.\n");
        } 
        
        catch (Exception e) {
	    System.out.println("Cannot open DB connection:");
	    System.out.println("Error: " + e.getMessage() + "\n" + e.toString());
	    e.printStackTrace();
        }
    }
        
    public void close() {
	try {
	    con.close(); // Closing connection to the database
	    System.out.println("\n"+"Connection is closed."); 
	} catch (SQLException e) {
	    System.out.println("Cannot close DB connection");
	    System.out.println("Error: " + e.getMessage());
	}
    }       
public void printTable (String users){
    String el;
    String queryString = "select * from " + users;
    
    try {
        System.out.println("Query: "+queryString);
        System.out.println("Query: "+queryString);
	    Statement stmt = con.createStatement();
	    // Execute the query and get the result-set and meta-data
	    ResultSet rs = stmt.executeQuery(queryString);
	    ResultSetMetaData rsMeta = rs.getMetaData();
	    int noCols = rsMeta.getColumnCount(); // Number of columns in the result-set
	    // Print some meta-data
	    System.out.println("\n"+"MetaData:");
	    for (int c= 1; c<= noCols; c++) {
		System.out.println(rsMeta.getColumnLabel(c)+" "+rsMeta.getColumnTypeName(c));
	    }
	    // Print the result-set
	    System.out.println("\n"+"Results:");
	    while (rs.next()) {
		el=""; for (int c= 1; c<= noCols; c++) {el += rs.getString(c)+" ";}
		System.out.println(el);
	    }
	    rs.close(); stmt.close();
	} catch(SQLException e) { 
	    System.out.println("SQL Error: " + e.getMessage());
    }
}
        
    }

