package database;

import java.sql.Connection;


public class Prueba {
    
     public static void main(String[] args) {
        // prueba de conexion a la base de datos
        try {
            Connection cn=Conexion.getConnection();
            System.out.println("CONEXION CONFORME...");
            cn.close();
        } catch (Exception e) {
               System.out.println("ERROR: "+e.getMessage());
        }
    }
}
