import java.sql.*;
import java.util.*;
import java.io.*;
import java.util.Scanner;

public class DB {

    private Connection con; // The database connection object

    /** Creates a new instance of DB */
    public DB() {}

    /** Open connection to the database server */
    public void open() {
	String url = 
	    "jdbc:postgresql://pgdbs8.inf.brad.ac.uk/sd2?user=sd2user&password=sd2user";
	// "jdbc:mysql://pgdbs8.inf.brad.ac.uk/sd2?user=sd2user&password=sd2user";
	try {
	    Class.forName("org.postgresql.Driver"); // Loading the PostgreSQL JDBC Driver
	    // Class.forName("org.gjt.mm.mysql.Driver"); // Loading the MySQL driver
	    con = DriverManager.getConnection(url); // Connecting to the database at 'url'
	    System.out.println ("Connecting to the DB:");
	    DatabaseMetaData dbmd = con.getMetaData(); //get MetaData to confirm connection
	    System.out.println("Connection to "+dbmd.getDatabaseProductName()+" "+
			       dbmd.getDatabaseProductVersion()+" is opened.\n");
	} catch (Exception e) {
	    System.out.println("Cannot open DB connection:");
	    System.out.println("Error: " + e.getMessage());
	}
    }

    /** Close the connection to the database server */
    public void close() {
	try {
	    con.close(); // Closing connection to the database
	    System.out.println("\n"+"Connection is closed."); 
	} catch (SQLException e) {
	    System.out.println("Cannot close DB connection");
	    System.out.println("Error: " + e.getMessage());
	}
    }       

    /** Get the ResultSet object for an SQL query */
    public ResultSet getResultSet(String queryString) {
	ResultSet rs = null;
	try {
	    Statement stmt = con.createStatement();
	    // Execute the query and get the result-set and meta-data
	    rs = stmt.executeQuery(queryString);
	} catch(SQLException e) { 
	    System.out.println("SQL Error: " + e.getMessage());
	}
	return rs;
    }

    /** Get an array of results for an SQL query */
    public String[][] getDataArray(String queryString) {
	String[] row;
	Vector<String[]> dataVector = new Vector<String[]>();
	try {
	    Statement stmt = con.createStatement();
	    // Execute the query and get the result-set and meta-data
	    ResultSet rs = stmt.executeQuery(queryString);
	    ResultSetMetaData rsMeta = rs.getMetaData();
	    int noCols = rsMeta.getColumnCount();// Number of columns in the result-set
	    
	    // Construct the data vector
	    while (rs.next()) {
		row = new String[noCols]; 
		for (int c = 1; c <= noCols; c++) {row[c-1] = rs.getString(c);
		}
		dataVector.add(row);
	    }
	    rs.close();
	    stmt.close();
	} catch(SQLException e) {
	    System.out.println("SQL Error: " + e.getMessage());
	}
	
	// Construct the data array
	String[][] dataArray=null;
	int noRows=dataVector.size(); // Number of rows in the result-set
	if (noRows>0) {
	    dataArray=new String[noRows][];
	    for (int r=0; r<noRows; r++) {dataArray[r]=dataVector.elementAt(r);
	    }
	}
	return dataArray;
    }

    /** Get a vector of results for an SQL query */
    public Vector<Vector> getDataVector(String queryString) {
	Vector<String> row;
	Vector<Vector> dataVector = new Vector<Vector>();
	try {
	    Statement stmt = con.createStatement();
	    // Execute the query and get the result-set and meta-data
	    ResultSet rs = stmt.executeQuery(queryString);
	    ResultSetMetaData rsMeta = rs.getMetaData();
	    int noCols = rsMeta.getColumnCount();// Number of columns in the result-set
	    // Construct the data vector 
	    while (rs.next()) {
		row=new Vector<String>();
		for (int c= 1; c<= noCols; c++) {row.add(rs.getString(c));}
		dataVector.add(row);
	    }
	    rs.close(); stmt.close();
	} catch(SQLException e) { 
	    System.out.println("SQL Error: " + e.getMessage());
	}
	return dataVector;
    }

    /** Print the data and meta-data of a database table */
    public void printTable(String tableName) {
	String el;
	String queryString = "select * from "+tableName;
	try {
	    System.out.println("Query: "+queryString);
	    Statement stmt = con.createStatement();
	    // Execute the query and get the result-set and meta-data
	    ResultSet rs = stmt.executeQuery(queryString);
	    ResultSetMetaData rsMeta = rs.getMetaData();
	    int noCols = rsMeta.getColumnCount();// Number of columns in the result-set
	    // Print some meta-data
	    System.out.println("\n"+"MetaData:");
	    for (int c = 1; c <= noCols; c++) {
		System.out.println(rsMeta.getColumnLabel(c) + " " + rsMeta.getColumnTypeName(c));
	    }
	    // Print the result-set
	    System.out.println("\n"+"Results:");
	    while (rs.next()) {
		el = "";
		for (int c = 1; c <= noCols; c++) {
		    el += rs.getString(c) + " ";}
		System.out.println(el);
	    }
	    rs.close();
	    stmt.close();
	} catch(SQLException e) { 
	    System.out.println("SQL Error: " + e.getMessage());
	}
    }

    /** Execute an update SQL command */
    public int update(String updateString) {
	int rowCount = 0;
	try {
	    Statement stmt = con.createStatement();
	    // Execute the query and get the row count 
	    rowCount = stmt.executeUpdate(updateString);
	} catch(SQLException e) { 
	    System.out.println("SQL Error: " + e.getMessage());
	}
	return rowCount;
    }

    /** Test driver */
    public static void main(String args[]) throws Exception {
	//
	DB db = new DB();
	db.open();
     
	       System.out.println("Enter student ub: ");
               Scanner scanner = new Scanner(System.in);
              //String name = scanner.nextLine();
              int ub = scanner.nextInt();
               
	String query = "select UB_Number, Name from projects WHERE UB_Number= '"+ub+"'";
        System.out.println(query);
	//
	String[][] dataArray = db.getDataArray(query);
	int noRows = 0; // number of data rows
	int noCols = 0; // number of data columns
	if (dataArray != null) {
	    noRows = java.lang.reflect.Array.getLength(dataArray);
	   noCols = java.lang.reflect.Array.getLength(dataArray[0]);
	    for (int r = 0; r < noRows; r++) {
		System.out.print("row" + (r+1) + ": ");
		for (int c = 0; c < noCols; c++)
		    System.out.print(dataArray[r][c]+" ");
		System.out.println();
	    }
	}
	//
	System.out.println(db.getDataVector(query));
	//
	db.close();
    }
}