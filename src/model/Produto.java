
package model;

public class Produto {
    private int id;
    private String nome, codigoBarras;
    private double preco, quantidade;
    private Categoria categoria;

    
            
    public Produto(){
        
    }
    
    public Produto(int id, String nome) {
        this.id = id;
        this.nome = nome;
        
    }

    public Produto(int id, String nome, String codigoBarras, double preco, double quantidade, Categoria categoria ) {
        this.id = id;
        this.nome = nome;
        this.codigoBarras = codigoBarras;
        this.preco = preco;
        this.quantidade = quantidade;
        this.categoria = categoria;
       
    }
    
    

    public String getCodigoBarras() {
        return codigoBarras;
    }
   
    public double getPreco() {
        return preco;
    }

    public void setPreco(double preco) {
        this.preco = preco;
    }

    public double getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(double quantidade) {
        this.quantidade = quantidade;
    }

    public Categoria getCategoria() {
        return categoria;
    }

    public void setCategoria(Categoria categoria) {
        this.categoria = categoria;
    }

    public int getId() {
        return id;
        
    }
    
    public void setId(int id){
        this.id = id;
    }
    
    public void setNome(String nome){
        this.nome = nome;
    }

    public String getNome() {
        return nome;
    }

    public void setCodigoBarras(String codigoBarras) {
        this.codigoBarras = codigoBarras;
    }
    
    
}
