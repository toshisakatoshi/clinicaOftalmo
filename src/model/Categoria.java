
package model;

public class Categoria {
    private int id;
    private String nome;
    
    public Categoria(){
        
    }
    
    public Categoria(int id, String nome) {
        this.id = id;
        this.nome = nome;
        
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

    
    @Override
    public String toString() {
        
        return nome;
    }
    
    
    
}
