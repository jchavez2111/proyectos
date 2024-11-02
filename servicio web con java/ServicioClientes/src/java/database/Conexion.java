
package database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
    public static Connection getConnection() throws Exception {
        Connection cn = null;
        try {
            //1- cargar driver en memoria
            String driver = "com.mysql.cj.jdbc.Driver";
            //String driver = "com.mysql.cj.jdbc.Driver";
            Class.forName(driver);
            //url de la base de datos
            String url = "jdbc:mysql://localhost/gestion_clientes";
            // obtener la conexion
            cn = DriverManager.getConnection(url, "root", "");
        } catch (Exception e) {
            throw  e;
        }
        return cn;
    }
    
}
