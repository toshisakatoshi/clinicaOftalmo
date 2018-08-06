package controller;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import javax.swing.JOptionPane;

public class Conexao {
    private static final String CONN = "jdbc:mysql://localhost:3306/clinicaOftalmo?zeroDateTimeBehavior=convertToNull";
    private static final String USUARIO = "root";
    private static final String SENHA = "";
    private static final String DRIVER = "com.mysql.jdbc.Driver";
    
    public static boolean executar(String sql){
        
        try {
           Class.forName(DRIVER);
            Connection conn = DriverManager.getConnection(CONN, USUARIO, SENHA);
            java.sql.Statement st = conn.createStatement();
            st.execute(sql);
            return true;
            
        } catch (Exception e){
            JOptionPane.showMessageDialog(null, e.toString());
            return false;
            
        }
    }
    
    public static ResultSet consultar(String sql){
        
        try {
           Class.forName(DRIVER);
            Connection conn = DriverManager.getConnection(CONN, USUARIO, SENHA);
            java.sql.Statement st = conn.createStatement();
            return st.executeQuery(sql);
            
        } catch (Exception e){
            JOptionPane.showMessageDialog(null, e.toString());
            return null;
            
        }
    }
    
}

