package controller;

import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;
import model.Categoria;

/**
 *
 * @author assparremberger
 */
public class CategoriaDAO {
    
    public void inserir(Categoria cat){
        String sql = "INSERT INTO categorias "
                + " ( nome ) VALUES  "
                + " ( '" + cat.getNome() + "' ) ; ";
        boolean resposta =  Conexao.executar(sql);
        if( resposta ){
            JOptionPane.showMessageDialog(null, 
                    "Categoria inserida com sucesso!!!");
        }
    }
    
    public void editar(Categoria cat){
        String sql = "UPDATE categorias SET "
        + " nome = '" + cat.getNome() + "'  "
                + " WHERE id = " + cat.getId();
        boolean resposta = Conexao.executar(sql);
        if( resposta ){
            JOptionPane.showMessageDialog(null, 
                    "Categoria editada com sucesso!");
        }
        
    }
    
    public void excluir(Categoria cat){
        String sql = "DELETE FROM categorias "
                 + " WHERE id = " + cat.getId();
        boolean resposta = Conexao.executar(sql);
        if( resposta ){
            JOptionPane.showMessageDialog(null, 
                    "Categoria excluída com sucesso!");
        }
        
    }
    
    
    public static List<Categoria> getCategorias(){
        String sql = "SELECT * FROM categorias ORDER BY nome";
        ResultSet rs =  Conexao.consultar(sql);
        List<Categoria> lista = new ArrayList<>();
        if( rs != null){
            try {
                while ( rs.next() ) {                    
                    Categoria c = new Categoria();
                    c.setId( rs.getInt( "id" ) );
                    c.setNome( rs.getString( "nome" ));
                    lista.add(c);
                }
            } catch (Exception e) {
                
            }
        }
        return lista;
    }
    
    
}
