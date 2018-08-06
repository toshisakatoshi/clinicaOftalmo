package controller;

import java.nio.charset.CodingErrorAction;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;
import model.Categoria;
import model.Categoria;
import model.Produto;
import model.Produto;

public class ProdutoDAO {

    public void inserir(Produto pro) {
        String nome = pro.getNome() + "' , ";
        String sql = "INSERT INTO produtos ( nome, codigoBarras, preco, quantidade, codCategoria ) VALUES "
                + "( '" + pro.getNome() + "' , "
                + "  '" + pro.getCodigoBarras() + "' , "
                + "   " + pro.getPreco() + " , "
                + "   " + pro.getQuantidade() + " , "
                + "   " + pro.getCategoria().getId() + " ) ";
        boolean resposta = Conexao.executar(sql);
        if (resposta) {
            JOptionPane.showMessageDialog(null, "Produto inserido com sucesso!");
        }
    }

    public void editar(Produto pro) {

        String sql = "UPDATE prdutos SET "
                + " nome = '" + pro.getNome() + "' ,  "
                + " codigoBarras = '" + pro.getCodigoBarras() + "' ,  "
                + " preco = " + pro.getPreco() + " , "
                + " quantidade = " + pro.getQuantidade() + " ,  "
                + " codCategoria = " + pro.getCategoria().getId() + "   "
                + " where id = " + pro.getId();
        boolean resposta = Conexao.executar(sql);
        if (resposta) {
            JOptionPane.showMessageDialog(null, "Produto editado com sucesso");
        }
    }

    public void excluir(Produto pro) {
        String sql = "Delete from produtos  WHERE id = " + pro.getId();
        boolean resposta = Conexao.executar(sql);
        if (resposta) {
            JOptionPane.showMessageDialog(null, "Cidade excluída com sucesso!");
        }

    }

    public static List<Produto> getProdutos() {

        List<Produto> lista = new ArrayList<Produto>();

        String sql = "SELECT p.id AS codigo, p.nome AS nome , "
                + " p.codigoBarras AS codBarras, p.preco AS preco, "
                + " p.quantidade  AS qtd, c.nome AS cat, c.id AS codCat "
                + " FROM  produtos p "
                + " INNER JOIN categorias c "
                + " On c.id = p.codCategoria ";
        ResultSet rs = Conexao.consultar(sql);

        if (rs != null) {
            try {
                while (rs.next()) {
                    Produto p = new Produto();
                    p.setId(rs.getInt("codigo"));
                    p.setNome(rs.getString("nome"));
                    p.setQuantidade(rs.getDouble("qtd"));
                    p.setPreco(rs.getDouble("preco"));

                    Categoria cat = new Categoria();
                    cat.setId(rs.getInt("codCat"));
                    cat.setNome(rs.getString("cat"));
                    p.setCategoria(cat);

                    lista.add(p);
                }

            } catch (Exception e) {
                JOptionPane.showMessageDialog(null, e.toString());
            }

        }

        return lista;
    }

    public static Produto getProdutosById(int id) {

        String sql = "SELECT p.id AS codigo, p.nome AS nome , "
                + " p.codigoBarras AS codBarras, p.preco AS preco, "
                + " p.quantidade  AS qtd, c.nome AS cat, c.id AS codCat "
                + " FROM  produtos p "
                + " INNER JOIN categorias c "
                + " On c.id = p.codCategoria "
                + " WHERE p.id = " + id;
        ResultSet rs = Conexao.consultar(sql);

        if (rs != null) {
            try {
                   rs.next();
                    Produto p = new Produto();
                    p.setId(rs.getInt("codigo"));
                    p.setNome(rs.getString("nome"));
                    p.setQuantidade(rs.getDouble("qtd"));
                    p.setPreco(rs.getDouble("preco"));

                    Categoria cat = new Categoria();
                    cat.setId(rs.getInt("codCat"));
                    cat.setNome(rs.getString("cat"));
                    p.setCategoria(cat);

                    return p;
                

            } catch (Exception e) {
                JOptionPane.showMessageDialog(null, e.toString());
                return null;
            }

        }else{
            return null;
        }

        
        
    }
    
}